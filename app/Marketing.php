<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $table = 'marketings';
    protected $primaryKey = 'marketing_id';
    protected $fillable =['name', 'phone', 'possition'];
}
