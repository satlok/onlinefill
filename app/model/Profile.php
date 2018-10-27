<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $fillable = [
        'user_id','profilename','education','skill', 'phone', 'dob','pic','address','pin','country', 'city','state','pin','lat','long'
    ];
  
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
