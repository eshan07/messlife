<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplinaries;
use App\Models\Notices;
use App\Models\Meal_Cost;
use App\Models\Users;
use App\Models\Meals;
use App\Models\Costs;
use App\Models\Bazaar_Schedules;
use Auth;


class HomeController extends Controller
{
    public function home(){

                $user = Auth()->user()->id;
                $per_user_meals = Meals::where('user_id',Auth()->user()->id)->sum('perday_meal');

                
                //dd($per_user_meals);
                $total_meals = Meals::where('mess_id',Auth()->user()->mess_id)->sum('perday_meal');
                if ( $total_meals == 0) {
                $total_meals = 1;
                }



               // dd($total_meals);

                $bazaar_cost = Bazaar_Schedules::where('mess_id',Auth()->user()->mess_id)->sum('bazar_cost');       

                $meal_cost = ($bazaar_cost / $total_meals) * $per_user_meals;
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
// ADD MEAL COST

                if ($meal_balance !== null) {




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





                     
         $meal_details = Meal_Cost::where('user_id',Auth()->user()->id)->first(); 

                $mealcosts  = Meal_Cost::with('user')->where('mess_id',Auth()->user()->mess_id)->get();

                          $allMembers = Users::where('mess_id',Auth()->user()->mess_id)->get();


    	return view('backend.layouts.home',compact('mealcosts','allMembers','meal_details'));	
    } 

     public function disciplinary(){

        	$disciplinaries=Disciplinaries::all();

    	return view('backend.layouts.disciplinaries',compact('disciplinaries'));	
    }



    public function addDisciplinary(Request $request){

			$user=Auth::user()->id;


		Disciplinaries::create([



			'disciplinary'=>$request->disciplinary,
			'user_id'=>$user,
			'created_at'=>$request->created_at,
		]);

		return redirect()->back();
		// ->with('success', 'Data Inserted Successfully');  
    }

    public function notice(){

           $notices=Notices::all();

        return view('backend.layouts.notice',compact('notices'));    
    }

    public function addNotice(Request $request){

    	$user=Auth::user()->id;

        Notices::create([


            'notice'=>$request->notice,
            'user_id'=>$user,
            'created_at'=>$request->created_at,
        ]);

        return redirect()->back();
        // ->with('success', 'Data Inserted Successfully');  
    }


    


    

}
