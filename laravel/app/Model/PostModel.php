<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'id','title', 'content', 'content_seo','slug','user_id','thumbnail',
    ];
}
