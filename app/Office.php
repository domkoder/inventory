<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

	protected $fillable = ['office', 'location_id'];

	public function location(){
	    	return $this->belongsTo(Location::class);
   	} 

   	public function assets()
	{
		return $this->hasMany(Asset::class);
	}

	public function issues(){
		return $this->hasMany(Issue::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function services()
     {
          return $this->hasMany(Service::class);
     }
}
