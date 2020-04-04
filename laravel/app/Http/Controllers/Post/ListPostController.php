<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostModel;
class ListPostController extends Controller
{
    //

    public function indexAction(){
        $posts = PostModel::all();
        return view('admin.post.list',array('data' => $posts));
    }
}
