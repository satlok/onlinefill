<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'title', 'matter', 'directory_id','img'
    ];
     public function directory()
    {
        return $this->belongsTo(Directory::class);
    }
}
