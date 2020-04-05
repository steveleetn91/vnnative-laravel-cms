<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PageModel;
use Exception;
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
}
