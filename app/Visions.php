<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visions extends Model
{
    protected $table = 'visions_missions';
    protected $primaryKey = 'vs_id';
    protected $fillable = ['type', 'content'];
}
