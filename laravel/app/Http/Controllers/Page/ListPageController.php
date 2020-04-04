<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PageModel;
class ListPageController extends Controller
{
    //
    public function indexAction(){
        $posts = PageModel::all();
        return view('admin.page.list',array('data' => $posts));
    }
}
