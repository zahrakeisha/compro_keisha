<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Blogs;

class User extends Authenticatable
{
    use Notifiable;

   protected $table ='users';
   protected $primaryKey ='user_id';

   protected $fillable = ['name', 'email', 'password'];

   protected $hidden = ['password'];

   //relasi ke blogs
   public function blogs()
   {
    return  $this->hasMany(Blogs::class, 'user_id', 'user_id');
   }
}
