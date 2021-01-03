<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Barryvdh\DomPDF\Facade;
// use Illuminate\Support\Facades\Auth;
use Auth;
use App;
use PDF;

class UserController extends Controller
{
    public function member()
    {

    	$users= Users::where('mess_id',Auth()->user()->mess_id)->get();

    	return view('backend.layouts.members',compact('users'));
    }   

     public function printmember()
    {
        $users= Users::where('mess_id',Auth()->user()->mess_id)->get();
        $pdf=App::make('dompdf.wrapper');        
        $pdf=$pdf->loadView('backend.layouts.printmember',compact('users'));
        return $pdf->stream();
        

        
    }
    public function addMember(Request $request)
    {
                $mess_id = Auth::user()->mess_id;


        $user_image = $request->file('image');


        if ($user_image) {

        $file_name =uniqid('user_',true).date('Ymdhms').'.'.$user_image->getClientOriginalExtension();
        $user_image->storeAs('users', $file_name);
        Users::Create([

            'name'=>$request->name,
            'email'=>$request->email,
            'mess_id'=>$mess_id,

            'phone'=>$request->phone,
            'image'=>$file_name,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),

            ]);
        }
else{

            Users::Create([

            'name'=>$request->name,
            'email'=>$request->email,
            'mess_id'=>$mess_id,

            'phone'=>$request->phone,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),

            ]);

        }
    	return redirect()->back()->with('message','New Member Added Successfully');
    }

    public function editprofile(Request $request){

        if ($request->password) {
           Users::where('id',Auth()->User()->id)->Update([

            'name'=>$request->name,
            'password'=>bcrypt($request->password),

            ]);
        }

    else{       
             Users::where('id',Auth()->User()->id)->Update([

            'name'=>$request->name,

            ]);
    }
             return redirect()->back()->with('message','Successfully Updated');
         }
    public function editmember(Request $request,$id){



        
                $mess_id = Auth::user()->mess_id;


        $user_image = $request->file('image');


        if ($user_image) {

        $file_name =uniqid('user_',true).date('Ymdhms').'.'.$user_image->getClientOriginalExtension();
        $user_image->storeAs('users', $file_name);

        Users::where('id',$id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'mess_id'=>$mess_id,

            'phone'=>$request->phone,
            'image'=>$file_name,
            'role'=>$request->role,

            ]);
        }
else{

            Users::where('id',$id)->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'mess_id'=>$mess_id,
            'phone'=>$request->phone,
            'role'=>$request->role,


            ]);

        }
             return redirect()->back()->with('message1','Successfully Updated');
}

    public function deletemember($id){


        Users::where('id',$id)->delete();
        return redirect()->back()->with('message','User Deleted successfully');

    }  


}
