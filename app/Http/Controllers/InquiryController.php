<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arpProduct;
use App\Models\bldProduct;
use App\Models\vlProduct;
use App\Models\hmProduct;
use App\Models\shProduct;
use App\Models\offProduct;
use App\Models\twnProduct;
use App\Models\grProduct;
use App\Models\contactDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InquiryController extends Controller
{
    public function inquiry()
    {
      $aproducts = arpProduct::orderBy('created_at','DESC')->paginate(12);
      return view('inquiry',compact('aproducts'));
    }

    public function aproduct_details($aproduct_slug)
    {
      $aproduct = arpProduct::where('slug',$aproduct_slug)->first();
      $rproducts = arpProduct::where('slug','<>',$aproduct_slug)->get()->take(8);
    //  $arpproducts =User::where('mobile',Auth::user()->mobile)->get();
    //  $arpproducts =User::where('mobile',$aproduct_slug)->get();

      return view('details',compact('aproduct','rproducts'));
    }
    public function aproduct_index()
    {
      $arpducts = DB::table('arp_products')->where('id', '5')->get();
      $bldrpducts = DB::table('bld_products')->where('id', '9')->get();
      $vlrpducts = DB::table('vl_products')->where('id', '8')->get();
      $hmrpducts = DB::table('hm_products')->where('id', '4')->get();
      $offrpducts = DB::table('off_products')->where('id', '1')->get();
      $shrpducts = DB::table('sh_products')->where('id', '1')->get();
      //$cntdtails = DB::table('contact_details')->where('id', '5')->get();
      $cntdtail=contactDetails::orderBy('created_at','DESC')->paginate(12);

    //  $twnrpducts = DB::table('twn_products')->where('id', '5')->get();
    //  $grrpducts = DB::table('gr_products')->where('id', '5')->get();




      return view('index',compact('arpducts', 'bldrpducts','vlrpducts','hmrpducts','offrpducts','shrpducts','cntdtail'));
    }
//end of Apartment code set

  public function bldproduct_detailsB($bldproduct_slug)
  {
    $bldproduct = bldProduct::where('slug',$bldproduct_slug)->first();
    $rbldproducts = bldProduct::where('slug','<>',$bldproduct_slug)->get()->take(8);
    return view('detailsB',compact('bldproduct','rbldproducts'));
  }

  public function inquiryOne()
  {
    $bldproducts = bldProduct::orderBy('created_at','DESC')->paginate(12);
    return view('inquiryOne',compact('bldproducts'));
  }
  //end of Building code set


  public function inquiryAboutUs()
  {
  //  $vlproducts = DB::table('vl_products')->where('id', '9')->get();

      $vlproducts = vlProduct::where('id','9')->paginate(12);
    return view('inquiryAboutUs',compact('vlproducts'));
  }
  /*
  public function vlproduct_detailsVab($vlproduct_slug)
  {
    $vlproduct = vlProduct::where('slug',$vlproduct_slug)->first();
    $rvlproducts = vlProduct::where('slug','<>',$vlproduct_slug)->get()->take(8);
    return view('detailsV',compact('vlproduct','rvlproducts'));
  }*/



  public function vlproduct_detailsV($vlproduct_slug)
  {
    $vlproduct = vlProduct::where('slug',$vlproduct_slug)->first();
    $rvlproducts = vlProduct::where('slug','<>',$vlproduct_slug)->get()->take(8);
    return view('detailsV',compact('vlproduct','rvlproducts'));
  }

  public function inquiryTwo()
  {
    $vlproducts = vlProduct::orderBy('created_at','DESC')->paginate(12);
    return view('inquiryTwo',compact('vlproducts'));
  }

  //end of the villa code set


    public function hmproduct_detailsH($hmproduct_slug)
    {
      $hmproduct = hmProduct::where('slug',$hmproduct_slug)->first();
      $rhmproducts = hmProduct::where('slug','<>',$hmproduct_slug)->get()->take(8);
      return view('detailsH',compact('hmproduct','rhmproducts'));
    }

    public function inquiryThree()
    {
      $hmproducts = hmProduct::orderBy('created_at','DESC')->paginate(12);
      return view('inquiryThree',compact('hmproducts'));
    }

// end of home code.
    public function offproduct_detailsOff($offproduct_slug)
    {
      $offproduct = offProduct::where('slug',$offproduct_slug)->first();
      $roffproducts = offProduct::where('slug','<>',$offproduct_slug)->get()->take(8);
      return view('detailsOff',compact('offproduct','roffproducts'));
    }

    public function inquiryFour()
    {
      $offproducts = offProduct::orderBy('created_at','DESC')->paginate(12);
      return view('inquiryFour',compact('offproducts'));
    }

//end of the office code

public function shproduct_detailsS($shproduct_slug)
{
  $shproduct = shProduct::where('slug',$shproduct_slug)->first();
  $rshproducts = shProduct::where('slug','<>',$shproduct_slug)->get()->take(8);
  return view('detailsS',compact('shproduct','rshproducts'));
}

public function inquiryFive()
{
  $shproducts = shProduct::orderBy('created_at','DESC')->paginate(12);
  return view('inquiryFive',compact('shproducts'));
}
//end of the shop code
public function twnproduct_detailsT($twnproduct_slug)
{
  $twnproduct = twnProduct::where('slug',$twnproduct_slug)->first();
  $rtwnproducts = twnProduct::where('slug','<>',$twnproduct_slug)->get()->take(8);
  return view('detailsT',compact('twnproduct','rtwnproducts'));
}

public function inquirySix()
{
  $twnproducts = twnProduct::orderBy('created_at','DESC')->paginate(12);
  return view('inquirySix',compact('twnproducts'));
}
//end of the TownHouse code
public function grproduct_detailsG($grproduct_slug)
{
  $grproduct = grProduct::where('slug',$grproduct_slug)->first();
  $rgrproducts = grProduct::where('slug','<>',$grproduct_slug)->get()->take(8);
  return view('detailsG',compact('grproduct','rgrproducts'));
}

public function inquirySeven()
{
  $grproducts = grProduct::orderBy('created_at','DESC')->paginate(12);
  return view('inquirySeven',compact('grproducts'));
}



}
