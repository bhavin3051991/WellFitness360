<?php

namespace App\Helpers;
use DB;
use Illuminate\Support\Facades\Mail;
use Sendinblue\Mailin;
use Smsapi\Client\SmsapiHttpClient;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use App\Models\PackagePurchase;
use App\Models\UserChatAdmin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Models\RolePermission;

class Helper{

    /**
     * USE : Get User Permissions
     */
    public static function getPermissions($userId){
        $permission = array();
        $data = RolePermission::select('*')->where('id',$userId)->first()->toArray();
        if($data){
            $permission['role_id'] = $data['id'];
            $permission['role_name'] = $data['role_name'];
            $permission['permission'] = json_decode($data['permission']);
            return $permission;
        }else{
            return false;
        }
    }
}
