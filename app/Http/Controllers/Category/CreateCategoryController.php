<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use App\Model\CategoryModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class CreateCategoryController extends Controller
{
    //
    public function indexAction(){
        /**
        * Check roles
        */
        if($this->checkRoles('add_category') === false ) {
            return redirect()->route('ListCategory');
        }
        /**
        * If role invalid 
        */
        return view('admin.category.v1.add');
    }

    /**
     * Insert
     */
    public function saveAction(Request $request){
        try {
            /**
             * Check roles
             */
            if($this->checkRoles('add_category') === false ) {
                return redirect()->route('ListCategory');
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
            $id = CategoryModel::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'tags' => $request->input('tags') ? $request->input('tags') : '',
                'content' => $request->input('content'),
                'content_seo' => $request->input('content-seo'),
                'thumbnail' => $request->input('thumbnail') 
                ? str_replace(url('/'),'',$request->input('thumbnail')) 
                : '',
                'user_id' => Auth::user()->id
            ]);
            if($id) {
                $request->session()->put('add_new_status',true);
                return redirect(route('ListCategory'));
            } else {
                $request->session()->put('add_new_status',false);
                return redirect(route('CreateCategory'));
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
            'tags' => 'required|max:75'
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return false;
    }
}
