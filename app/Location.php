<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	protected $fillable = [
		'location',
	];

	public function offices()
	{
	     	return $this->hasMany(Office::class);
	}

	public function assets()
	{
		return $this->hasMany(Asset::class);
	}

	public function issues()
	{
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
