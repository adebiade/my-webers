<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}















































































//Apartment code startup
    public function arproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'slug' => 'required|unique:arp_products,slug',
       'short_description' => 'required',
       'description' => 'required',
       'address' => 'required',
        'squareft'=>'required',
       'regular_price' => 'required',
       'sale_price' => 'required',
       'SKU'=> 'required',
       'stock_status' => 'required',
       'featured' => 'required',
       'quantity' => 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
       'category_id' => 'required',
       'individualunit'=> '',
       'familyunit'=>'',
       'sharedwallfloor'=>'',
       'balconieorterrace'=>'',
       'entrancescorridors'=>'',
       'bedroom'=>'',
       'livingroom'=>'',
       'kitchen'=>'',
       'bathroom'=>'',
       'utilityarea'=>'',
       'flooringfinish'=>'',
       'electricitylighting'=>'',
       'plumbing'=>'',
       'hvacACUnits'=>'',
       'internetcableready'=>'',
       'locksintercom'=>'',
       'elevatorsstaircases'=>'',
       'parking'=>'',
       'securitysystem'=>'',
       'powerbackup'=>'',
       'wastedisposalsystem'=>'',
       'gymorfitnesscenter'=>'',
       'swimmingpool'=>'',
       'clubhouseorlounge'=>'',
       'childrenplayarea'=>'',
       'rooftopgardenterrace'=>'',
       'petfriendlyspaces'=>'',
       'Coworkingspaces'=>'',
    ]);

      $product = new arpProduct();
       $product->name = $request->name;
       $product->slug = Str::slug($request->name);
       $product->short_description = $request->short_description;
       $product->description = $request->description;
       $product->address = $request->address;
       $product->squareft = $request->squareft;
       $product->regular_price = $request->regular_price;
       $product->sale_price = $request->sale_price;
       $product->SKU = $request->SKU;
       $product->stock_status = $request->stock_status;
       $product->featured = $request->featured;
       $product->quantity = $request->quantity;
       $product->category_id = $request->category_id;

       $product->individualunit = $request->individualunit;
       $product->familyunit = $request->familyunit;
       $product->sharedwallfloor = $request->sharedwallfloor;
       $product->balconieorterrace = $request->balconieorterrace;
       $product->entrancescorridors = $request->entrancescorridors;
       $product->bedroom = $request->bedroom;
       $product->livingroom = $request->livingroom;
       $product->kitchen = $request->kitchen;

       $product->bathroom = $request->bathroom;
       $product->utilityarea = $request->utilityarea;
       $product->flooringfinish = $request->flooringfinish;
       $product->electricitylighting = $request->electricitylighting;
       $product->plumbing = $request->plumbing;
       $product->hvacACUnits = $request->hvacACUnits;
       $product->internetcableready = $request->internetcableready;
       $product->locksintercom = $request->locksintercom;

       $product->elevatorsstaircases = $request->elevatorsstaircases;
       $product->parking = $request->parking;
       $product->securitysystem = $request->securitysystem;
       $product->powerbackup = $request->powerbackup;
       $product->wastedisposalsystem = $request->wastedisposalsystem;
       $product->gymorfitnesscenter = $request->gymorfitnesscenter;
       $product->swimmingpool = $request->swimmingpool;
       $product->clubhouseorlounge = $request->clubhouseorlounge;

       $product->childrenplayarea = $request->childrenplayarea;
       $product->rooftopgardenterrace = $request->rooftopgardenterrace;
       $product->petfriendlyspaces = $request->petfriendlyspaces;
       $product->Coworkingspaces = $request->Coworkingspaces;



         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratearProductThumbnailImage($image,$imageName);
          $product->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if($request->hasFile('images'))
        {
           $allowedfileExtion = ['jpg','png','jpeg'];
           $files = $request->file('images');
           foreach($files as $file)
           {
              $gextension = $file->getClientOriginalExtension();
              $gcheck = in_array($gextension,$allowedfileExtion);
              if($gcheck)
              {
                  $gfileName = $current_timestamp . "-".$counter.".".$gextension;
                  $this->GeneratearProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);
        }
         $product->images = $gallery_images;
         $product->save();
         return redirect()->route('admin.arpProduct')->with('status','Apartment has been added suuccessfully!');

    }
    public function GeneratearProductThumbnailImage($image,$imageName)
   {
       $destinationPathThumbnail = public_path('uploads/arpproducts/thumbnails');
       $destinationPath = public_path('uploads/arpproducts');
       $img = Image::read($image->path());

       $img->cover(840,989,"top");
       $img->resize(840,989,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPath."/".$imageName);

       $img->resize(104,104,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPathThumbnail."/".$imageName);

   }

   public function arproduct_edit($id)
   {
     $arproduct = arpProduct::find($id);
     $categories = Category::select('id', 'name')->orderBy('name')->get();
       return view('admin.arproduct-edit',compact('arproduct','categories'));

   }
   public function arproduct_update(Request $request)
   {
     $request->validate([
      'name' => 'required',
      'slug' => 'required|unique:arp_products,slug,'.$request->id,
      'short_description' => 'required',
      'description' => 'required',
      'address' => 'required',
       'squareft'=>'required',
      'regular_price' => 'required',
      'sale_price' => 'required',
      'SKU'=> 'required',
      'stock_status' => 'required',
      'featured' => 'required',
      'quantity' => 'required',
      'image' => 'required|mimes:png,jpg,jpeg|max:2048',
      //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
      'category_id' => 'required',
      'individualunit'=> '',
      'familyunit'=>'',
      'sharedwallfloor'=>'',
      'balconieorterrace'=>'',
      'entrancescorridors'=>'',
      'bedroom'=>'',
      'livingroom'=>'',
      'kitchen'=>'',
      'bathroom'=>'',
      'utilityarea'=>'',
      'flooringfinish'=>'',
      'electricitylighting'=>'',
      'plumbing'=>'',
      'hvacACUnits'=>'',
      'internetcableready'=>'',
      'locksintercom'=>'',
      'elevatorsstaircases'=>'',
      'parking'=>'',
      'securitysystem'=>'',
      'powerbackup'=>'',
      'wastedisposalsystem'=>'',
      'gymorfitnesscenter'=>'',
      'swimmingpool'=>'',
      'clubhouseorlounge'=>'',
      'childrenplayarea'=>'',
      'rooftopgardenterrace'=>'',
      'petfriendlyspaces'=>'',
      'Coworkingspaces'=>'',
     ]);

     $product = arpProduct::find($request->id);
     $product->name = $request->name;
     $product->slug = Str::slug($request->name);
     $product->short_description = $request->short_description;
     $product->description = $request->description;
     $product->address = $request->address;
     $product->squareft = $request->squareft;
     $product->regular_price = $request->regular_price;
     $product->sale_price = $request->sale_price;
     $product->SKU = $request->SKU;
     $product->stock_status = $request->stock_status;
     $product->featured = $request->featured;
     $product->quantity = $request->quantity;
     $product->category_id = $request->category_id;

     $product->individualunit = $request->individualunit;
     $product->familyunit = $request->familyunit;
     $product->sharedwallfloor = $request->sharedwallfloor;
     $product->balconieorterrace = $request->balconieorterrace;
     $product->entrancescorridors = $request->entrancescorridors;
     $product->bedroom = $request->bedroom;
     $product->livingroom = $request->livingroom;
     $product->kitchen = $request->kitchen;

     $product->bathroom = $request->bathroom;
     $product->utilityarea = $request->utilityarea;
     $product->flooringfinish = $request->flooringfinish;
     $product->electricitylighting = $request->electricitylighting;
     $product->plumbing = $request->plumbing;
     $product->hvacACUnits = $request->hvacACUnits;
     $product->internetcableready = $request->internetcableready;
     $product->locksintercom = $request->locksintercom;

     $product->elevatorsstaircases = $request->elevatorsstaircases;
     $product->parking = $request->parking;
     $product->securitysystem = $request->securitysystem;
     $product->powerbackup = $request->powerbackup;
     $product->wastedisposalsystem = $request->wastedisposalsystem;
     $product->gymorfitnesscenter = $request->gymorfitnesscenter;
     $product->swimmingpool = $request->swimmingpool;
     $product->clubhouseorlounge = $request->clubhouseorlounge;

     $product->childrenplayarea = $request->childrenplayarea;
     $product->rooftopgardenterrace = $request->rooftopgardenterrace;
     $product->petfriendlyspaces = $request->petfriendlyspaces;
     $product->Coworkingspaces = $request->Coworkingspaces;

     $current_timestamp = Carbon::now()->timestamp;

     if($request->hasFile('image'))
     {
       if(File::exists(public_path('uploads/arpproducts').'/'.$product->image))
       {

         File::delete(public_path('uploads/arpproducts').'/'.$product->image);
       }
       if(File::exists(public_path('uploads/arpproducts/thumbnails').'/'.$product->image))
       {

         File::delete(public_path('uploads/arpproducts/thumbnails').'/'.$product->image);
       }
       $image = $request->file('image');
       $imageName = $current_timestamp.'.'.$image->extension();
        $this->GeneratearProductThumbnailImage($image,$imageName);
       $product->image = $imageName;
     }

     $gallery_arr = array();
     $gallery_images = "";
     $counter = 1;

     if($request->hasFile('images'))
     {

           foreach(explode(',',$product->images)as $ofile)
           {
             if(File::exists(public_path('uploads/arpproducts').'/'.$ofile))
             {

               File::delete(public_path('uploads/arpproducts').'/'.$ofile);
             }
             if(File::exists(public_path('uploads/arpproducts/thumbnails').'/'.$ofile))
             {

               File::delete(public_path('uploads/arpproducts/thumbnails').'/'.$ofile);
             }
           }


        $allowedfileExtion = ['jpg','png','jpeg'];
        $files = $request->file('images');
        foreach($files as $file)
        {
           $gextension = $file->getClientOriginalExtension();
           $gcheck = in_array($gextension,$allowedfileExtion);
           if($gcheck)
           {
               $gfileName = $current_timestamp . "-".$counter.".".$gextension;
               $this->GeneratearProductThumbnailImage($file,$gfileName);
               array_push($gallery_arr,$gfileName);
               $counter = $counter + 1;
           }
        }
        $gallery_images = implode(',',$gallery_arr);
        $product->images = $gallery_images;

     }
      $product->save();
      return redirect()->route('admin.arpProduct')->with('status', 'Properties has been updated successfully!');
   }
   public function arproduct_delete($id)
   {
     $arproduct = arpProduct::find($id);
     if(File::exists(public_path('uploads/arpproducts').'/'.$arproduct->image))
     {

       File::delete(public_path('uploads/arpproducts').'/'.$arproduct->image);
     }
     if(File::exists(public_path('uploads/arpproducts/thumbnails').'/'.$arproduct->image))
     {

       File::delete(public_path('uploads/arpproducts/thumbnails').'/'.$arproduct->image);
     }

     foreach(explode(',',$arproduct->images)as $ofile)
     {
       if(File::exists(public_path('uploads/arpproducts').'/'.$ofile))
       {

         File::delete(public_path('uploads/arpproducts').'/'.$ofile);
       }
       if(File::exists(public_path('uploads/arpproducts/thumbnails').'/'.$ofile))
       {

         File::delete(public_path('uploads/arpproducts/thumbnails').'/'.$ofile);
       }
     }

     $arproduct->delete();
     return redirect()->route('admin.arpProduct')->with('status','Apartment has been deleted successfully');
   }
   //Apartment code end up
