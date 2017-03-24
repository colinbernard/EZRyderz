<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RequestController extends Controller
{

	public function getId(Request $request) {
		if (Auth::check()) { // check if user is logged in
    		$sender_id = Auth::user()->id; // get the current user's id
            $receiver_id = $_GET['receiver_id']; //Get the id of the person you are sending a request too
            $request_id = $request->input('request_id'); //Send the specific request
    		return view('pages.sendrequest', ['sender_id' => $sender_id, 
                                              'receiver_id' => $receiver_id,
                                              'request_id' => $request_id]);
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}	
	}

    public function sendMessage(Request $request) {
    	if (Auth::check()) { // check if user is logged in
    		//initialize values
   			$subject = $request->input('subject');
   			$msg = $request->input('message');

            //Change empty values 
    		if(empty($subject))
    			$subject = "No subject entered.";
    		if(empty($msg))
    			$msg = "No message entered.";

            //Get sender, receiver, and request ID
            $sender_id = $request->input('sender_id'); 
            $receiver_id = $request->input('receiver_id');
            $request_id = $request->input('request_id');

    		//Check if senders info should be included
    		$check = $request->input('infoOpt'); 
    		if ($check === "yes") {
    			//Pull data from DB
    			$address = DB::table('ride_requests')->where([['user_id', '=', $sender_id],['request_id', '=', $request_id]])->value('start_address');
    			$time = DB::table('ride_requests')->where([['user_id', '=', $sender_id],['request_id', '=', $request_id]])->value('arrival_time');

                //Ensure data isnt empty
                if(empty($address))
                    $address = "The sender did not include a home location in their schedule.";
                if(empty($time))
                    $time = "The sender did not include a start time in their schedule.";

    		} else {
    			$address = "Address not sent";
    			$time = "Time not sent";
    		}

            DB::table('requests')->insert(['start_address' => $address,
                                           'arrival_time' => $time,
                                           'subject' => $subject,
                                           'msg' => $msg,
                                           'receiver_id' => $receiver_id,
                                           'sender_id' => $sender_id,
                                           'request_id' => $request_id]);
            
            //Ugly inline javascript to give a confirmation alert
            echo "<script type =\"text/javascript\">alert(\"Request successfully sent to user.\")  </script>";
            return view('pages.welcome');
    	} else {
    		return view('auth.login'); // if user is not logged in, redirect to login page
    	}
    }

    public function displayRequests(Request $request) {
        if (Auth::check()) {
            $user_id = Auth::user()->id; // get the current user's id
            $requests = DB::select(DB::raw("SELECT * FROM requests WHERE receiver_id = $user_id"));
            return view('pages.receivedrequests', ['requests' => $requests]);
        } else {
            return view('auth.login'); // if user is not logged in, redirect to login page
        }
    }

    public function requestDecline(Request $request) {
        if (Auth::check()) {
            //Request Id
            $request_id = $request->id;

            DB::table('requests')->where('id', '=', $request_id)->delete(); // delete from DB
            echo "<script type =\"text/javascript\">alert(\"Request successfully removed.\")  </script>";

            return view('pages.welcome'); // re direct to home after delete
        } else {
            return view('auth.login'); // if user is not logged in, redirect to login page
        }
    }


    public function requestAccept(Request $request) {
        $request_id = $request->request_id;
        $driver_id = $request->driver_id;
        $carpooler_id = $request->carpooler_id;

        DB::table('ride_groups')->insert( // insert into ride group
            [
                'request_id' => $request_id,
                'driver_id' => $driver_id,
                'carpooler_id' => $carpooler_id
            ]
        );

        $request_id = $request->id;

            DB::table('requests')->where('id', '=', $request_id)->delete(); // delete from DB
            echo "<script type =\"text/javascript\">alert(\"Request successfully accepted.\")  </script>";

        return view('pages.welcome');
    }
}
