<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'user_id', 'title', 'pic','description',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function directory()
    {
        return $this->hasMany(Directory::class);
    }
    
    public static function boot()
{
        $key = md5(microtime().rand());
    parent::boot();
   
    static::saving(function ($model) {
        $model->b_key = md5(microtime().rand());
    });
}
}
