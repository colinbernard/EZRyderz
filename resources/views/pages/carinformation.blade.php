@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Vehicle Information</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Car Information</div>
        <div class="panel-body">
          <form method = "POST" class="form-horizontal" action = "/action_page.php">

                <div class="form-group">
                  <label class="col-md-4 control-label">Make: </label>
                  <div class="col-md-6">
                    <select class="form-control" name = "make">
                      <option value = "toyota">Toyota</option>
                      <option value = "gm">GM</option>
                      <option value = "nissan">Nissan</option>
                      <option value = "honda">Honda</option>
                      <option value = "hyundai">Hyundai</option>
                      <option value = "mercedes">Mercedes</option>
                      <option value = "bmw">BMW</option>
                      <option value = "chevrolet">Chevrolet</option>
                      <option value = "chrystler">Chrystler</option>
                      <option value = "dodge">Dodge</option>
                      <option value = "jeep">Jeep</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Model: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "model" placeholder = "Insert Model Here"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Year: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "year" placeholder = "Insert Year Here"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">License Plate: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "licensePlate" placeholder = "Insert License Plate Here"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Number of Seats: </label>
                  <div class="col-md-6">
                    <select class="form-control" name = "seats">
                      <option value = "2">2</option>
                      <option value = "3">3</option>
                      <option value = "4">4</option>
                      <option value = "5">5</option>
                      <option value = "6">6</option>
                      <option value = "7">7</option>
                      <option value = "8">8</option>
                      <option value = "9">9</option>
                      <option value = "10">10</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Air Conditioning? </label>
                  <div class="col-md-6">
                    <div class="">
                    <input type = "radio" name = "yesOrNo" value = "yes">Yes
                    <input type = "radio" name = "yesOrNo" value = "no">No
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Approximate Mileage: </label>
                  <div class="col-md-6">
                  <input class="form-control" type = "text" name = "mileage" placeholder = "Insert Mileage Here"/>
                  <! Minor CSS bug. The MPG L/100 option is on it's own line and not next to "Approximate Mileage">
                    <select name = "mpgOrL/100">
                      <option value = "mpg">MPG</option>
                      <option value = "L/100">L/100</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="allow" {{ old('allow') ? 'checked' : '' }}> Allow Others to View My Car Information
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                      <button type="reset" class="btn btn-primary">
                        Reset
                      </button>
                    </div>
                  </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
