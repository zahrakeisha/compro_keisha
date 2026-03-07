<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Blogs extends Model
{
    protected $table='blogs';
    protected $primaryKey='blog_id';
    protected $fillable=['title', 'slug', 'thumbnail', 'content','user_id'];

    //relasi ke user
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
