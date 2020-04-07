<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Model\PostModel;
use Exception;
use Auth;
class CreatePostController extends Controller
{
    //
    public function indexAction() {
        try {
            return view('admin.post.add');
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }

    /**
     * Insert
     */
    public function saveAction(Request $request){
        try {
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
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'status' => in_array($request->input('status'),[
                    "pendding","close","public"
                ]) ? $request->input('status') : 'pendding',
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'thumbnail' => $request->input('thumbnail') ? $request->input('thumbnail') : '',
                'user_id' => Auth::user()->id
            ]);
            if($id) {
                return redirect(route('ListPost'));
            } else {
                return redirect(route('CreatePost'));
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
