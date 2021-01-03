<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bazaars;
use App\Models\Bazaar_Schedules;
use App\Models\Users;
use App\Models\Meals;
use App\Models\Meal_Cost;
use Auth;

use App;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod; 

class BazaarController extends Controller
{
    
	public function viewBazaar()
	{
          $userDetails = Bazaar_Schedules::with('user')->where('mess_id',Auth()->user()->mess_id)->get();

          $allMembers = Users::where('mess_id',Auth()->user()->mess_id)->get();

    return view('backend.layouts.bazaarAll',compact('userDetails','allMembers'));
	}	
    
    public function addBazaar(Request $request)
    {

        $user = Auth::user()->id;
        $mess_id = Auth::user()->mess_id;

        $daterange= $request->daterange;

        $daterange=explode(' - ', $daterange);
        $from=$daterange[0];
        $to=$daterange[1];




        $startDate = new Carbon($from);
        $endDate = new Carbon($to);
        $all_dates = array();
            while ($startDate->lte($endDate))
                {
                    $all_dates[] = $startDate->toDateString();

                    $startDate->addDay();
                }






        foreach ($all_dates as $date) {


            $duplicate = Bazaar_Schedules::where('dates', '=', $date)->where('mess_id', '=', $mess_id)->first();

            if (!$duplicate) {
                

                Bazaar_Schedules::Create([

                'mess_id' => $mess_id,
                'dates' => $date,
                'user_id'=>$request->member_name,
                'manager_id'=>$user,
              ]);

            } 

            else 
            {

            return redirect()->back()->with('duplicate', 'Duplicate Entry!!! Add Dates Avoiding Already Inserted One');
            }
 
          }
  
            return redirect()->back()->with('success', 'Bazaar Schedule Updated Successfully');     
      } 

    

        public function myBazaar()
            {
                $dates = Bazaar_Schedules::where('user_id',Auth::user()->id)->get();

                 return view('backend.layouts.bazaar',compact('dates'));
            }


    public function monthlyBazaar()
        {
          $userDetails = Bazaar_Schedules::with('user')->get();

          $allMembers = Users::all();
  

          return view('backend.layouts.monthlybazaar',compact('userDetails','allMembers'));
        }
    public function bazaarCost()
        {
          $userDetails = Bazaar_Schedules::with('user')->where('mess_id',Auth()->user()->mess_id)->get();

          $allMembers = Users::all();

          $totalBazaar = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');


  

          return view('backend.layouts.bazaarCost',compact('userDetails','allMembers','totalBazaar'));
        }



    
      public function monthlyview(Request $request)
      {       

              $month = $request->month;
              $year = $request->year;


              $userDetails = Bazaar_Schedules::with('user')->whereMonth('dates', $request->month)->whereYear('dates', $request->year)->where('mess_id',Auth()->user()->mess_id)->get();

              $allMembers = Users::all();

        return view('backend.layouts.bazaarAll',compact('userDetails','allMembers','month','year'));
      } 

      public function bazaarscost(Request $request)
      {       
        
        $cost = Bazaar_Schedules::where('dates',$request->date)->first();
        
        if($cost)
        {
          if ($cost->dates==$request->date) 
          {
           Bazaar_Schedules::where('dates',$request->date)->update([

           'bazar_cost' => $request->amount,
           'bazar_list' => $request->bazar_list,

         ]);





                                $user = Auth()->user()->id;

                $per_user_meals = Meals::where('user_id',Auth()->user()->id)->sum('perday_meal');
                //dd($per_user_meals);

                $total_meals = Meals::where('mess_id',Auth()->user()->mess_id)->sum('perday_meal');

               // dd($total_meals);

                $bazaar_cost = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');

                if ($total_meals==0) {
                  $total_meals=1;
                }
                                

                $meal_cost = ($bazaar_cost / $total_meals) * $per_user_meals;
               

                $meal_balance = Meal_Cost::where('user_id',Auth()->user()->id)->first();
                



                if($meal_balance == null){



                        $meal_due  = $meal_cost;

             Meal_Cost::Create([

            'user_id'=>$user,
            'mess_id'=>Auth()->user()->mess_id,
            'total_meal' => $per_user_meals,
            'meal_cost'=>$meal_cost,
            'meal_balance'=>0,
            'meal_due'=>$meal_due,
            

                   ]);
                }




                // $meal_due = 
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







           return redirect()->back()->with('success','Added Bazaar Cost Successfully');
          } 
        }
          
           return redirect()->back()->with('error','Selected Date Does Not Exist in Bazaar Schedule');
       } 


      public function monthlyBazaarCost(Request $request)
      {       

              $month = $request->month;
              $year = $request->year;


              $userDetails = Bazaar_Schedules::with('user')->whereMonth('dates', $request->month)->whereYear('dates', $request->year)->where('mess_id',Auth()->user()->mess_id)->get();

              $allMembers = Users::all();
              $totalBazaar = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');

        return view('backend.layouts.bazaarCost',compact('userDetails','allMembers','month','year','totalBazaar'));
      } 

          public function deletebazaar($id){


        Bazaar_Schedules::where('id',$id)->delete();
        return redirect()->back()->with('success','Bazaar Schedule Deleted successfully');

    }  

     public function printschedule()
    {
        $bazaars= Bazaar_Schedules::with('user')->where('mess_id',Auth()->user()->mess_id)->get();
        $pdf=App::make('dompdf.wrapper');        
        $pdf=$pdf->loadView('backend.layouts.printbazaarschedule',compact('bazaars'));
        return $pdf->stream();
        

        
    }









}
