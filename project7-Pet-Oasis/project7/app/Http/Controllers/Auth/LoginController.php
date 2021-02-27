<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;

    public function redirectTo()
    {

        if (Auth::user()->user_type == 'vendor') {
            $user_id = Auth::user()->user_id;
            $category = Category::all()->where('user_id', $user_id);

            if (count($category) != 0) {
                $path = '/profile';
            } else {
                $path = '/manage_shop';
            }
        }

        switch (Auth::user()->user_type) {
            case 'admin':
                $this->redirectTo = '/adminside';
                return $this->redirectTo;
                break;

            case 'user':
                $this->redirectTo = '/profile';
                return $this->redirectTo;
                break;

            case 'vendor':
                $this->redirectTo = $path;
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
