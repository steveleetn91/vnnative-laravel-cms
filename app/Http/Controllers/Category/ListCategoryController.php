<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CategoryModel;
use Auth;
class ListCategoryController extends Controller
{
    //
    public function indexAction(){
        return view('admin.category.v1.list',
        array(
            'data' => CategoryModel::all()
        ));
    }
    /**
     * Delete record 
     */
    public function deleteAction($page_id,Request $request){
        try {
            $id = intval($page_id);
            if($id > 0 ) {
                /**
                 * Check category exists and permission
                 */
                $data = CategoryModel::where('id',$id)->where('user_id',Auth::user()->id);
                if($data->count() >= 1 ) {
                    $delete = $data->delete();
                    if($delete) {
                        $request->session()->put('delete_status',true);
                        return redirect()->route('ListCategory');
                    }
                    $request->session()->put('delete_status',false);
                    return redirect()->route('ListCategory');
                }
                throw new Exception("Permission denied delete " . $id);
            }
            throw new Exception("Delete page id " . $id . " failed");
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
}
