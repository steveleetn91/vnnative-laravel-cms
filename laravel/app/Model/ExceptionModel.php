<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExceptionModel extends Model
{
    //
    protected $table = 'failed_jobs';
    protected $fillable = [
        'id','connection', 'queue', 'payload','exception','failed_at'
    ];
}
