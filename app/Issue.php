<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['asset_id', 'status', 'description', 'user_id'];

     public function user(){
    	    	return $this->belongsTo(User::class);
     }

     public function location(){
    	    	return $this->belongsTo(Location::class);
     } 

     public function office()
     {
       	return $this->belongsTo(Office::class);
     }
}
