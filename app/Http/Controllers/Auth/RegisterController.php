<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Helpers\Helper;
use App\User;
use DateTime;
use Str;

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
	// public function register(Request $request){
	//     if ($request->isMethod('get')) {
	//         return redirect('login');
	//     }

	//     if ($request->isMethod('post')) {
	//         $rules = array(
	//             'roles' => 'required',
	//             'name' => 'required',
	//             'surname' => 'required',
	//             'email' => 'required|email|unique:users',
	//             'contact_no' => 'nullable|numeric|min:10',
	//             'password' => 'required',
	//             'gender' => 'required',
	//         );
	//         $messages = array(
	//             'roles.required' => 'Please select type of register.',
	//             'name.required' => 'Name is required.',
	//             'surname.required' => 'Please Enter Last Name',
	//             'email.required' => 'Please Enter Email',
	//             'email.email' => "Please Enter Valid Email",
	//             'email.unique' => "Email Alredy Exist",
	//             'contact_no.numeric' => "Please enter valid contact number",
	//             'password.required' => 'Password is required',
	//             'gender.required' => 'Please select gender',
	//         );

	//         if($this->validate($request, $rules, $messages) === FALSE){
	//             return redirect()->back()->withInput();
	//         }
	//         $this->User->role_id        = $request->roles;
	//         $this->User->name           = trim($request->name);
	//         $this->User->sur_name       = trim($request->surname);
	//         $this->User->email          = trim($request->email);
	//         $this->User->contact_no     = trim($request->contact_no);
	//         $this->User->password       = bcrypt($request->password);
	//         $this->User->gender         = $request->gender;
	//         $result = $this->User->save();  // save data

	//         if($result){
	//             return redirect('login')->with('success_msg', 'Your Account registerd successfully.');
	//         }else{
	//             return back()->with('error_msg', 'Problem was error accured.. Please try again..');
	//         }
	//     }
	// }

	public function register(Request $request){
		if ($request->isMethod('get')) {
			return redirect('login');
		}

		if ($request->isMethod('post')) {
			$existingEmail = false;
			$existingEmail = User::where('email',$request->email)->count();
			if($existingEmail){
				return response()->json(array('status' => 0,'message'=>'Email already exists..Try to other email..'));
			}else{
				$remember_token = Str::random(120);

				$this->User->role_id        = $request->roles;
				$this->User->name           = trim($request->name);
				$this->User->sur_name       = trim($request->surname);
				$this->User->email          = trim($request->email);
				$this->User->contact_no     = trim($request->contact_no);
				$this->User->password       = bcrypt($request->password);
				$this->User->gender         = $request->gender;
				$this->User->remember_token = $remember_token;
				$result = $this->User->save();  // save data
				if($result){
					// $data = array(
					// 	'name' => ucfirst(trim($request->name)).' '.ucfirst(trim($request->surname)),
					// 	'email' => trim($request->email),
					// 	'password' => trim($request->password),
					// 	'subject' => "WellFit360 Email Verify",
					// 	'verifyUrl' => env('APP_URL').'/verifyAccount/',
					// 	'verifyToken' => $remember_token,
					// );
					// // Send email
					// Helper::sendMail($data);
					return response()->json(array('status' => 1,'message'=>'Your regression has been successfully completed.You will be sent a link in your registered email to verify your account from there'));
				}else{
					return response()->json(array('status' => 0,'message'=>'Please try again..'));
				}
			}
		}
	}

	public function EmailCheckRegister(Request $r){
		$email = !empty($r->email) ? $r->email : '';
		$user = User::where('email',$email)->count();
		if($user){
			echo 'false';
		}else{
			echo 'true';
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

	/**
	 * Account verified
	 */
	public function verifyAccount($token){
		if($token){
			$findUser = User::where('verified_token',$token)->first();
			$datetime1 = strtotime($findUser['updated_at']);
			$datetime2 = strtotime(date('Y-m-d H:i:s'));
			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60);
			if($minutes <= 10){
				if($findUser){
					$findUser->remember_token = null;
					$findUser->email_verified = 1;
					$save = $findUser->save();
					if($save){
						return redirect('/login')->with('success_msg', 'Your account verified successfully.');
					}else{
						return redirect('/login')->with('error_msg', 'Please try again...');
					}
				}else{
					return redirect('/login')->with('error_msg', 'Verification link has been expired....');
				}
			}else{
				$findUser->remember_token = null;
				$save = $findUser->save();
				return redirect('/login')->with('error_msg', 'Verification link has been expired....');;
			}
		}
	}
}
