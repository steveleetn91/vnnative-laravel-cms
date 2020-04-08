<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\SettingModel;
class MenuBuilderController extends Controller
{
    //
    public function indexAction(){
        return view('admin.menu-builder.v1',array(
            'data' => SettingModel::where('key','menu_builder')->first()->value
        ));
    }
    /**
     * Save 
     */
    public function saveAction(Request $request){
            try {
                $validator = $this->validateForm($request);
                if($validator === false ) {
                    $save = SettingModel::where('key','menu_builder')
                    ->update(array(
                        'value' => $request->input('menu_builder')
                    ));
                    if($save) {
                        $request->session()->put('save_menu_builder_status',true);
                    } else {
                        $request->session()->put('save_menu_builder_status',false);
                    }
                    return redirect()->back();
                }   
                return redirect()->back()->withErrors($validator); 
            }catch(Exception $e) {
                return $this->saveException($e->getMessage());
            }
    }
    /**
     * Validator
     */
    protected function validateForm($request){
        $validator = Validator::make($request->all(), [
            'menu_builder' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
