<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PageModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;
use Auth;
class UpdatePageController extends Controller
{
    // view 
    public function indexAction($post_id,Request $request){
         try {
            $post_detail = PageModel::where('id',$post_id)->first();
            return view('admin.page.update',[
                'data' => $post_detail
            ]);
         }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
         }
    }
    /**
     * Update
     */
    public function saveAction($post_id,Request $request){
         try {
            $validator = $this->validateForm($request,$post_id);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Save 
             */
            $page = PageModel::where('id',$post_id);
            if($page->count() < 1 ) {
                throw new Exception("id not found" . $post_id);
            }
            $id = $page->update([
                'title' => $request->input('title'),
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'template' => $request->input('template') ? $request->input('template') : 'default',
                'content' => $request->input('content'),
                'status' => in_array($request->input('status'),[
                    "pendding","close","public"
                ]) ? $request->input('status') : 'pendding',
                'status' => $request->input('status'),
                'content_seo' => $request->input('content-seo')
            ]);
            if($id) {
                return redirect(route('ListPage'));
            } else {
                return redirect(route('UpdatePage'));
            }
         }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
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
            'content-seo' => 'required|min:10',
            'status' => 'required|max:10',
            'template' => 'required|max:50',
            'tags' => 'required|max:75'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
