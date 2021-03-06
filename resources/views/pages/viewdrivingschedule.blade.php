@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>User Schedule</title>
</head>
<?php
  $driver_user_id = $_GET["id"];
  $driver_offer_id = $_GET["reqid"];
  $drivers = DB::select(DB::raw("SELECT * FROM users, ride_offers WHERE users.id = ride_offers.user_id AND ".$driver_offer_id." = ride_offers.offer_id"));
  $user = DB::table('users')->where('id', $driver_user_id)->first();
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><?php foreach ($drivers as $driver) { echo $driver->name."'s Driving Schedule"; } ?>
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:32px; height:32px; position:relative;">
        <img src="" alt =""/>
        </div>
        <div class="panel-body">
          <div class="col-md-6">
          <?php
          foreach ($drivers as $driver)
          {
            echo "<strong>Starting Address: </strong>".$driver->start_address."<br>
            <strong>Destination Address: </strong>".$driver->destination_address."<br>
            <strong>Maximum Deviation Off Route: </strong>".$driver->max_deviation." meters<br>
            <strong>Arrival Time: </strong>".$driver->arrival_time."<br>
            <strong>Return Time: </strong>".$driver->end_time."<br>";
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
