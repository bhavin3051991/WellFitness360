<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Settings;

class SettingController extends Controller {

	public function siteSetting(){
		$Setting = Settings::first();
		return view('backend.setting')->with("Setting",$Setting);
	}

	public function update(Request $request){
		$rules = array(
			'email' => 'required',
			'contact_no' => 'nullable|numeric|min:10',
			'SiteName' => 'required',
			'StripApiKey' => 'required',
			'StripSercetKey' => 'required',
			'PaypalApiKey' => 'required',
			'PaypalSercetKey' => 'required',
			'Copyright' => 'required',
		);
		$messages = array(
			'email.required' => 'Email is required.',
			'contact_no.numeric' => "Please enter valid contact number",
			'SiteName.required' => 'Please Enter SiteName.',
			'StripApiKey.required' => 'Please Enter StripApiKey.',
			'StripSercetKey.required' => 'Please Enter StripSercetKey.',
			'PaypalApiKey.required' => 'Please Enter PaypalApiKey.',
			'PaypalSercetKey.required' => 'Please Enter PaypalSercetKey.',
			'Copyright.required' => 'Please Enter Copyright.',
		);
		 if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		if($request->hasfile('Sitelogo')){
			$image = $request->file('Sitelogo');
			$Sitelogo =  time().$image->getClientOriginalName();
			$image->move(public_path('siteImages'),$Sitelogo);
		}
		if($request->hasfile('Favicon')){
			$image1 = $request->file('Favicon');
			$Favicon =  time().$image1->getClientOriginalName();
			$image1->move(public_path('siteImages'),$Favicon);
		}
		$Setting = Settings::first();		
		$Setting->Email           = trim($request->email);
		$Setting->PhoneNumber       = trim($request->contact_no);
		$Setting->SiteName     = trim($request->SiteName);
		$Setting->SiteLogo    = (!empty($Sitelogo)) ? $Sitelogo : Null;
		$Setting->Favicon    = (!empty($Favicon)) ? $Favicon : Null;
		$Setting->StripApiKey         = $request->StripApiKey;
		$Setting->StripSercetKey         = $request->StripSercetKey;
		$Setting->PaypalApiKey         = $request->PaypalApiKey;
		$Setting->PaypalSercetKey         = $request->PaypalSercetKey;
		$Setting->Copyright        = $request->Copyright;
		$result = $Setting->save();  // save data

		if($result){
			return redirect('setting')->with('success_msg', 'Setting Update successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}

}
?>