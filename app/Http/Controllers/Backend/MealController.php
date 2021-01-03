<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meals;
use App\Models\Users;
use App\Models\Bazaar_Schedules;
use App\Models\Meal_Cost;
use Auth;
use DB;
use DateTime;

use Carbon\Carbon;
use Carbon\CarbonPeriod; 

class MealController extends Controller
{
    public function viewMeal(){

    	$meals = Meals::where('user_id',Auth()->user()->id)->get();

    	return view('backend.layouts.meal',compact('meals'));
    }


    public function addMeal(Request $request){

  
      $datetime1 = $timestamp = now();
      $datetime = explode(" ", $datetime1);




     $mytime = new DateTime($request->datepicker.' '.$datetime[1]);

     $day_diff  = $mytime->diff($datetime1);

        // dd($day_diff->days>0);

        $breakfast_time = "16:00:01";
        $breakfast_datetime = new DateTime(date('Y-m-d').' '.$breakfast_time);

         // dd($breakfast_datetime);

        $lunch_time = "10:00:01";
        $lunch_datetime = new DateTime(date('Y-m-d').' '.$lunch_time);

        $dinner_time = "16:00:01";
        $dinner_datetime = new DateTime(date('Y-m-d').' '.$dinner_time);



      // dd($mytime[1]);
              $break_fast_diff = $breakfast_datetime->diff($mytime);
         // dd($break_fast_diff->h.':'.$break_fast_diff->i);

              $lunch_diff = $lunch_datetime->diff($mytime);
              $dinner_diff = $dinner_datetime->diff($mytime);
              // dd($break_fast_diff->h && $break_fast_diff->i);




if ($day_diff->days>0) {
                    if($break_fast_diff->invert==1){
                    return redirect()->back()->with('error','Please add breakfast on previous day before 4.00 PM');
                }

                elseif ($lunch_diff->invert==1) {
                    return redirect()->back()->with('error','Please add lunch before 10.00 AM');
                }
               elseif ($dinner_diff->invert==1) {
                    return redirect()->back()->with('error','Please add dinner on previous day before 4.00 PM');
               }
               $user = Auth::user()->id;
                $user_name = Auth::user()->name;


                $meal = Meals::where('date',$request->datepicker)->where('user_id',Auth()->user()->id)->first();
                
                if($meal)
                {
                   return redirect()->back()->with('error','Selected Date Already Exist');
                }
                  
                else
                {


             
                    if ($mytime<$breakfast_datetime) {
                        $request->break_fast=0;
                        // dd($request->break_fast);



                    }
                    if ($mytime<$lunch_datetime) {
                       $request->lunch=0;
                    }
                    if ($mytime<$dinner_datetime) {
                       $request->dinner=0;
                    }


                Meals::Create([

                    'date' => $request->datepicker,
                    'user_id'=>$user,
                    'user_name'=>$user_name,
                    'mess_id'=>Auth()->user()->mess_id,
                    'break_fast' => $request->break_fast,
                    'lunch'=>$request->lunch,
                    'dinner'=>$request->dinner,
                    'perday_meal'=>$request->break_fast+$request->lunch+$request->dinner,

                           ]);
                    }

    	}

        else{
                           $user = Auth::user()->id;
                $user_name = Auth::user()->name;
            if ($day_diff->days==0){

                    if ($mytime<$breakfast_datetime) {
                        $request->break_fast=0;
     
                    }
                    if ($lunch_datetime<$mytime) {
                       $request->lunch=0;

                    }
                    if ($dinner_diff->invert==0) {
                        $request->dinner=0;
                    }

                    // dd($request->dinner);
                Meals::Create([

                    'date' => $request->datepicker,
                    'user_id'=>$user,
                    'user_name'=>$user_name,
                    'mess_id'=>Auth()->user()->mess_id,
                    'break_fast' => $request->break_fast,
                    'lunch'=>$request->lunch,
                    'dinner'=>$request->dinner,
                    'perday_meal'=>$request->break_fast+$request->lunch+$request->dinner,

                           ]);

            }
            return redirect()->back()->with('error','Few meals added but please add meals before the meal time');
            }

                   
            return redirect()->back()->with('success','Meals Added Successfully');
        }






      public function monthlyMeal(Request $request)
      {       

              $month = $request->month;
              $year = $request->year;




              $meals = Meals::where('user_id',Auth()->user()->id)->whereMonth('date', $request->month)->whereYear('date', $request->year)->get();

        return view('backend.layouts.meal',compact('meals','month','year'));
      } 

