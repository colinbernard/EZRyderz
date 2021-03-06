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
          <form role = "form" method = "POST" class="form-horizontal" action = "insertcarinformation">
                <div class="form-group">
                  <label class="col-md-4 control-label">Make: </label>
                  <div class="col-md-6">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select class="form-control" name = "make">
                      <option value = "Toyota">Toyota</option>
                      <option value = "GM">GM</option>
                      <option value = "Nissan">Nissan</option>
                      <option value = "Honda">Honda</option>
                      <option value = "Hyundai">Hyundai</option>
                      <option value = "Mercedes">Mercedes</option>
                      <option value = "BMW">BMW</option>
                      <option value = "Chevrolet">Chevrolet</option>
                      <option value = "Chrystler">Chrystler</option>
                      <option value = "Dodge">Dodge</option>
                      <option value = "Jeep">Jeep</option>
                    </select>
                  </div>
                </div>
                <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                  <label for="model" class="col-md-4 control-label">Model: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "model" placeholder = "Insert Model Here" value="{{ old('model') }}" required autofocus/>
                    @if ($errors->has('model'))
                        <span class="help-block">
                            <strong>{{ $errors->first('model') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">Year: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "year" placeholder = "Insert Year Here" value="{{ old('year') }}" required autofocus/>
                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('licensePlate') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">License Plate: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "licensePlate" placeholder = "Insert License Plate Here" value="{{ old('licensePlate') }}" required autofocus/>
                    @if ($errors->has('licensePlate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('licensePlate') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Number of Seats: </label>
                  <div class="col-md-6">
                    <select class="form-control" name = "numberOfSeats">
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
                    <input type = "radio" name = "hasAirConditioning" value = "yes">Yes
                    <input type = "radio" name = "hasAirConditioning" value = "no" checked>No
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Allow Smoking? </label>
                <div class="col-md-6">
                  <div class="">
                  <input type = "radio" name = "allowSmoking" value = "yes">Yes
                  <input type = "radio" name = "allowSmoking" value = "no" checked>No
                </div>
              </div>
            </div>
                <div class="form-group{{ $errors->has('efficiency') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">Fuel Efficiency: </label>
                  <div class="col-md-6">
                  <input class="form-control" type = "text" name = "efficiency" placeholder = "Insert Efficiency Here" value="{{ old('efficiency') }}" required/>
                  @if ($errors->has('efficiency'))
                      <span class="help-block">
                          <strong>{{ $errors->first('efficiency') }}</strong>
                      </span>
                  @endif
                  <! Minor CSS bug. The MPG L/100 option is on it's own line and not next to "Fuel Efficiency">
                    <select name = "efficiencyUnits">
                      <option value = "mpg">MPG</option>
                      <option value = "L/100">L/100</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Fuel Type: </label>
                  <div class="col-md-6">
                    <select class="form-control" name = "fuelType">
                      <option value = "regular">Regular</option>
                      <option value = "midgrade">Midgrade</option>
                      <option value = "premium">Premium</option>
                      <option value = "diesel">Diesel</option>
                    </select>
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
