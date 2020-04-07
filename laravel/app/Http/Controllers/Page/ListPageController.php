<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PageModel;
use Exception;
use Illuminate\Support\Facades\Validator;
use Auth;
class ListPageController extends Controller
{
    //
    public function indexAction(){
        try {
            $posts = PageModel::all();
            return view('admin.page.list',array('data' => $posts));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Delete record 
     */
    public function deleteAction($page_id,Request $request){
        try {
            $id = intval($page_id);
            if($id > 0 ) {
                /**
                 * Check post exists and permission
                 */
                $data = PageModel::where('id',$id)->where('user_id',Auth::user()->id);
                if($data->count() >= 1 ) {
                    $delete = $data->delete();
                    if($delete) {
                        $request->session()->put('delete_status','successfully');
                        return redirect()->route('ListPage');
                    }
                    $request->session()->put('delete_status','failed');
                    return redirect()->route('ListPage');
                }
                throw new Exception("Permission denied delete " . $id);
            }
            throw new Exception("Delete page id " . $id . " failed");
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
}