      public function mealCost()
      {       
                $user = Auth()->user()->id;

                $per_user_meals = Meals::where('user_id',Auth()->user()->id)->sum('perday_meal');
                //dd($per_user_meals);

                $total_meals = Meals::where('mess_id',Auth()->user()->mess_id)->sum('perday_meal');

               // dd($total_meals);

                $bazaar_cost = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');

                if($total_meals==0){

                    $total_meals = 1;
                }
                                

                $meal_cost = ($bazaar_cost / $total_meals) * $per_user_meals;
              //  dd($meal_cost);

                $meal_balance = Meal_Cost::where('user_id',Auth()->user()->id)->first();



                if($meal_balance == null){

                        $meal_balance_Add  = 0;
                        $meal_due  = $meal_cost - $meal_balance_Add;

             Meal_Cost::Create([

            'user_id'=>$user,
            'mess_id'=>Auth()->user()->mess_id,
            'total_meal' => $per_user_meals,
            'meal_cost'=>$meal_cost,
            'meal_balance'=>$meal_balance_Add,
            'meal_due'=>$meal_due,
            

                   ]);
                }

                if ($meal_balance !== null) {


// ADD MEAL COST

        $meal_balance_Add  = $meal_balance->meal_balance;
             $meal_due  = $meal_cost - $meal_balance_Add;
                Meal_Cost::where('user_id',Auth()->user()->id)->Update([

                    'user_id'=>$user,
                    'mess_id'=>Auth()->user()->mess_id,
                    'total_meal' => $per_user_meals,
                    'meal_cost'=>$meal_cost,
                    'meal_balance'=>$meal_balance_Add,
                    'meal_due'=>$meal_due,
                            

                 ]);
 }




                // $meal_due = 



                $meal_details = Meal_Cost::where('user_id',Auth()->user()->id)->first(); 
              

            return view('backend.layouts.mealCost',compact('meal_details'));  
            }





            public function membersmealcost(Request $request){

// how to use relationship

                // $membersMealCost = Meal_Cost::with('user')->where('mess_id',Auth()->user()->mess_id)->get();

                // dd($membersMealCost);

                                $user = $request->member_id;

                $per_user_meals = Meals::where('user_id',$request->member_id)->sum('perday_meal');
                //dd($per_user_meals);

                $total_meals = Meals::where('mess_id',Auth()->user()->mess_id)->sum('perday_meal');

               // dd($total_meals);

                $bazaar_cost = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');
                                

                $meal_cost = ($bazaar_cost / $total_meals) * $per_user_meals;
               

                $meal_balance = Meal_Cost::where('user_id',$request->member_id)->first();



                if($meal_balance == null){

                        $meal_balance_Add  = $request->balance;
                        $meal_due  = $meal_cost - $meal_balance_Add;

             Meal_Cost::Create([

            'user_id'=>$user,
            'mess_id'=>Auth()->user()->mess_id,
            'total_meal' => $per_user_meals,
            'meal_cost'=>$meal_cost,
            'meal_balance'=>$meal_balance_Add,
            'meal_due'=>$meal_due,
            

                   ]);
                }




                // $meal_due = 
 if ($meal_balance !== null) {

// ADD MEAL COST
    if ($request->balance) {
        $meal_balance_Add  = $meal_balance->meal_balance + $request->balance;
             $meal_due  = $meal_cost - $meal_balance_Add;
                Meal_Cost::where('user_id',$request->member_id)->Update([

                    'user_id'=>$user,
                    'mess_id'=>Auth()->user()->mess_id,
                    'total_meal' => $per_user_meals,
                    'meal_cost'=>$meal_cost,
                    'meal_balance'=>$meal_balance_Add,
                    'meal_due'=>$meal_due,
                            

                 ]);
    }
     


                }


return redirect()->back()->with('success','Balance Added Successfully');
            }

            public function mealcostview(){


                $meal_details = Meal_Cost::where('user_id',Auth()->user()->id)->first(); 
              
 

                          $allMembers = Users::where('mess_id',Auth()->user()->mess_id)->get();

         $allmealcost  = Meal_Cost::with('user')->where('mess_id',Auth()->user()->mess_id)->get();







                return view('backend.layouts.membersMealCost',compact('allmealcost','allMembers'));

            }


            public function currentdaymeals(){

                  $daymeals =DB::table('meals')->select(DB::raw('*'))
                  ->whereRaw('Date(date) = CURDATE()')->where('mess_id',Auth()->user()->mess_id)
                  ->get();

                                                                                    //cant use 
                                                                                    //jon here

                $breakfast = $daymeals->sum('break_fast');
                $lunch = $daymeals->sum('lunch');
                $dinner = $daymeals->sum('dinner');

            



                return view('backend.layouts.currentdaymeal',compact('daymeals','breakfast','dinner','lunch'));
            }

            public function editmealbalance(Request $request,$id){


                dd($id);

             Meal_Cost::where('id',$id)->Update([
            'meal_balance'=>$request->balance,
            ]);

             return redirect()->route('mealcostview')->with('success','Balance Updated Successfully');
            }

 }


