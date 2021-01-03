<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Mess;
use App\Models\Feedbacks;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
 public function home(){


    	return view('frontend.layouts.home');	
    }

    public function manager(){


    	return view('frontend.layouts.manager');	

    }

    public function member(){


    	return view('frontend.layouts.member');	
    }

    public function about(){


    	return view('frontend.layouts.about');	
    }

    public function features(){


    	return view('frontend.layouts.features');	
    }

    public function contact(){


    	return view('frontend.layouts.contact');	
    }
    public function sendfeedback(Request $request){

                Feedbacks::Create([

            'first_name'=>$request->fname,
            'last_name'=>$request->lname,
            'email'=>$request->email,
            'comment'=>$request->comment,
            ]);

        return redirect()->back()->with('message','Successfully Submit');    
    }

    public function login(){


        return view('frontend.layouts.login');    
    }

    public function registration(){


        return view('frontend.layouts.registration');    
    }





    public function doRegistration(Request $request){

            $mess=Mess::Create([

            'mess_name'=>$request->messName,

        ]);
            if($mess){

             $user=Users::Create([

            'name'=>$request->name,
            'email'=>$request->email,
            'mess_id'=>$mess->id,

            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),

        ]);


    	return redirect()->back()->with('message','Registration Successful');

    }
}

    public function dologin(Request $request){


    	$credentials= $request->only('phone','password');

    	if (Auth::attempt($credentials)) {

    		return redirect()->route('admin')->with('message','log in Successful');
    	}
        else{
            return redirect()->route('login')->with('message','Invalid Creedentitals');
        }

    }
     public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    
     public function viewProfile()
    {
        $user = Users::with('mess')->where('id',Auth()->user()->id)->get();

         return view('backend.layouts.dummy',compact('user'));
    }



    







}
