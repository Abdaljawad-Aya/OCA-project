<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth ;
use App\User ;

class UserController extends Controller
{
    public function profile(){
        return view('profile', array('user'=> Auth::user()) );
    }

    public function update_image(Request $request){

        if(!empty($request -> file('user_image'))){



            $file = $request->file('user_image');
            $fileName =  time() . '.' .  $file -> getClientOriginalExtension() ;
            $file->move(public_path('/uploads/image'),$fileName);

            $user = new User();
            $user::find(Auth::user()->user_id) -> update(['user_image' => $fileName]) ;
            Auth::user() -> user_image = $fileName ;
            
            
            
        }

        return view('public/profile', array('user'=> Auth::user()) );

    }

}
