<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostModel;
use Exception;
use Auth;
class ListPostController extends Controller
{
    //

    public function indexAction(){
        try {
            $posts = PostModel::all();
            /**
             * Check roles
             */
            if($this->checkRoles('see_post') === false ) {
                $posts = PostModel::where('user_id',Auth::user()->id);
            } else {
                $posts = PostModel::all();
            }
            /**
             * If role invalid 
             */
            return view('admin.post.v1.list',array('data' => $posts));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
    /**
     * Delete record 
     */
    public function deleteAction($post_id,Request $request){
        try {
            $id = intval($post_id);
            if($id > 0 ) {
                /**
                 * Check post exists and permission
                 */
                $data = PostModel::where('id',$id)->where('user_id',Auth::user()->id);
                if($data->count() >= 1 ) {
                    $delete = $data->delete();
                    if($delete) {
                        $request->session()->put('delete_status',true);
                        return redirect()->route('ListPost');
                    }
                    $request->session()->put('delete_status',false);
                    return redirect()->route('ListPost');
                }
                throw new Exception("Permission denied delete " . $id);
            }
            throw new Exception("Delete post id " . $id . " failed");
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
}
