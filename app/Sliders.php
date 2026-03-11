<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table ='home_sliders';
    protected $primaryKey ='sliders_id';
    protected $fillable =['title', 'image', 'description', 'status'];
}
