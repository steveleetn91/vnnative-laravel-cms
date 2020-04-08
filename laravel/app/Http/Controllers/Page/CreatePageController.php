<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Model\PageModel;
use Exception;
use Auth;
class CreatePageController extends Controller
{
    //
    public function indexAction(){
        try {
            return view('admin.page.v1.add');
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
            $slug = Str::slug($request->input('title'));
            $slug = $slug . '-' . time();
            $id = PageModel::create([
                'title' => $request->input('title'),
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'slug' => $slug,
                'template' => $request->input('template') ? $request->input('template') : 'default',
                'status' => in_array($request->input('status'),[
                    "pendding","close","public"
                ]) ? $request->input('status') : 'pendding',
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'user_id' => Auth::user()->id
            ]);
            if($id) {
                return redirect(route('ListPage'));
            } else {
                return redirect(route('CreatePage'));
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
            'template' => 'required|max:50',
            'tags' => 'required|max:75'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
