<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
     protected $fillable = [
        'dir', 'color', 'board_id','parent_id'
    ];
     
     public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function material()
    {
        return $this->hasMany(Material::class);
    }
}
