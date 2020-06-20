<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    //
    protected $table = 'setting';
    protected $fillable = [
        'id','key', 'value'
    ];
}
