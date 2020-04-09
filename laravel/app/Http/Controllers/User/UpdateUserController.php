<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Helpers\AdminUser\AdminUserRoleHelper;
class UpdateUserController extends Controller
{
    //
    public function indexAction(Request $request,$user_id){
        try {
            /**
            * Check roles
            */
            if($this->checkRoles('manager_user') === false ) {
                return redirect()->route('dashboard');
            }
            /**
            * If role invalid 
            */
            $user = User::where('id',intval($user_id));
            if($user->count() < 1) {
                throw new Exception("not found id " . $user_id);
            }
            return view('admin.user.v1.update',array(
                'data' => $user->first(),
                'roles' => AdminUserRoleHelper::rolesArray($user->first()->todo)
            ));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
        
    }
    public function saveAction(Request $request,$user_id){
        try {
            $account = User::where('id',$user_id);
            if($account->count() >= 1 ) {
                $roles = AdminUserRoleHelper::updateAccountRoles($request->input());
                $update = $account->update(array(
                    'name' => $request->input('name'),
                    'todo' => $roles
                ));
                if($update) {
                    $request->session()->put('update_status',true);
                    return redirect()->back();
                } else {
                    $request->session()->put('update_status',false);
                    return redirect()->back();
                }
            }
            throw new Exception("Not found user " . $user_id);
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
}
