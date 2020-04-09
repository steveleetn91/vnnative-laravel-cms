<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Model\ExceptionModel;
use Exception;
use Auth;
use App\User;
use App\Helpers\AdminUser\AdminUserRoleHelper;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveException($message){
        /**
         * If App using debug model 
         */
        if(env('APP_DEBUG') == true ) {
            print_r($message);
        }  
        /**
         * If off debug model then save into database to tracking system
         */
        else {
            ExceptionModel::create([
                'connection' => '',
                'queue' => '',
                'payload' => '',
                'exception' => $message,
                'failed_at' => date('Y-m-d H:i:s',time())
            ]);
            return redirect()->route('home');
        }
    }
    /**
     * Check roles 
     */
    public function checkRoles($roleCheck){
        $user = User::where('id',Auth::user()->id);
        $roles = AdminUserRoleHelper::rolesArray($user->first()->todo,true);
        if(!empty($roles['role_' . $roleCheck])) {
            return intval($roles['role_' . $roleCheck]) === 1 ? true : false;
        }
        throw new Exception("check roles : role not invalid " . $roleCheck);
    }
}
