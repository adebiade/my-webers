<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class contactDetails extends Model
{
  use HasFactory;
  public function payment_details()
  {
     return $this->hasMany(paymentDetails::class);
  }
}
