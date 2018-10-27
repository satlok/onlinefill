<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable=[
        'parrent','child','name','user_id'
    ];
}
