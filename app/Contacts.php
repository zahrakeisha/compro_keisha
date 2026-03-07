<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table='contacts';
    protected $primaryKey='contact_id';
    protected $fillable=['name', 'email', 'message'];
}
