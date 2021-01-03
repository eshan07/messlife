   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

<center><h2>Meal Report: </h2></center>
<div class="container" >
            
    <div class="row" style="margin-bottom: 15px">
      <div class="col-md-12">
        <div class="col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{$perday_total}}</h3>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Total Meals</strong>
                </div>
            </div>

        </div> 
        <div class="col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{$meal_cost->meal_cost}}/=</h3>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Cost</strong>
                </div>
            </div>

        </div> 
        <div class="col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{$meal_cost->meal_balance}}/=</h3>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Paid</strong>
                </div>
            </div>
                </div> 
        <div class="col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{$meal_cost->meal_due}}/=</h3>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Due</strong>
                </div>
            </div>
                </div>
                </div>

</div>


	<table class="table" width="100%">
	  <thead style="background-color: #ff9800; color: #ffffff;">
	    <tr>
	      <th scope="col"><b>Date</b></th>
	      <th scope="col"><b>Break Fast</b></th>
          <th scope="col"><b>Lunch</b></th>
          <th scope="col"><b>Dinner</b></th>
          <th scope="col"><b>Perday Total</b></th>
	    </tr>
	  </thead>

	  <tbody>
@foreach($meals as $meal)
	    <tr>
	      <td>{{$meal->date}}</td>

	      <td>{{$meal->break_fast}}</td>
        <td>{{$meal->lunch}}</td>
        <td>{{$meal->dinner}}</td>
        <td>{{$meal->perday_meal}}</td>

@endforeach


	    </tr>


	  </tbody>
	</table>

