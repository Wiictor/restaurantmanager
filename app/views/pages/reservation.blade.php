@extends('layouts.master')

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-9" ng-controller="tableController">
	<h3>Reservations</h3>
	@if(Auth::guest())
	<em class="mutted">You must be logged in to make reservation</em>
  @else
  <em class="mutted">Select date and time then click search to see what's available</em>
	@endif

	<form class="row search-box form-inline" ng-submit="searchReservations(dt.getDate(),dt.getMonth()+1,dt.getFullYear(),time)">
        <div class="col-md-3">
            <p class="input-group">
              <input type="text" class="form-control" datepicker-popup="@{{format}}" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2030-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
        </div>
      <div class="col-md-3">
			   <p class="input-group">
          <select class="form-control inline" ng-model="time">
        		<option ng-repeat="hour in hours" ng-selected="hour==currentTime">@{{hour}}</option>
        	</select>
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click=""><i class="fa fa-clock-o"></i></button>
              </span>
            </p>
            <i class="fa fa-spinner fa-spin fa-2x" ng-hide="hideSpinner"></i>
        </div>
        <div class="">
        	<input type="submit" class="btn btn-success" value="Search" />
        </div>
    </form>
@if(Auth::check())
	<div class="tables-container row">
		<div class="col-md-2 restaurant-table " ng-repeat="table in tables">

			<h3 style="cursor:pointer" tooltip-html-unsafe='<p>Position:@{{table.position}}</p><img style="display:block;" width="320" height="225" src="@{{table.image_url}}"/><p>Description: @{{table.description}}</p>' tooltip-placement="right" tooltip-append-to-body="false">Table No. @{{table.number}}</h3>
			<p>Number of seats: @{{table.seats}}</p>
			<p>
				Reserved to:
			</p>
			 <p ng-show="reservedTables.indexOf(table.id)!=-1"><span ng-hide="reservedTables[reservedTables.indexOf(table.id)+1] == '1' || reservedTables[reservedTables.indexOf(table.id)+1] == '2'|| reservedTables[reservedTables.indexOf(table.id)+1] == '3'|| reservedTables[reservedTables.indexOf(table.id)+1] == '4'|| reservedTables[reservedTables.indexOf(table.id)+1] == '5'|| reservedTables[reservedTables.indexOf(table.id)+1] == '6'|| reservedTables[reservedTables.indexOf(table.id)+1] == '7'|| reservedTables[reservedTables.indexOf(table.id)+1] == '8'|| reservedTables[reservedTables.indexOf(table.id)+1] == '9'|| reservedTables[reservedTables.indexOf(table.id)+1] == '10'|| reservedTables[reservedTables.indexOf(table.id)+1] == '11'|| reservedTables[reservedTables.indexOf(table.id)+1] == '12'|| reservedTables[reservedTables.indexOf(table.id)+1] == '13'|| reservedTables[reservedTables.indexOf(table.id)+1] == '14'|| reservedTables[reservedTables.indexOf(table.id)+1] == '15'|| reservedTables[reservedTables.indexOf(table.id)+1] == '16'|| reservedTables[reservedTables.indexOf(table.id)+1] == '17'|| reservedTables[reservedTables.indexOf(table.id)+1] == '18'|| reservedTables[reservedTables.indexOf(table.id)+1] == '19'|| reservedTables[reservedTables.indexOf(table.id)+1] == '20'">
				 @{{reservedTables[reservedTables.indexOf(table.id)+1]}}</span>@{{tableReservation1}}</p>
			<input type="text" placeholder="Client name" class="form-control" ng-model="tableReservation1" value="" ng-show="reservedTables.indexOf(table.id)==-1">
			<br>
			<button class="btn btn-sm btn-danger" ng-show="reservedTables.indexOf(table.id)!=-1" style="cursor:auto;">Reserved</button>
			<a class="btn btn-sm btn-success" ng-show="reservedTables.indexOf(table.id)==-1"
          ng-click="makeReservation(table.id, table.number, dt.getDate(), dt.getMonth()+1, dt.getFullYear(), time, tableReservation1)">Make reservation</a>
		</div>
	</div><!-- end tables container -->
@endif
  </div><!--end col-md-10-->
  <div class="col-md-3">
    @if(Auth::check())
     <div class="panel panel-primary breathe" ng-controller="usersController">
      <div class="panel-heading">
        <h3 class="panel-title">Your active reservations</h3>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item" ng-repeat="reservation in userReservations | orderBy:'reservation_start'" ng-show="reservation.active==1">
              <!-- table number instead table_id-->
               <div>Table: @{{reservation.table_number}}</div>
							 <div>Reserved to: @{{reservation.reserved_person}}</div>
              <div>Time: @{{reservation.reservation_start}}</div>
              <div><button class="btn btn-sm btn-danger" ng-click="deleteReservation(reservation.id, $index)">Cancel</button></div>
          </li>
        </ul>
      </div>
    </div>
    @else

    @endif
  </div>
</div>
</div>
@stop
