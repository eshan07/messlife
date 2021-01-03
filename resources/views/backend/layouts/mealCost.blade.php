@extends('backend.master')

@section('content')
<style type="text/css">
	.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: 10%;
}
.col-lg-3 {
    flex: 0 0 25%;
    max-width: 25%;
    margin-left: 10%;
}
</style>
<div class="row">
           
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_tree</i>
                    
                  </div>
                  <p class="card-category">Total Meal</p>
                  <h3 class="card-title">{{$meal_details->total_meal}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_balance_wallet</i>
                  </div>
                  <p class="card-category">My Balance</p>
                  <h3 class="card-title">{{$meal_details->meal_balance}} taka</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">all_inbox</i>
                  </div>
                  <p class="card-category">Total Meal Cost</p>
                  <h3 class="card-title">{{$meal_details->meal_cost}} taka</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">credit_card</i>
                  </div>
                  <p class="card-category">Meal Dues</p>
                  <h3 class="card-title">{{$meal_details->meal_due}} taka</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
          </div>


@stop