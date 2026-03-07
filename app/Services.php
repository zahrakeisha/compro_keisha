<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clients;

class Services extends Model
{
   protected $table ='services';
   protected $primaryKey ='service_id';
   protected $fillable = ['title', 'slug', 'image', 'description'];

   public function clients(){
      return $this->belongsTo(Clients::class, 'service_id', 'service_id');
   }
}
