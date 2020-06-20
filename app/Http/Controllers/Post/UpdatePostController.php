<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Model\CategoryModel;
use App\Helpers\Category\CategoryHelper;
class UpdatePostController extends Controller
{
    // view 
    public function indexAction($post_id,Request $request){
        try {
            /**
             * Check roles
             */
            if($this->checkRoles('update_post') === false ) {
                return redirect()->route('ListPost');
            }
            /**
             * If role invalid 
             */
            $post_detail = PostModel::where('id',$post_id)->first();
            return view('admin.post.v1.update',[
                'data' => $post_detail,
                'category' => CategoryModel::all(),
                'category_selected_id' => CategoryHelper::categoryListId($post_detail->category_id)
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
            /**
             * Check roles
             */
            if($this->checkRoles('update_post') === false ) {
                return redirect()->route('ListPost');
            }
            /**
             * If role invalid 
             */
            $validator = $this->validateForm($request,$post_id);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Save 
             */
            $post = PostModel::where('id',$post_id);
            if($post->count() < 1 ) {
                throw new Exception("id not found " . $post_id);
            }
            $update = $post->update([
                'title' => $request->input('title'),
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'content' => $request->input('content'),
                'status' => in_array($request->input('status'),[
                    "pending","close","public"
                ]) ? $request->input('status') : 'pending',
                'content_seo' => $request->input('content-seo'),
                // thumbnail
                'thumbnail' => $request->input('thumbnail') 
                ? str_replace(url('/'),'',$request->input('thumbnail')) 
                : '',
                // category
                'category_id' => $request->input('category') 
                ? CategoryHelper::categorySelected($request->input('category'))
                : ''
            ]);
            if($update) {
                $request->session()->put('update_status',true);
                return redirect(route('ListPost'));
            } else {
                $request->session()->put('update_status',false);
                return redirect(route('ListPost'));
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
            'tags' => 'required|max:75'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
