<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class ResetPasswordUserController extends Controller
{
    //
    public function indexAction(){
        return view('admin.user.v1.change-password');
    }
    public function saveAction(Request $request){
        try {
            $validator = $this->validateForm($request);
            if($validator != false ) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if(!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('old_password')])) {
                $request->session()->put('old_password_not_correct',false);
                return redirect()->back();
            }   
            $user = User::where('email',Auth::user()->email); 
            $update = $user->update(array(
                'password' => Hash::make($request->input('password'))
            ));
            $request->session()->put('update_status',$update ? true : false);
            return redirect()->back();
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request){
        $validator = Validator::make($request->all(), [
            'old_password' => ['required','max:255'],
            'password' => ['required','min:5','confirmed'],
            'password_confirmation' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
