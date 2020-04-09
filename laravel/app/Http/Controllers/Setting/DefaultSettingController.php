<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SettingModel;
use Illuminate\Support\Facades\Validator;
use Auth;
class DefaultSettingController extends Controller
{
    //
    public function indexAction(){
        print_r(Auth::user());die;
        /**
        * Check roles
        */
        if($this->checkRoles('update_setting') === false ) {
            return redirect()->route('dashboard');
        }
        /**
        * If role invalid 
        */
        try {
            return view('admin.setting.v1',array(
                'data' => array(
                    'sitename' => SettingModel::where('key','sitename')->first()->value,
                    'siteslogan' => SettingModel::where('key','siteslogan')->first()->value,
                    'contact_mail' => SettingModel::where('key','contact_mail')->first()->value,
                    'lang' => SettingModel::where('key','lang')->first()->value
                )
            ));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    public function saveAction(Request $request){
        try {
            $validator = $this->validateForm($request);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Save setting
             * You can custom to json type will better good
             * This is example
             */
            SettingModel::where('key','sitename')->update(array(
                'value' => $request->input('sitename')
            ));
            SettingModel::where('key','siteslogan')->update(array(
                'value' => $request->input('siteslogan')
            ));
            SettingModel::where('key','contact_mail')->update(array(
                'value' => $request->input('contact_mail')
            ));
            SettingModel::where('key','lang')->update(array(
                'value' => $request->input('lang')
            ));
            $request->session()->put('setting_status', 'success');
            return back();
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request){
        $validator = Validator::make($request->all(), [
            'sitename' => 'required|min:3',
            'siteslogan' => 'required|min:3',
            'contact_mail' => 'required|min:10',
            'lang' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
