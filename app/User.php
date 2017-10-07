<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    	use Notifiable;

      protected $fillable = [
      	'userName', 'user_id', 'password',
      ];

      protected $hidden = [
        	'password', 'remember_token',
      ];

      public function assets()
      {
        	return $this->hasMany(Asset::class);
      }

      public function services()
      {
          return $this->hasMany(Service::class);
      }

      public function issues()
      {
      	return $this->hasMany(Issue::class);
      }

      public function location(){
        return $this->belongsTo(Location::class);
      } 

      // public function publish(issue $issue)
      // {
      //     $this->issues()->save($issue);   
      // }

      public function roles()
      {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
      }

      public function role($roleName)
      {
          foreach ($this->roles()->get() as $role)
          {
              if ($role->name == $roleName)
              {
                  return true;
              }
          }

          return false;
      }
}
