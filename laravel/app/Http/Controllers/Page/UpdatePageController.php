<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PageModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class UpdatePageController extends Controller
{
    // view 
    public function indexAction($post_id,Request $request){
        $post_detail = PageModel::where('id',$post_id)->first();
        return view('admin.page.update',[
            'data' => $post_detail
        ]);
    }
    /**
     * Update
     */
    public function saveAction($post_id,Request $request){
        $validator = $this->validateForm($request,$post_id);
        if($validator != false ) {
            return back()->withErrors($validator)->withInput();
        }
        /**
         * Save 
         */

        $id = PageModel::where('id',$post_id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'content_seo' => $request->input('content-seo'),
            'user_id' => 0
        ]);
        if($id) {
            return redirect(route('ListPage'));
        } else {
            return redirect(route('UpdatePage'));
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request,$post_id){
        /**
         * Check post exists
         */
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'content' => 'required|min:50',
            'content-seo' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
