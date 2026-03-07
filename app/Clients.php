<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services;

class Clients extends Model
{
    protected $table='clients';
    protected $primaryKey='clients_id';
    protected $fillable=['name', 'description', 'logo','service_id'];

    //relasi ke service
public function services()
{
    return $this->belongsTo(Services::class, 'service_id');
}
}


