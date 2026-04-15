<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymentDetails extends Model
{
  public function arp_Product()
  {
    return $this->belongsTo(arProduct::class,'ap_id');
  }
  public function bld_Product()
  {
    return $this->belongsTo(bldProduct::class,'bld_id');
  }
  public function gr_Product()
  {
    return $this->belongsTo(grProduct::class,'gr_id');
  }
  public function hm_Product()
  {
    return $this->belongsTo(hmProduct::class,'hm_id');
  }
  public function off_Product()
  {
    return $this->belongsTo(offProduct::class,'off_id');
  }
  public function sh_Product()
  {
    return $this->belongsTo(shProduct::class,'sh_id');
  }
  public function twn_Product()
  {
    return $this->belongsTo(twnProduct::class,'twn_id');
  }
  public function contact_Details()
  {
    return $this->belongsTo(contactDetails::class,'con_id');
  }
}
