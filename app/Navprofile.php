<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navprofile extends Model
{
    protected $table ='nav_profile';
    protected $primaryKey='nav_id';
    protected $fillable=['company_name', 'logo', 'status'];
}
