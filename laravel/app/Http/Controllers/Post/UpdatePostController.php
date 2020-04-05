<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;
class UpdatePostController extends Controller
{
    // view 
    public function indexAction($post_id,Request $request){
        try {
            $post_detail = PostModel::where('id',$post_id)->first();
            return view('admin.post.update',[
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
            $post = PostModel::where('id',$post_id);
            if($post->count() < 1 ) {
                throw new Exception("id not found " . $post_id);
            }
            $update = $post->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'thumbnail' => $request->input('thumbnail') ? $request->input('thumbnail') : '',
                'user_id' => 0
            ]);
            if($update) {
                return redirect(route('ListPost'));
            } else {
                return redirect(route('UpdatePost'));
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
            'content-seo' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
