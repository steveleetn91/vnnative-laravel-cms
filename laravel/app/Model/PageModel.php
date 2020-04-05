<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    //
    protected $table = 'pages';
    protected $fillable = [
        'id','title', 'content', 'content_seo','slug','user_id'
    ];
}
