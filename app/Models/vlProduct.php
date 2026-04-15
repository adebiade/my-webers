<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class vlProduct extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->belongsTo(Category::class,'category_id');
  }
  public function payment_details()
  {
     return $this->hasMany(paymentDetails::class);
  }
}
