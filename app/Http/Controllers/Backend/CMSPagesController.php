<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\About_Us;
use App\Http\Models\Contact_Us;
use Illuminate\Support\Facades\DB;

class CMSPagesController extends Controller
{
    public function __construct(){
        $this->About_Us = new About_Us;
        $this->Contact_Us = new Contact_Us;
    }

    /**
     * USE : About-us Pages Contetnt
     */
    public function aboutUs(Request $request){
        if($request->isMethod('get')) {
            $about_us = About_Us::find(1);
            return view('backend.cmsPages.about_us',compact('about_us'));
        }

        if($request->isMethod('post')) {
            $public_path = 'backend/images/CMSPages';
            $fullImagePath = null;
            if($request->hasfile('image')){
                $image = $request->file('image');
                $name =  time().$image->getClientOriginalName();
                $image->move($public_path,$name);
                $fullImagePath = $public_path.'/'.$name;
            }
            $count = $this->About_Us->where('id',1)->first(); // Count existing record
            if(empty($count)){
                if($fullImagePath){
                    $this->About_Us->title              = trim($request->title);
                    $this->About_Us->short_description  = $request->short_description;
                    $this->About_Us->long_description   = $request->long_description;
                    $this->About_Us->image              = ($fullImagePath) ? $fullImagePath : Null;
                    $result                             = $this->About_Us->save();
                }else{
                    $this->About_Us->title              = trim($request->title);
                    $this->About_Us->short_description  = $request->short_description;
                    $this->About_Us->long_description   = $request->long_description;
                    $result                             = $this->About_Us->save();
                }
            }else{
                $data = About_Us::find(1);
                if($fullImagePath){
                    $data->title                = trim($request->title);
                    $data->short_description    = $request->short_description;
                    $data->long_description     = $request->long_description;
                    $data->image                = ($fullImagePath) ? $fullImagePath : Null;
                    $result                     = $data->save();
                }else{
                    $data->title                = trim($request->title);
                    $data->short_description    = $request->short_description;
                    $data->long_description     = $request->long_description;
                    $result                     = $data->save();
                }
            }
            if($result){
                return redirect('cms_aboutus')->with('success_msg', 'Detail updated successfully!');
            }else{
                return redirect('cms_aboutus')->with('error_msg', 'Problem was occured.. Please try again!!!!');
            }
        }
    }

    /**
     * USE : Contact-us Pages Contetnt
     */
    public function contactus(Request $request){
        if($request->isMethod('get')) {
            $contact_us = Contact_Us::find(1);
            return view('backend.cmsPages.contact_us',compact('contact_us'));
        }

        if($request->isMethod('post')) {
            $count = $this->Contact_Us->where('id',1)->first(); // Count existing record
            if(empty($count)){
                $this->Contact_Us->email            = trim($request->email);
                $this->Contact_Us->contact_number   = trim($request->contact_number);
                $this->Contact_Us->telephone        = $request->telephone;
                $this->Contact_Us->address          = trim($request->address);
                $this->Contact_Us->website          = trim($request->website);
                $this->Contact_Us->description      = trim($request->description);

                $result = $this->Contact_Us->save();
            }else{
                $data                   = Contact_Us::find(1);
                $data->email            = trim($request->email);
                $data->contact_number   = trim($request->contact_number);
                $data->telephone        = $request->telephone;
                $data->address          = trim($request->address);
                $data->website          = trim($request->website);
                $data->description      = trim($request->description);
                $result = $data->save();
            }

            if($result){
                return redirect('cms_contactus')->with('success_msg', 'Detail updated successfully!');
            }else{
                return redirect('cms_contactus')->with('error_msg', 'Problem was occured.. Please try again!!!!');
            }
        }
    }
}
