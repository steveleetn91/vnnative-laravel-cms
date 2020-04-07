<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Model\ExceptionModel;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveException($message){
        /**
         * If App using debug model 
         */
        if(env('APP_DEBUG') == true ) {
            print_r($message);
        }  
        /**
         * If off debug model then save into database to tracking system
         */
        else {
            ExceptionModel::create([
                'connection' => '',
                'queue' => '',
                'payload' => '',
                'exception' => $message,
                'failed_at' => date('Y-m-d H:i:s',time())
            ]);
            return redirect()->route('home');
        }
    }
}
