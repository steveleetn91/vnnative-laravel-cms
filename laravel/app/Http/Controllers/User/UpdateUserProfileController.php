<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
class UpdateUserProfileController extends Controller
{
    //
    public function indexAction(){
        return view('admin.user.v1.update-profile',array(
            'data' => Auth::user()
        ));
    }
    /**
     * Save update Profile 
     */
    public function saveAction(Request $request){
        try {
            $validator = $this->validateForm($request);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * update info 
             */
            if(Auth::user()->email != $request->input('email')){
                $exists = User::where('email',$request->input('email'));
                if($exists->count() >= 1 ) {
                    $request->session()->put('update_status',false);
                    return redirect()->back();
                }
            }
            $update = User::where('id',Auth::user()->id)
            ->update(array(
                'email' => $request->input('email'),
                'name' =>  $request->input('name'),
                'avatar' => $request->input('avatar') 
                ? str_replace(url('/'),'',$request->input('avatar')) 
                : ''
            ));
            if($update) {
                $request->session()->put('update_status',true);
                return redirect()->back();
            } else {
                $request->session()->put('update_status',false);
                return redirect()->back();
            }
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:150|min:10',
            'name' => 'required|min:5',
            'avatar' => 'required|min:10'
        ]);
        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
