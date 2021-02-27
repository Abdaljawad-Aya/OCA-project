<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth ;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_image' => ['image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
        ]);
    }


    public function redirectTo(){

         switch (Auth::user()->user_type){
             case 'user':
                 $this->redirectTo = '/profile';
                 return $this->redirectTo;
                 break;

                 case 'vendor':
                     $this->redirectTo = '/manage_shop';
                     return $this->redirectTo;
                     break;

                     default:
                     $this->redirectTo = '/register';
                     return $this->redirectTo;
                     break;
         }
    }



    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['name'],
            'user_email' => $data['user_email'],
            'user_password' => Hash::make($data['password']),
            'user_image' => "default.png",
            'user_type' => $data['user_type'],

        ]);
    }
}
