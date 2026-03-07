<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table ='organization';
    protected $primaryKey ='org_id';
    protected $fillable=['image'];
}
