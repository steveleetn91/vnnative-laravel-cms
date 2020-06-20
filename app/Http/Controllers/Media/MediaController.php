<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function indexAction(){
        return view('admin.media.v1');
    }
}
