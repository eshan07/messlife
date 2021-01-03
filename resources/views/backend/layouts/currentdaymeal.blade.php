@extends('backend.master')

@section('content')

<style type="text/css">
* {box-sizing: border-box}


/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
/*circle*/	
.status {
    font-family: 'Source Sans Pro', sans-serif;
     border-radius: 10%;
     border: 3px solid #FEA600;
}
.status .panel-title {
    font-family: 'Oswald', sans-serif;
    font-size: 45px;
    font-weight: bold;
    color: #FEA600;
    line-height: 25px;
    padding-top: 10px;
    letter-spacing: -0.8px;
}
</style>

<h3>Today Meals: </h3>
<div class="container">
            
    <div class="row">
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$breakfast}}</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Break Fast</strong>
                </div>
            </div>

        </div> 
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$lunch}}</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Lunch</strong>
                </div>
            </div>

        </div> 
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$dinner}}</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Dinner</strong>
                </div>
            </div>
                </div>

</div>

        </div> 
        <hr><br>
        <h3>Today Individual Meals: </h3>
<div class="tab">
	@foreach($daymeals as $daymeal)
  <button class="tablinks" onclick="openCity(event, '{{$daymeal->user_name}}')" id="defaultOpen">{{$daymeal->user_name}}</button>
  @endforeach

</div>
@foreach($daymeals as $daymeal)
<div id="{{$daymeal->user_name}}" class="tabcontent" style="background: #2E2E2E">

	<table class="table table-dark responsive" style="background: #2E2E2E; margin-top: 3.5%;">
  <tr>
    <th>Break Fast</th>
    <td><h4>{{$daymeal->break_fast}}</h4></td>
  </tr>
  <tr>
    <th>Lunch</th>
    <td><h4>{{$daymeal->lunch}}</h4></td>
  </tr>
  <tr>
    <th>Dinner</th>
    <td> <h4>{{$daymeal->dinner}}</h4></td>
  </tr> 
   <tr>
    <th><h3>Individual Total</h3></th>
    <td> <h3>{{$daymeal->perday_meal}}</h3></td>
  </tr>
  </tbody>
</table>
  
</div>
@endforeach

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

@stop