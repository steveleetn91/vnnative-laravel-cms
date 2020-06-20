<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Model\PostModel;
use App\Model\CategoryModel;
use Exception;
use Auth;
use App\Helpers\Category\CategoryHelper;

class CreatePostController extends Controller
{
    //
    public function indexAction() {
        try {
            /**
             * Check roles
             */
            if($this->checkRoles('add_post') === false ) {
                return redirect()->route('ListPost');
            }
            /**
             * If role invalid 
             */
            return view('admin.post.v1.add',array(
                'category' => CategoryModel::all()
            ));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }

    /**
     * Insert
     */
    public function saveAction(Request $request){
        try {
            /**
             * Check roles
             */
            if($this->checkRoles('add_post') === false ) {
                return redirect()->route('ListPost');
            }
            /**
             * If role invalid 
             */
            $validator = $this->validateForm($request);
            if($validator != false ) {
                return back()->withErrors($validator)->withInput();
            }
            /**
             * Save 
             */
            $slug = $request->input('url-seo') ? Str::slug($request->input('url-seo')) : Str::slug($request->input('title'));
            $slug = $slug . '-' . time();
            $category_id = $request->input('category') 
            ? CategoryHelper::categorySelected($request->input('category'))
            : '';
            $id = PostModel::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'status' => in_array($request->input('status'),[
                    "pending","close","public"
                ]) ? $request->input('status') : 'pending',
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'thumbnail' => $request->input('thumbnail') 
                ? str_replace(url('/'),'',$request->input('thumbnail')) 
                : '',
                'user_id' => Auth::user()->id,
                // category
                'category_id' => $category_id
            ]);
            if($id) {
                $request->session()->put('add_new_status',true);
                return redirect(route('ListPost'));
            } else {
                $request->session()->put('add_new_status',false);
                return redirect(route('ListPost'));
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
