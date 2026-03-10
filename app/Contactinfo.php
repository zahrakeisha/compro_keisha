<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactinfo extends Model
{
    protected $table ='contactinfo';
    protected $primaryKey ='contactfo_id';
    protected $fillable =['name', 'gmaps', 'email', 'phone', 'address', 'status'];
}
