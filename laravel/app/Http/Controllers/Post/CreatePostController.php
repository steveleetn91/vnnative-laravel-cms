<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Model\PostModel;
class CreatePostController extends Controller
{
    //
    public function indexAction() {
        return view('admin.post.add');
    }

    /**
     * Insert
     */
    public function saveAction(Request $request){
        $validator = $this->validateForm($request);
        if($validator != false ) {
            return back()->withErrors($validator)->withInput();
        }
        /**
         * Save 
         */
        $slug = $request->input('url-seo') ? Str::slug($request->input('url-seo')) : Str::slug($request->input('title'));
        $slug = $slug . '-' . time();
        $id = PostModel::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'content_seo' => $request->input('content-seo'),
            'thumbnail' => $request->input('thumbnail') ? $request->input('thumbnail') : '',
            'user_id' => 0
        ]);
        if($id) {
            return redirect(route('ListPost'));
        } else {
            return redirect(route('CreatePost'));
        }
    }
    /**
     * Validator
     */
    protected function validateForm($request){
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
