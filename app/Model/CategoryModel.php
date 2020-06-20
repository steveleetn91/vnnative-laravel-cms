<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
     //
     protected $table = 'category';
     protected $fillable = [
         'id','title', 'content', 'content_seo','slug','user_id','tags','thumbnail'
     ];
}
