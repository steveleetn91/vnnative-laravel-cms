<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use App\Model\CategoryModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UpdateCategoryController extends Controller
{
    // view 
    public function indexAction($post_id,Request $request){
        try {
            /**
            * Check roles
            */
            if($this->checkRoles('update_category') === false ) {
                return redirect()->route('ListCategory');
            }
            /**
            * If role invalid 
            */
            $post_detail = CategoryModel::where('id',$post_id)->first();
            return view('admin.category.v1.update',[
                'data' => $post_detail
            ]);
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }       
    }
    /**
     * Update
     */
    public function saveAction($category_id,Request $request){
        try {
            /**
            * Check roles
            */
            if($this->checkRoles('update_category') === false ) {
                return redirect()->route('ListCategory');
            }
            /**
            * If role invalid 
            */
            $validator = $this->validateForm($request,$category_id);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Save 
             */
            $post = CategoryModel::where('id',$category_id);
            if($post->count() < 1 ) {
                throw new Exception("category id not found " . $category_id);
            }
            $update = $post->update([
                'title' => $request->input('title'),
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'thumbnail' => $request->input('thumbnail') 
                ? str_replace(url('/'),'',$request->input('thumbnail')) 
                : ''
            ]);
            if($update) {
                $request->session()->put('update_status',true);
                return redirect(route('ListCategory'));
            } else {
                $request->session()->put('update_status',false);
                return redirect(route('ListCategory'));
            }
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request,$category_id){
        /**
         * Check post exists
         */
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'content' => 'required|min:50',
            'content-seo' => 'required|min:10',
            'tags' => 'required|max:75'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
