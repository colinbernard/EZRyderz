<?php

namespace ezryderz\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }

    public function welcome()
    {
    	if (Auth::check()) {
            $id = Auth::user()->id;
            $hasMsg = DB::table('participants')->where('user_id', '=', $id)->whereNull('last_read')->first();
            return view('pages.welcome', ['hasMsg' => $hasMsg]);
        } else {
            return view('pages.welcome');
        }
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function carinformation()
    {
      return view('pages.carinformation');
    }

    public function viewcarinformation()
    {
      return view('pages.viewcarinformation');
    }

    public function viewdrivingschedule()
    {
      return view('pages.viewdrivingschedule');
    }

    public function viewcarpoolingschedule()
    {
      return view('pages.viewcarpoolingschedule');
    }

    public function ratings()
    {
      return view('pages.ratings');
    }

    public function search()
    {
      return view('pages.search');
    }


    public function riderratings()
    {
      return view('pages.riderratings');
    }

    public function searchlist()
    {
      return view('pages.searchlist');
    }




    /*
      Retreives list of all drivers from database
    } */
    public function userRatings(){
        $all_ratings = DB::select(DB::raw("SELECT driverRating FROM rating"));
        return view('pages.profile', ['all_ratings' => $all_ratings]);
    }

    /*
      Retreives list of all drivers from database
    } */
    public function driverslist(){
      /*  $all_users = DB::table('users')->get(); */
        $all_drivers = DB::select(DB::raw("SELECT * FROM users, ride_offers WHERE users.id = ride_offers.user_id"));
        return view('pages.driverslist', ['all_drivers' => $all_drivers]);
    }

    /*
      Retreives list of all carpoolers from database
    } */
    public function carpoolerslist(){
      $all_carpoolers = DB::select(DB::raw("SELECT * FROM users, ride_requests WHERE users.id = ride_requests.user_id"));
      return view('pages.carpoolerslist', ['all_carpoolers' => $all_carpoolers]);
    }

    /*
     * View a list of my outstanding ride offers.
     */
    public function myoffers() {
      if (Auth::check()) { // if user is logged in

        // get id of logged in user
        $user_id = Auth::user()->id;

        // query DB
        $all_drivers = DB::select(DB::raw("SELECT * FROM users, ride_offers WHERE users.id = ride_offers.user_id AND users.id = $user_id"));

        // return view and specify that offers being viewed are mine
        return view('pages.driverslist', ['all_drivers' => $all_drivers, 'all_mine' => true]);

      } else {
        return view('pages.driverslist');
      }
    }

    /*
     * View a list of my outstanding ride requests.
     */
    public function myrequests() {
      if (Auth::check()) { // if user is logged in

        // get id of logged in user
        $user_id = Auth::user()->id;

        // query DB
        $all_carpoolers = DB::select(DB::raw("SELECT * FROM users, ride_requests WHERE users.id = ride_requests.user_id AND users.id = $user_id"));

        // return view and specify that requests being viewed are mine
        return view('pages.carpoolerslist', ['all_carpoolers' => $all_carpoolers, 'all_mine' => true]);

      } else {
        return view('pages.carpoolerslist');
      }
    }

    public function compatibledrivers() {
      if (Auth::check()) {

        $user_id = Auth::user()->id;

        $all_drivers = DB::select(DB::raw("SELECT * FROM users, ride_offers, carinformation, rating WHERE users.id = ride_offers.user_id AND users.id = carinformation.user_id AND users.id = rating.userId"));
        return view('pages.compatibledrivers', ['all_drivers' => $all_drivers]);
      }
    }
}
