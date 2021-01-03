<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal_Cost;
use App\Models\Users;
use App\Models\Meals;
use App\Models\Costs;
use App\Models\Bazaar_Schedules;
use Auth;

use App;
use PDF;

use Carbon\Carbon;
use Carbon\CarbonPeriod; 


class CostController extends Controller
{
    public function dummy(){

    	return view('backend.layouts.dummy');

    }

    public function allCost(){


    // $mealcosts  = Meal_Cost::with('user')->where('mess_id',Auth()->user()->mess_id)->get();
    // $costs  = Costs::with('mealcost')->get();

    // $hello = $costs->mealcost->total_meal;

        $costs = Costs::with('user','mealcost')->where('mess_id',Auth()->user()->mess_id)->get();


    $allMembers = Users::where('mess_id',Auth()->user()->mess_id)->get();


    // dd($allMembers);
    return view('backend.layouts.allcost',compact('allMembers','costs'));
}
public function addallCost(Request $request){


// $mealcost = Meal_Cost::where('user_id',$request->member_id)->first();



if(Costs::where('user_id',$request->member_id)->first()==null)
                    
    Costs::create([

        'user_id' => $request->member_id,
        'mess_id' => Auth()->user()->mess_id,
        'room_rent' => $request->room_rent,
        'maid_cost' => $request->maid,
        'net_cost' => $request->internet_bill,
        'others_cost' => $request->other_cost,
        'total_cost' => $request->other_cost+$request->room_rent+$request->maid+$request->internet_bill,


    ]);
else{
    return redirect()->back()->with('message1','Already Inserted');
}

    return redirect()->back()->with('message','Successfully Added');
}

    public function deletetotalcost($id){


        Costs::where('id',$id)->delete();
        return redirect()->back()->with('message1','Deleted successfully');

    }  


     public function printcost()
    {
        $costs= Costs::where('mess_id',Auth()->user()->mess_id)->get();
        $pdf=App::make('dompdf.wrapper');        
        $pdf=$pdf->loadView('backend.layouts.printtotalcost',compact('costs'));
        return $pdf->stream();
             
    }

     public function report()
    {
        $perday_total = Meals::where('user_id',Auth()->user()->id)->get()->sum('perday_meal');
        $meal_cost = Meal_Cost::where('user_id',Auth()->user()->id)->first();


        $meals  = Meals::whereMonth('date', Carbon::now()->month)->where('user_id',Auth()->user()->id)->get();

        return view('backend.layouts.report',compact('meals','perday_total','meal_cost'));
             
    }
    
      public function printmealreport(Request $request)
      {       

        $perday_total = Meals::where('user_id',Auth()->user()->id)->get()->sum('perday_meal');
        $meal_cost = Meal_Cost::where('user_id',Auth()->user()->id)->first();


        $meals  = Meals::whereMonth('date', Carbon::now()->month)->where('user_id',Auth()->user()->id)->get();

        $pdf=App::make('dompdf.wrapper');        
        $pdf=$pdf->loadView('backend.layouts.printmealreport',compact('meals','perday_total','meal_cost'));
        return $pdf->stream();
      } 

      public function addpayment(Request $request){

        $total_cost = Costs::where('user_id',$request->member_id)->first()->total_cost;
        // dd($total_cost);

if( Costs::where('user_id',$request->member_id)->first()->total_paid==null){

                        Costs::where('user_id',$request->member_id)->Update([
                    'total_paid' => $request->paid,
                    'total_due'=>$total_cost-$request->paid,

                 ]);
                        return redirect()->back()->with('message','Payment Done');
                        }
                        else{
                            $total_paid = Costs::where('user_id',$request->member_id)->first()->total_paid;



                              Costs::where('user_id',$request->member_id)->Update([
                    'total_paid' => $request->paid+$total_paid,
                    'total_due'=>$total_cost-($request->paid+$total_paid),

                 ]);

                              return redirect()->back()->with('message','Payment Updated');
                        }
      }


      public function paymentview(){


        $payments  = Costs::with('mealcost')->where('user_id',Auth()->user()->id)->first();


        return view('backend.layouts.paymentview',compact('payments'));
      }

}
