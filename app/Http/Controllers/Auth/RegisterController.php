<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->User = new User;
    }

    /**
     * USE : Register user
     */
    public function register(Request $request){
        if ($request->isMethod('get')) {
            return redirect('login');
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'roles' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:users',
                'contact_no' => 'nullable|numeric|min:10',
                'password' => 'required',
                'gender' => 'required',
            );
            $messages = array(
                'roles.required' => 'Please select type of register.',
                'name.required' => 'Name is required.',
                'surname.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'email.email' => "Please Enter Valid Email",
                'email.unique' => "Email Alredy Exist",
                'contact_no.numeric' => "Please enter valid contact number",
                'password.required' => 'Password is required',
                'gender.required' => 'Please select gender',
            );

            if($this->validate($request, $rules, $messages) === FALSE){
                return redirect()->back()->withInput();
            }
            $this->User->role_id        = $request->roles;
            $this->User->name           = trim($request->name);
            $this->User->sur_name       = trim($request->surname);
            $this->User->email          = trim($request->email);
            $this->User->contact_no     = trim($request->contact_no);
            $this->User->password       = bcrypt($request->password);
            $this->User->gender         = $request->gender;
            $result = $this->User->save();  // save data

            if($result){
                return redirect('login')->with('success_msg', 'Your Account registerd successfully.');
            }else{
                return back()->with('error_msg', 'Problem was error accured.. Please try again..');
            }
        }
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
