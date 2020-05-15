<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Role;


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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $user = new User;
        $this->Role = new Role;
    }

    public function index(Request $request){
        $roles = [];
        $roles = $this->Role->getRoles();
        if($request->isMethod('get')) {
            return view('auth.login',compact('roles'));
        }

        if($request->isMethod('post')) {
            $credential = $request->only('email','password');
            if(Auth::attempt($credential)){
                if(Auth::user()->role_id === 1){
                    return redirect('/admin');
                }else if(Auth::user()->role_id === 3){
                    return redirect('/trainer');
                }else{
                    return redirect('/user');
                }
            }else{
                return back()->with('error_msg', 'Invalid login credential...');
            }
        }
    }

    public function logout() {
		Auth::logout();
		return Redirect('login');
    }
}
