<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\User;
use App\Role;
use Socialite;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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

	// public function index(Request $request){
	// 	$roles = [];
	// 	$roles = $this->Role->getRoles();
	// 	if($request->isMethod('get')) {
	// 		return view('auth.login',compact('roles'));
	// 	}
	// 	if($request->isMethod('post')) {
	//         $credential = $request->only('email','password');
	//         $findUser = User::where('email',$credential['email'])->count();
	//         if($findUser){
	//             $checkVerified = User::where('email',$credential['email'])->where('email_verified',1)->count();
	//             if($checkVerified){
	//                 if(Auth::attempt($credential)){
	//                     if(Auth::user()->role_id === 1){
	//                         return redirect('/admin');
	//                     }else if(Auth::user()->role_id === 3){
	//                         return redirect('/trainer');
	//                     }else{
	//                         return redirect('/user');
	//                     }
	//                 }else{
	//                     return back()->with('error_msg', 'Invalid login credential...');
	//                 }
	//             }else{
	//                 return back()->with('error_msg', 'Please check your email & verify account...');
	//             }
	//         }else{
	//             return back()->with('error_msg', 'Please enter registered email...');
	//         }
	// 	}
	// }

	public function index(Request $request){
		$roles = [];
		$roles = $this->Role->getRoles();
		if($request->isMethod('get')) {
			return view('auth.login',compact('roles'));
		}
		if($request->isMethod('post')) {
			$credential = $request->only('email','password');
			$findUser = User::where('email',$credential['email'])->get();
			if($findUser){
				$checkVerified = User::where('email',$credential['email'])->where('email_verified',1)->count();
				if($checkVerified){
					if(Auth::attempt($credential)){
						if(Auth::user()->role_id === 1){
							$redirect = '/admin';
							return response()->json(array('status' => 1,'message'=>'Login Successfully','redirecturl' => $redirect));
						}else if(Auth::user()->role_id === 3){
							$redirect = '/trainer';
							return response()->json(array('status' => 1,'message'=>'Login Successfully','redirecturl' => $redirect));
						}else{
							$redirect = '/user';
							return response()->json(array('status' => 1,'message'=>'Login Successfully','redirecturl' => $redirect));
						}
					}else{
						return response()->json(array('status' => 0,'message'=>'Invalid login credential...'));
					}
				}else{
					$verifyToken = Str::random(120);
					$userData = User::find($findUser[0]->id);
					$userData->remember_token = $verifyToken;
					$save = $userData->save();
					$data = array(
						'name' => ucfirst(trim($findUser[0]->name)).' '.ucfirst(trim($findUser[0]->surname)),
						'email' => $findUser[0]->email,
						'subject' => "WellFit360 Email Verify",
						'verifyUrl' => env('APP_URL').'/verifyAccount/',
						'verifyToken' => $verifyToken,
					);

					// Send email
					Helper::sendMail($data);
					return response()->json(array('status' => 0,'message'=>'Your account is not verified. Please verify your account'));
				}
			}else{
				return response()->json(array('status' => 0,'message'=>'Please enter registered email'));
			}
		}
	}

	public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}

	public function handleGoogleCallback()
	{
		try {

			$googleuser = Socialite::driver('google')->stateless()->user();
			$finduser = User::where('google_id', $googleuser->id)->first();

			if($finduser){
				Auth::login($finduser);
				return redirect('/user');

			}else{
				$name = explode(" ", $googleuser->name);
				$Firstname = $name[0];
				$surname = $name[1];
				$User  = new User();
				$User->role_id        = 2;
				$User->name           = trim($Firstname);
				$User->sur_name       = trim($surname);
				$User->email          = trim($googleuser->email);
				$User->password       = bcrypt($googleuser->name);
				$User->google_token   = $googleuser->token;
				$User->auth_provider   = "GOOGLE";
				$User->email_verified   = 1;
				$User->social_profile_image   = $googleuser->avatar_original;
				$User->google_id   = $googleuser->id;
				$Insert = $User->save();  // save data
				$finduser = User::find($Insert->id);
				Auth::login($finduser);
				return redirect('/user');
			}

		} catch (Exception $e) {
			return $e;
			//return redirect('auth/google');
		}
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function redirectToFacebook()
	{
		return Socialite::driver('facebook')->redirect();
	}


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function handleFacebookCallback()
	{
		try {
			$FacebookUser = Socialite::driver('facebook')->stateless()->user();
			$finduser = User::where('facebook_id', $FacebookUser->id)->first();
			if($finduser){
				Auth::login($finduser);
				return redirect('/user');
			}else{
				$name = explode(" ",$FacebookUser->name);
				$Firstname = $name[0];
				$surname = $name[1];
				$User  = new User();
				$User->role_id        = 2;
				$User->name           = trim($Firstname);
				$User->sur_name       = trim($surname);
				$User->email          = (isset($FacebookUser->email)) ? $FacebookUser->email : null;
				$User->password       = bcrypt($FacebookUser->name);
				$User->facebook_token   = $FacebookUser->token;
				$User->auth_provider   = "FACEBOOK";
				$User->email_verified   = 1;
				$User->social_profile_image   = $FacebookUser->avatar_original;
				$User->facebook_id   = $FacebookUser->id;
				$Insert = $User->save();  // save data
				if($Insert){
					$finduser = User::find($Insert->id);
					Auth::login($finduser);
					return redirect('/user');
				}else{
					return redirect('auth/facebook');
				}
			}

		} catch (Exception $e) {
			return redirect('auth/facebook');
		}
	}

	public function redirectToInstagramProvider()
	{
		$appId = config('services.instagram.client_id');
		$redirectUri = urlencode(config('services.instagram.redirect'));
		return redirect()->to("https://api.instagram.com/oauth/authorize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code");
	}

	public function instagramProviderCallback(Request $request)
	{
		$code = $request->code;
		if (empty($code)) return redirect()->route('home')->with('error', 'Failed to login with Instagram.');

		$appId = config('services.instagram.client_id');
		$secret = config('services.instagram.client_secret');
		$redirectUri = config('services.instagram.redirect');

		$client = new Client();

		// Get access token
		$response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
			'form_params' => [
				'app_id' => $appId,
				'app_secret' => $secret,
				'grant_type' => 'authorization_code',
				'redirect_uri' => $redirectUri,
				'code' => $code,
			]
		]);

		if ($response->getStatusCode() != 200) {
			return redirect()->route('home')->with('error', 'Unauthorized login to Instagram.');
		}

		$content = $response->getBody()->getContents();
		$content = json_decode($content);

		$accessToken = $content->access_token;
		$userId = $content->user_id;

		// Get user info
		$response = $client->request('GET', "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$accessToken}");

		$content = $response->getBody()->getContents();
		$oAuth = json_decode($content);

		print_r($oAuth);die;

		// Get instagram user name
		$username = $oAuth->username;

		// do your code here
	}

	public function checkEmailRegister(Request $r){
		$email = $r->email;
		$user = User::where('email',$email)->count();
		if($user){
			echo 'true';	
		}else{
			echo 'false';
		}
	}

	public function logout() {
		Auth::logout();
		return Redirect('login');
	}
}
