<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class ListUserController extends Controller
{
    //
    public function indexAction(){
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
            $user = User::all();
            return view('admin.user.v1.list',array('data' => $user));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }

    public function deleteAction(){
        
    }
}
