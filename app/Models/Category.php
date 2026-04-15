<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
  use HasFactory;
  public function arp_products()
  {
     return $this->hasMany(arpProduct::class);
  }

  public function bld_products()
  {
     return $this->hasMany(bldProduct::class);
  }

  public function hm_products()
  {
     return $this->hasMany(hmProduct::class);
  }
  public function vl_products()
  {
     return $this->hasMany(vlProduct::class);
  }

  public function off_products()
  {
     return $this->hasMany(offProduct::class);
  }


  public function twn_products()
  {
     return $this->hasMany(twnProduct::class);
  }

  public function grproducts()
  {
     return $this->hasMany(grProduct::class);
  }

  public function shproducts()
  {
     return $this->hasMany(shProduct::class);
  }

  public function contactDetails()
  {
     return $this->hasMany(contactDetails::class);
  }
}
