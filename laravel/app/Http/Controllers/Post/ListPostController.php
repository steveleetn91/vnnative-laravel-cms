<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostModel;
use Exception;
class ListPostController extends Controller
{
    //

    public function indexAction(){
        try {
            $posts = PostModel::all();
            return view('admin.post.list',array('data' => $posts));
        }catch(Exception $e) {
            return $this->saveException($e->getMessage()); 
        }
    }
}
