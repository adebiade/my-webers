<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\arpProduct;
use App\Models\bldProduct;
use App\Models\hmProduct;
use App\Models\vlProduct;
use App\Models\offProduct;
use App\Models\twnProduct;
use App\Models\grProduct;
use App\Models\shProduct;
use App\Models\contactDetails;




class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function categories()
  {
    $categories = Category::orderBy('id','DESC')->paginate(15);
    return view('admin.categories',compact('categories'));
  }
  public function category_add()
  {
    return view('admin.category-add');
  }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image'=> 'mimes:png,jpg,jpeg|max:2048'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $image= $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extension;
        $this->GenerateCategoryThumbnailsImage($image,$file_name);
        $category->image = $file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status','category has been updated successfully');


    }
     public function GenerateCategoryThumbnailsImage($image,$imageName)
    {
        $destinationPath = public_path('uploads/categories');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath."/".$imageName);
    }
    public function category_edit($id)
    {
      $category = Category::find($id);
      return view('admin.category-edit',compact('category'));
    }
    public function category_update(Request $request)
      {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image'=> 'mimes:png,jpg,jpeg|max:2048'
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/categories').'/'.$category->image))
            {
                File::delete(public_path('uploads/categories').'/'.$category->image);
            }
            $image= $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extension;
            $this->GenerateCategoryThumbnailsImage($image,$file_name);
            $category->image = $file_name;

        }
        $category->save();
        return redirect()->route('admin.categories')->with('status','categories has been updated successfully');
    }

    public function category_delete($id)
    {
        $categories = Category::find($id);
        if(File::exists(public_path('uploads/categories').'/'.$categories->image))
        {
            File::delete(public_path('uploads/categories').'/'.$categories->image);
        }
        $categories->delete();
        return redirect()->route('admin.categories')->with('status', 'Category has been deleted successfully!');
    }


    public function add_Property()
    {
      return view('admin.addProperty');
    }

    public function arpProduct()
    {
        $arpproducts = arpProduct::orderBy('created_at','DESC')->paginate(60);
        return view('admin.arpproducts',compact('arpproducts'));
    }

    public function bldProduct()
    {
        $bldproducts = bldProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.bldproducts',compact('bldproducts'));
    }

    public function hmProduct()
    {
        $hmproducts = hmProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.hmproducts',compact('hmproducts'));
    }

    public function vlProduct()
    {
        $vlproducts = vlProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.vlproducts',compact('vlproducts'));
    }

    public function offProduct()
    {
        $offproducts = offProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.offproducts',compact('offproducts'));
    }

    public function twnProduct()
    {
        $twnproducts = twnProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.twnproducts',compact('twnproducts'));
    }

    public function grProduct()
    {
        $grgproducts = grProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.grproducts',compact('grgproducts'));
    }

    public function shProduct()
    {
        $shproducts = shProduct::orderBy('created_at','DESC')->paginate(10);
        return view('admin.shproducts',compact('shproducts'));
    }
    public function arproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.arproduct-add',compact('categories'));
    }

    public function bldproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.bldproduct-add',compact('categories'));
    }

    public function vllproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.vllproduct-add',compact('categories'));
    }

    public function hmproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.hmproduct-add',compact('categories'));
    }

    public function twnproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.twnproduct-add',compact('categories'));
    }

    public function offproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.offproduct-add',compact('categories'));
    }
    public function shproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.shproduct-add',compact('categories'));
    }

    public function grgproduct_add()
    {
      $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.grgproduct-add',compact('categories'));
    }

    //Apartment code startup
    public function arproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'username' => 'required',
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
       'availability'=>'required',
       'mobile'=>'required',
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
       $product->username = $request->username;
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
       $product->availability = $request->availability;
       $product->mobile = $request->mobile;

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
          if($imageName)
          {
           $this->GeneratearProductThumbnailImage($image,$imageName);
          $product->image = $imageName;
          }
          else{
            $messages = "Check your uploading file";
            return redirect()->route('user.arproduct.add')->with('status','$messages');
          }
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
              else{
                $messages = "Check your uploading file";
                return redirect()->route('user.arproduct.add')->with('status','$messages');
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
      'username' => 'required',
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
      'availability' =>'required',
      'mobile' =>'required',

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
     $product->username = $request->username;
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
     $product->availability = $request->availability;
     $product->mobile = $request->mobile;
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




    //Building code startup
    public function bldproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'username'=>'required',
       'slug' => 'required|unique:bld_products,slug',
       'short_description' => 'required',
       'description' => 'required',
       'address' => 'required',
        'squareft'=>'required',
       'regular_price' => 'required',
       'sale_price' => 'required',
       'foundation'=> '',
       'frame'=>'',
       'walls'=>'',
       'roof'=>'',
       'windowsdoors'=>'',
       'balconiesverandas'=>'',
       'staircaseselevators'=>'',
       'facadedesign'=>'',
       'Flooring'=>'',
       'ceilingdesign'=>'',
       'lightingfixtures'=>'',
       'rooms'=>'',
       'hvacsystems'=>'',
       'electricalwiring'=>'',
       'plumbing'=>'',
       'firesafetysystems'=>'',
       'smartsystems'=>'',
       'securitysystems'=>'',
       'internetnetworkcabling'=>'',
       'insulation'=>'',
       'solarpanels'=>'',
       'rainwaterharvesting'=>'',
       'greenroofswalls'=>'',
       'ramps'=>'',
       'accessiblerestrooms'=>'',
       'widedoorwayshallways '=>'',
       'availability '=>'required',
       'mobile'=>'required',

       'SKU'=> 'required',
       'stock_status' => 'required',
       'featured' => 'required',
       'quantity' => 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
       'category_id' => 'required',
    ]);

       $bldproduct = new bldProduct();
       $bldproduct->name = $request->name;
       $bldproduct->username = $request->username;
       $bldproduct->mobile = $request->mobile;
       $bldproduct->availability = $request->availability;
       $bldproduct->slug = Str::slug($request->name);
       $bldproduct->short_description = $request->short_description;
       $bldproduct->description = $request->description;
       $bldproduct->address = $request->address;
       $bldproduct->squareft = $request->squareft;
       $bldproduct->regular_price = $request->regular_price;
       $bldproduct->sale_price = $request->sale_price;
       $bldproduct->SKU = $request->SKU;
       $bldproduct->stock_status = $request->stock_status;
       $bldproduct->featured = $request->featured;
       $bldproduct->quantity = $request->quantity;
       $bldproduct->category_id = $request->category_id;
       $bldproduct->foundation = $request->foundation;
       $bldproduct->frame = $request->frame;
       $bldproduct->walls = $request->walls;
       $bldproduct->roof = $request->roof;
       $bldproduct->windowsdoors = $request->windowsdoors;
       $bldproduct->balconiesverandas = $request->balconiesverandas;

       $bldproduct->staircaseselevators = $request->staircaseselevators;
       $bldproduct->facadedesign = $request->facadedesign;
       $bldproduct->Flooring = $request->Flooring;
       $bldproduct->ceilingdesign = $request->ceilingdesign;
       $bldproduct->lightingfixtures = $request->lightingfixtures;
       $bldproduct->rooms = $request->rooms;
       $bldproduct->hvacsystems = $request->hvacsystems;
       $bldproduct->electricalwiring = $request->electricalwiring;

       $bldproduct->plumbing = $request->plumbing;
       $bldproduct->firesafetysystems = $request->firesafetysystems;
       $bldproduct->smartsystems = $request->smartsystems;
       $bldproduct->securitysystems = $request->securitysystems;
       $bldproduct->internetnetworkcabling = $request->internetnetworkcabling;
       $bldproduct->insulation = $request->insulation;
       $bldproduct->solarpanels = $request->solarpanels;
       $bldproduct->rainwaterharvesting = $request->rainwaterharvesting;

       $bldproduct->greenroofswalls = $request->greenroofswalls;
       $bldproduct->ramps = $request->ramps;
       $bldproduct->accessiblerestrooms = $request->accessiblerestrooms;
       $bldproduct->widedoorwayshallways = $request->widedoorwayshallways;

         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratebldProductThumbnailImage($image,$imageName);
          $bldproduct->image = $imageName;
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
                  $this->GeneratebldProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);
           $bldproduct->images = $gallery_images;

        }
         $bldproduct->save();
         return redirect()->route('admin.bldProduct')->with('status','Building has been added suuccessfully!');

    }
    public function GeneratebldProductThumbnailImage($image,$imageName)
   {
       $destinationPathThumbnail = public_path('uploads/bldproducts/thumbnails');
       $destinationPath = public_path('uploads/bldproducts');
       $img = Image::read($image->path());

       $img->cover(840,989,"top");
       $img->resize(840,989,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPath."/".$imageName);

       $img->resize(104,104,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPathThumbnail."/".$imageName);

   }


public function bldproduct_edit($id)
 {
   $ebldproduct = bldProduct::find($id);
   $categories = Category::select('id', 'name')->orderBy('name')->get();
     return view('admin.bldproduct-edit',compact('ebldproduct','categories'));
 }
 public function bldproduct_update(Request $request)
 {
   $request->validate([
    'name' => 'required',
    'username' => 'required',
    'mobile' => 'required',
    'availability' => 'required',
    'slug' => 'required|unique:bld_products,slug,'.$request->id,
    'short_description' => 'required',
    'description' => 'required',
    'address' => 'required',
    'squareft'=>'required',
    'regular_price' => 'required',
    'sale_price' => 'required',
    'foundation'=> '',
    'frame'=>'',
    'walls'=>'',
    'roof'=>'',
    'windowsdoors'=>'',
    'balconiesverandas'=>'',
    'staircaseselevators'=>'',
    'facadedesign'=>'',
    'Flooring'=>'',
    'ceilingdesign'=>'',
    'lightingfixtures'=>'',
    'rooms'=>'',
    'hvacsystems'=>'',
    'electricalwiring'=>'',
    'plumbing'=>'',
    'firesafetysystems'=>'',
    'smartsystems'=>'',
    'securitysystems'=>'',
    'internetnetworkcabling'=>'',
    'insulation'=>'',
    'solarpanels'=>'',
    'rainwaterharvesting'=>'',
    'greenroofswalls'=>'',
    'ramps'=>'',
    'accessiblerestrooms'=>'',
    'widedoorwayshallways '=>'',
    'SKU'=> 'required',
    'stock_status' => 'required',
    'featured' => 'required',
    'quantity' => 'required',
    'image' => 'required|mimes:png,jpg,jpeg|max:2048',
    //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
    'category_id' => 'required',
 ]);

   $edproduct = bldProduct::find($request->id);
    $edproduct ->name = $request->name;
    $edproduct->username = $request->username;
    $edproduct->mobile = $request->mobile;
    $edproduct->availability = $request->availability;
    $edproduct->slug = Str::slug($request->name);
    $edproduct->short_description = $request->short_description;
    $edproduct->description = $request->description;
    $edproduct->address = $request->address;
    $edproduct->squareft = $request->squareft;
    $edproduct->regular_price = $request->regular_price;
    $edproduct->sale_price = $request->sale_price;
    $edproduct->SKU = $request->SKU;
    $edproduct->stock_status = $request->stock_status;
    $edproduct->featured = $request->featured;
    $edproduct->quantity = $request->quantity;
    $edproduct->foundation = $request->foundation;
    $edproduct->frame = $request->frame;
    $edproduct->walls = $request->walls;
    $edproduct->roof = $request->roof;
    $edproduct->windowsdoors = $request->windowsdoors;
    $edproduct->balconiesverandas = $request->balconiesverandas;

    $edproduct->staircaseselevators = $request->staircaseselevators;
    $edproduct->facadedesign = $request->facadedesign;
    $edproduct->Flooring = $request->Flooring;
    $edproduct->ceilingdesign = $request->ceilingdesign;
    $edproduct->lightingfixtures = $request->lightingfixtures;
    $edproduct->rooms = $request->rooms;
    $edproduct->hvacsystems = $request->hvacsystems;
    $edproduct->electricalwiring = $request->electricalwiring;

    $edproduct->plumbing = $request->plumbing;
    $edproduct->firesafetysystems = $request->firesafetysystems;
    $edproduct->smartsystems = $request->smartsystems;
    $edproduct->securitysystems = $request->securitysystems;
    $edproduct->internetnetworkcabling = $request->internetnetworkcabling;
    $edproduct->insulation = $request->insulation;
    $edproduct->solarpanels = $request->solarpanels;
    $edproduct->rainwaterharvesting = $request->rainwaterharvesting;

    $edproduct->greenroofswalls = $request->greenroofswalls;
    $edproduct->ramps = $request->ramps;
    $edproduct->accessiblerestrooms = $request->accessiblerestrooms;
    $edproduct->widedoorwayshallways = $request->widedoorwayshallways;
    $edproduct->category_id = $request->category_id;

   $current_timestamp = Carbon::now()->timestamp;

   if($request->hasFile('image'))
   {
     if(File::exists(public_path('uploads/bldproducts').'/'.$edproduct->image))
     {

       File::delete(public_path('uploads/bldproducts').'/'.$edproduct->image);
     }
     if(File::exists(public_path('uploads/bldproducts/thumbnails').'/'.$edproduct->image))
     {

       File::delete(public_path('uploads/bldproducts/thumbnails').'/'.$edproduct->image);
     }
     $image = $request->file('image');
     $imageName = $current_timestamp.'.'.$image->extension();
      $this->GeneratebldProductThumbnailImage($image,$imageName);
     $edproduct->image = $imageName;
   }

   $gallery_arr = array();
   $gallery_images = "";
   $counter = 1;

   if($request->hasFile('images'))
   {

         foreach(explode(',',$edproduct->images)as $ofile)
         {
           if(File::exists(public_path('uploads/bldproducts').'/'.$ofile))
           {

             File::delete(public_path('uploads/bldproducts').'/'.$ofile);
           }
           if(File::exists(public_path('uploads/bldproducts/thumbnails').'/'.$ofile))
           {

             File::delete(public_path('uploads/bldproducts/thumbnails').'/'.$ofile);
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
             $this->GeneratebldProductThumbnailImage($file,$gfileName);
             array_push($gallery_arr,$gfileName);
             $counter = $counter + 1;
         }
      }
      $gallery_images = implode(',',$gallery_arr);
      $edproduct->images = $gallery_images;

   }
    $edproduct->save();
    return redirect()->route('admin.bldProduct')->with('status', 'Properties has been updated successfully!');
 }
 public function bldproduct_delete($id)
 {
   $bldproduct = bldProduct::find($id);
   if(File::exists(public_path('uploads/bldproducts').'/'.$bldproduct->image))
   {

     File::delete(public_path('uploads/bldproducts').'/'.$bldproduct->image);
   }
   if(File::exists(public_path('uploads/bldproducts/thumbnails').'/'.$bldproduct->image))
   {

     File::delete(public_path('uploads/bldproducts/thumbnails').'/'.$bldproduct->image);
   }

   foreach(explode(',',$bldproduct->images)as $ofile)
   {
     if(File::exists(public_path('uploads/bldproducts').'/'.$ofile))
     {

       File::delete(public_path('uploads/bldproducts').'/'.$ofile);
     }
     if(File::exists(public_path('uploads/bldproducts/thumbnails').'/'.$ofile))
     {

       File::delete(public_path('uploads/bldproducts/thumbnails').'/'.$ofile);
     }
   }

   $bldproduct->delete();
   return redirect()->route('admin.bldProduct')->with('status','Apartment has been deleted successfully');
 }
//building code ends here

//Home code startup
    public function hmproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'slug' => 'required|unique:hm_products,slug',
       'short_description' => 'required',
       'description' => 'required',
       'bedroom'=> '',
       'bathroom'=>'',
       'address' => 'required',
        'squareft'=>'required',
        'sale_price' => 'required',
        'regular_price' => 'required',
        'category_id' => 'required',
        'featured' => 'required',
       'stock_status' => 'required',
       'quantity' => 'required',
       'SKU'=> 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
       'dining'=> '',
       'foundation'=>'',
       'windows'=>'',
       'roof'=>'',
       'storage'=>'',
       'pchblnydeck'=>'',
       'homeofficestudy'=>'',
       'facadedesign'=>'',
       'flooring'=>'',
       'laundryroom'=>'',
       'lighting'=>'',
       'livingrooms'=>'',
       'hvac'=>'',
       'gym'=>'',
       'plumbing'=>'',
       'fireplace'=>'',
       'smartsystems'=>'',
       'securitysystems'=>'',
       'securelcksdoors'=>'',
       'ldscpngYardgdenspce'=>'',
       'fireextinguishers'=>'',
       'Sstnablebuldngmtrls'=>'',
       'solarpanels'=>'',
       'energyeffictapplnce'=>'',
       'soundproof'=>'',
       'rainwaterharvesting'=>'',
       'swmgplhottub'=>'',
       'drivewaygarage'=>'',
       'smartsystems'=>'',
       'foundation'=>'',


    ]);

       $hmproduct = new hmProduct();
       $hmproduct->name = $request->name;
       $hmproduct->slug = Str::slug($request->name);
       $hmproduct->address = $request->address;
       $hmproduct->squareft = $request->squareft;
       $hmproduct->category_id = $request->category_id;
       $hmproduct->short_description = $request->short_description;
       $hmproduct->description = $request->description;
       $hmproduct->regular_price = $request->regular_price;
       $hmproduct->sale_price = $request->sale_price;
       $hmproduct->SKU = $request->SKU;
       $hmproduct->quantity = $request->quantity;
       $hmproduct->stock_status = $request->stock_status;
       $hmproduct->featured = $request->featured;
       $hmproduct->roof = $request->roof;
       $hmproduct->drivewaygarage = $request->drivewaygarage;
       $hmproduct->pchblnydeck = $request->pchblnydeck;
       $hmproduct->ldscpngYardgdenspce = $request->ldscpngYardgdenspce;
       $hmproduct->swmgplhottub = $request->swmgplhottub;
       $hmproduct->bedroom = $request->bedroom;
       $hmproduct->bathroom = $request->bathroom;
       $hmproduct->laundryroom = $request->laundryroom;
       $hmproduct->storage = $request->storage;
       $hmproduct->livingrooms = $request->livingrooms;
       $hmproduct->fireplace = $request->fireplace;
       $hmproduct->dining = $request->dining;
       $hmproduct->flooring = $request->flooring;
       $hmproduct->lighting = $request->lighting;
       $hmproduct->hvac = $request->hvac;
       $hmproduct->windows = $request->windows;
       $hmproduct->gym = $request->gym;
       $hmproduct->homeofficestudy = $request->homeofficestudy;
       $hmproduct->soundproof = $request->soundproof;
       $hmproduct->securitysystems = $request->securitysystems;
       $hmproduct->plumbing = $request->plumbing;
       $hmproduct->fireextinguishers = $request->fireextinguishers;
       $hmproduct->securelcksdoors = $request->securelcksdoors;
       $hmproduct->solarpanels = $request->solarpanels;
       $hmproduct->energyeffictapplnce = $request->energyeffictapplnce;
       $hmproduct->rainwaterharvesting = $request->rainwaterharvesting;
       $hmproduct->Sstnablebuldngmtrls = $request->Sstnablebuldngmtrls;
       $hmproduct->smartsystems = $request->smartsystems;

       $hmproduct->foundation = $request->foundation;

       $hmproduct->facadedesign = $request->facadedesign;




         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratehmProductThumbnailImage($image,$imageName);
          $hmproduct->image = $imageName;
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
                  $this->GeneratehmProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);

        }
        $hmproduct->images = $gallery_images;
        $hmproduct->save();
         return redirect()->route('admin.hmProduct')->with('status','Home has been added suuccessfully!');

    }
    public function GeneratehmProductThumbnailImage($image,$imageName)
   {
       $destinationPathThumbnail = public_path('uploads/hmproducts/thumbnails');
       $destinationPath = public_path('uploads/hmproducts');
       $img = Image::read($image->path());

       $img->cover(840,989,"top");
       $img->resize(840,989,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPath."/".$imageName);

       $img->resize(104,104,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPathThumbnail."/".$imageName);

   }


   public function hmproduct_edit($id)
      {
        $hmproduct = hmProduct::find($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
          return view('admin.hmproduct-edit',compact('hmproduct','categories'));

      }
      public function hmproduct_update(Request $request)
      {
           $request->validate([
           'name' => 'required',
           'slug' => 'required|unique:hm_products,slug,'.$request->id,
           'short_description' => 'required',
           'description' => 'required',
           'bedroom'=> '',
           'bathroom'=>'',
           'address' => 'required',
            'squareft'=>'required',
            'sale_price' => 'required',
            'regular_price' => 'required',
            'category_id' => 'required',
            'featured' => 'required',
           'stock_status' => 'required',
           'quantity' => 'required',
           'SKU'=> 'required',
           'image' => 'required|mimes:png,jpg,jpeg|max:2048',
           //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
           'dining'=> '',
           'foundation'=>'',
           'windows'=>'',
           'roof'=>'',
           'storage'=>'',
           'pchblnydeck'=>'',
           'homeofficestudy'=>'',
           'facadedesign'=>'',
           'flooring'=>'',
           'laundryroom'=>'',
           'lighting'=>'',
           'livingrooms'=>'',
           'hvac'=>'',
           'gym'=>'',
           'plumbing'=>'',
           'fireplace'=>'',
           'smartsystems'=>'',
           'securitysystems'=>'',
           'securelcksdoors'=>'',
           'ldscpngYardgdenspce'=>'',
           'fireextinguishers'=>'',
           'Sstnablebuldngmtrls'=>'',
           'solarpanels'=>'',
           'energyeffictapplnce'=>'',
           'soundproof'=>'',
           'rainwaterharvesting'=>'',
           'swmgplhottub'=>'',
           'drivewaygarage'=>'',
           'smartsystems'=>'',
           'foundation'=>'',


          ]);

           $hmproduct =hmProduct::find($request->id);
           $hmproduct->name = $request->name;
           $hmproduct->slug = Str::slug($request->name);
           $hmproduct->address = $request->address;
           $hmproduct->squareft = $request->squareft;
           $hmproduct->category_id = $request->category_id;
           $hmproduct->short_description = $request->short_description;
           $hmproduct->description = $request->description;
           $hmproduct->regular_price = $request->regular_price;
           $hmproduct->sale_price = $request->sale_price;
           $hmproduct->SKU = $request->SKU;
           $hmproduct->quantity = $request->quantity;
           $hmproduct->stock_status = $request->stock_status;
           $hmproduct->featured = $request->featured;
           $hmproduct->roof = $request->roof;
           $hmproduct->drivewaygarage = $request->drivewaygarage;
           $hmproduct->pchblnydeck = $request->pchblnydeck;
           $hmproduct->ldscpngYardgdenspce = $request->ldscpngYardgdenspce;
           $hmproduct->swmgplhottub = $request->swmgplhottub;
           $hmproduct->bedroom = $request->bedroom;
           $hmproduct->bathroom = $request->bathroom;
           $hmproduct->laundryroom = $request->laundryroom;
           $hmproduct->storage = $request->storage;
           $hmproduct->livingrooms = $request->livingrooms;
           $hmproduct->fireplace = $request->fireplace;
           $hmproduct->dining = $request->dining;
           $hmproduct->flooring = $request->flooring;
           $hmproduct->lighting = $request->lighting;
           $hmproduct->hvac = $request->hvac;
           $hmproduct->windows = $request->windows;
           $hmproduct->gym = $request->gym;
           $hmproduct->homeofficestudy = $request->homeofficestudy;
           $hmproduct->soundproof = $request->soundproof;
           $hmproduct->securitysystems = $request->securitysystems;
           $hmproduct->plumbing = $request->plumbing;
           $hmproduct->fireextinguishers = $request->fireextinguishers;
           $hmproduct->securelcksdoors = $request->securelcksdoors;
           $hmproduct->solarpanels = $request->solarpanels;
           $hmproduct->energyeffictapplnce = $request->energyeffictapplnce;
           $hmproduct->rainwaterharvesting = $request->rainwaterharvesting;
           $hmproduct->Sstnablebuldngmtrls = $request->Sstnablebuldngmtrls;
           $hmproduct->smartsystems = $request->smartsystems;
           $hmproduct->foundation = $request->foundation;
           $hmproduct->facadedesign = $request->facadedesign;

        $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          if(File::exists(public_path('uploads/hmproducts').'/'.$hmproduct->image))
          {

            File::delete(public_path('uploads/hmproducts').'/'.$hmproduct->image);
          }
          if(File::exists(public_path('uploads/hmproducts/thumbnails').'/'.$hmproduct->image))
          {

            File::delete(public_path('uploads/hmproducts/thumbnails').'/'.$hmproduct->image);
          }
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratehmProductThumbnailImage($image,$imageName);
          $hmproduct->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if($request->hasFile('images'))
        {

              foreach(explode(',',$hmproduct->images)as $ofile)
              {
                if(File::exists(public_path('uploads/hmproducts').'/'.$ofile))
                {

                  File::delete(public_path('uploads/hmproducts').'/'.$ofile);
                }
                if(File::exists(public_path('uploads/hmproducts/thumbnails').'/'.$ofile))
                {

                  File::delete(public_path('uploads/hmproducts/thumbnails').'/'.$ofile);
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
                  $this->GeneratehmProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);
           $hmproduct->images = $gallery_images;

        }
         $hmproduct->save();
         return redirect()->route('admin.hmProduct')->with('status', 'Properties has been updated successfully!');
      }
      public function hmproduct_delete($id)
      {
        $hmproduct = hmProduct::find($id);
        if(File::exists(public_path('uploads/hmproducts').'/'.$hmproduct->image))
        {

          File::delete(public_path('uploads/hmproducts').'/'.$hmproduct->image);
        }
        if(File::exists(public_path('uploads/hmproducts/thumbnails').'/'.$hmproduct->image))
        {

          File::delete(public_path('uploads/hmproducts/thumbnails').'/'.$hmproduct->image);
        }

        foreach(explode(',',$hmproduct->images)as $ofile)
        {
          if(File::exists(public_path('uploads/hmproducts').'/'.$ofile))
          {

            File::delete(public_path('uploads/hmproducts').'/'.$ofile);
          }
          if(File::exists(public_path('uploads/hmproducts/thumbnails').'/'.$ofile))
          {

            File::delete(public_path('uploads/hmproducts/thumbnails').'/'.$ofile);
          }
        }

        $hmproduct->delete();
        return redirect()->route('admin.hmProduct')->with('status','Home has been deleted successfully');
      }

    //Home code end up

    //Villa code start up
    public function vlproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'username' => 'required',
       'mobile' => 'required',
       'availability' => 'required',
       'slug' => 'required|unique:vl_products,slug',
       'short_description' => 'required',
       'description' => 'required',
       'address' => 'required',
       'squareft'=>'required',
       'sale_price' => 'required',
       'regular_price' => 'required',
       'bedroom'=> '',
       'bathroom'=>'',
       'independentstructure'=> '',
       'spaciouslayout'=>'',
       'highceilings'=>'',
       'modernclscaesthtics'=>'',
       'privategardenlawn'=>'',
       'homeofficestudy'=>'',
       'Swimmingpool'=>'',
       'kitchen'=>'',
       'hvac'=>'',
       'electrical'=>'',
       'patiodeck'=>'',
       'plumbing'=>'',
       'drvwygrgathtics'=>'',
       'smartsystems'=>'',
       'bndrywllsfencing'=>'',
       'sveillancesystms'=>'',
       'highspeedinternet'=>'',
       'gatedentry'=>'',
       'SKU'=> 'required',
       'stock_status' => 'required',
       'featured' => 'required',
       'quantity' => 'required',
       'category_id' => 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',

    ]);
    $hmproduct = new vlProduct();
    $hmproduct->name = $request->name;
    $hmproduct->username = $request->username;
    $hmproduct->mobile = $request->mobile;
    $hmproduct->availability = $request->availability;

    $hmproduct->slug = Str::slug($request->name);
    $hmproduct->address = $request->address;
    $hmproduct->squareft = $request->squareft;
    $hmproduct->short_description = $request->short_description;
    $hmproduct->description = $request->description;
    $hmproduct->sale_price = $request->sale_price;
    $hmproduct->regular_price = $request->regular_price;
    $hmproduct->bedroom = $request->bedroom;
    $hmproduct->bathroom = $request->bathroom;

           $hmproduct->independentstructure = $request->independentstructure;
           $hmproduct->spaciouslayout = $request->spaciouslayout;
           $hmproduct->highceilings = $request->highceilings;
           $hmproduct->modernclscaesthtics = $request->modernclscaesthtics;
           $hmproduct->privategardenlawn = $request->privategardenlawn;

           $hmproduct->homeofficestudy = $request->homeofficestudy;
           $hmproduct->Swimmingpool = $request->Swimmingpool;
           $hmproduct->kitchen = $request->kitchen;
           $hmproduct->hvac = $request->hvac;
           $hmproduct->patiodeck = $request->patiodeck;
           $hmproduct->plumbing = $request->plumbing;
           $hmproduct->drvwygrgathtics = $request->drvwygrgathtics;
           $hmproduct->smartsystems = $request->smartsystems;
           $hmproduct->bndrywllsfencing = $request->bndrywllsfencing;

           $hmproduct->sveillancesystms = $request->sveillancesystms;
           $hmproduct->highspeedinternet = $request->highspeedinternet;
           $hmproduct->gatedentry = $request->gatedentry;

    $hmproduct->SKU = $request->SKU;
    $hmproduct->stock_status = $request->stock_status;
    $hmproduct->featured = $request->featured;
    $hmproduct->quantity = $request->quantity;
    $hmproduct->category_id = $request->category_id;




         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratevlProductThumbnailImage($image,$imageName);
          $hmproduct->image = $imageName;
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
                  $this->GeneratevlProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);

        }
        $hmproduct->images = $gallery_images;
        $hmproduct->save();
         return redirect()->route('admin.vlProduct')->with('status','Villa has been added suuccessfully!');

    }
    public function GeneratevlProductThumbnailImage($image,$imageName)
   {
       $destinationPathThumbnail = public_path('uploads/vlproducts/thumbnails');
       $destinationPath = public_path('uploads/vlproducts');
       $img = Image::read($image->path());

       $img->cover(840,989,"top");
       $img->resize(840,989,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPath."/".$imageName);

       $img->resize(104,104,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPathThumbnail."/".$imageName);

   }


       public function vlproduct_edit($id)
      {
        $vlproduct = vlProduct::find($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
          return view('admin.vlproduct-edit',compact('vlproduct','categories'));

       }

      public function vlproduct_update(Request $request)
      {
           $request->validate([
           'name' => 'required',
           'username' => 'required',
           'mobile' => 'required',
           'availability' => 'required',
           'slug' => 'required|unique:vl_products,slug,'.$request->id,
           'short_description' => 'required',
           'description' => 'required',
           'address' => 'required',
           'squareft'=>'required',
           'sale_price' => 'required',
           'regular_price' => 'required',
           'bedroom'=> '',
           'bathroom'=>'',
           'independentstructure'=> '',
           'spaciouslayout'=>'',
           'highceilings'=>'',
           'modernclscaesthtics'=>'',
           'privategardenlawn'=>'',
           'homeofficestudy'=>'',
           'Swimmingpool'=>'',
           'kitchen'=>'',
           'hvac'=>'',
           'electrical'=>'',
           'patiodeck'=>'',
           'plumbing'=>'',
           'drvwygrgathtics'=>'',
           'smartsystems'=>'',
           'bndrywllsfencing'=>'',
           'sveillancesystms'=>'',
           'highspeedinternet'=>'',
           'gatedentry'=>'',
           'SKU'=> 'required',
           'stock_status' => 'required',
           'featured' => 'required',
           'quantity' => 'required',
           'category_id' => 'required',
           'image' => 'required|mimes:png,jpg,jpeg|max:2048',
           //'images' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);
        $vlproduct = vlProduct::find($request->id);
        $vlproduct->name = $request->name;
        $vlproduct->username = $request->username;
        $vlproduct->mobile = $request->mobile;
        $vlproduct->availability = $request->availability;
        $vlproduct->slug = Str::slug($request->name);
        $vlproduct->address = $request->address;
        $vlproduct->squareft = $request->squareft;
        $vlproduct->short_description = $request->short_description;
        $vlproduct->description = $request->description;
        $vlproduct->sale_price = $request->sale_price;
        $vlproduct->regular_price = $request->regular_price;
        $vlproduct->bedroom = $request->bedroom;
        $vlproduct->bathroom = $request->bathroom;

               $vlproduct->independentstructure = $request->independentstructure;
               $vlproduct->spaciouslayout = $request->spaciouslayout;
               $vlproduct->highceilings = $request->highceilings;
               $vlproduct->modernclscaesthtics = $request->modernclscaesthtics;
               $vlproduct->privategardenlawn = $request->privategardenlawn;

               $vlproduct->homeofficestudy = $request->homeofficestudy;
               $vlproduct->Swimmingpool = $request->Swimmingpool;
               $vlproduct->kitchen = $request->kitchen;
               $vlproduct->hvac = $request->hvac;
               $vlproduct->patiodeck = $request->patiodeck;
               $vlproduct->plumbing = $request->plumbing;
               $vlproduct->drvwygrgathtics = $request->drvwygrgathtics;
               $vlproduct->smartsystems = $request->smartsystems;
               $vlproduct->bndrywllsfencing = $request->bndrywllsfencing;

               $vlproduct->sveillancesystms = $request->sveillancesystms;
               $vlproduct->highspeedinternet = $request->highspeedinternet;
               $vlproduct->gatedentry = $request->gatedentry;

        $vlproduct->SKU = $request->SKU;
        $vlproduct->stock_status = $request->stock_status;
        $vlproduct->featured = $request->featured;
        $vlproduct->quantity = $request->quantity;
        $vlproduct->category_id = $request->category_id;
        $current_timestamp = Carbon::now()->timestamp;

if($request->hasFile('image'))
{
  if(File::exists(public_path('uploads/vlproducts').'/'.$vlproduct->image))
  {

    File::delete(public_path('uploads/vlproducts').'/'.$vlproduct->image);
  }
  if(File::exists(public_path('uploads/vlproducts/thumbnails').'/'.$vlproduct->image))
  {

    File::delete(public_path('uploads/vlproducts/thumbnails').'/'.$vlproduct->image);
  }
  $image = $request->file('image');
  $imageName = $current_timestamp.'.'.$image->extension();
   $this->GeneratevlProductThumbnailImage($image,$imageName);
  $vlproduct->image = $imageName;
}

$gallery_arr = array();
$gallery_images = "";
$counter = 1;

if($request->hasFile('images'))
{

      foreach(explode(',',$vlproduct->images)as $ofile)
      {
        if(File::exists(public_path('uploads/vlproducts').'/'.$ofile))
        {

          File::delete(public_path('uploads/vlproducts').'/'.$ofile);
        }
        if(File::exists(public_path('uploads/vlproducts/thumbnails').'/'.$ofile))
        {

          File::delete(public_path('uploads/vlproducts/thumbnails').'/'.$ofile);
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
          $this->GeneratevlProductThumbnailImage($file,$gfileName);
          array_push($gallery_arr,$gfileName);
          $counter = $counter + 1;
      }
   }
   $gallery_images = implode(',',$gallery_arr);
   $vlproduct->images = $gallery_images;
}
 $vlproduct->save();
 return redirect()->route('admin.vlProduct')->with('status', 'Properties has been updated successfully!');
  }


      public function vlproduct_delete($id)
      {
        $vlproduct = vlProduct::find($id);
        if(File::exists(public_path('uploads/vlproducts').'/'.$vlproduct->image))
        {

          File::delete(public_path('uploads/vlproducts').'/'.$vlproduct->image);
        }
        if(File::exists(public_path('uploads/vlproducts/thumbnails').'/'.$vlproduct->image))
        {

          File::delete(public_path('uploads/vlproducts/thumbnails').'/'.$vlproduct->image);
        }

        foreach(explode(',',$vlproduct->images)as $ofile)
        {
          if(File::exists(public_path('uploads/vlproducts').'/'.$ofile))
          {

            File::delete(public_path('uploads/vlproducts').'/'.$ofile);
          }
          if(File::exists(public_path('uploads/vlproducts/thumbnails').'/'.$ofile))
          {

            File::delete(public_path('uploads/vlproducts/thumbnails').'/'.$ofile);
          }
        }

        $vlproduct->delete();
        return redirect()->route('admin.vlProduct')->with('status','Villa has been deleted successfully');
      }
    //Villa code end up


    //Town House code start up
    public function twnproduct_store(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'slug' => 'required|unique:vl_products,slug',
       'short_description' => 'required',
       'description' => 'required',
       'address' => 'required',
       'squareft'=>'required',
       'sale_price' => 'required',
       'regular_price' => 'required',
       'mltilvllayout'=> '',
       'privateentrance'=>'',
       'garagecarport'=> '',
       'outdoorspace'=>'',
       'livingarea'=>'',
       'bedbathrooms'=>'',
       'kitchen'=>'',
       'restrooms'=>'',
       'laundryarea'=>'',
       'hvac'=>'',
       'storagespace'=>'',
       'hoa'=>'',
       'comnityamenities'=>'',
       'energyefficy'=>'',
       'scrtyftrs'=>'',

       'SKU'=> 'required',
       'stock_status' => 'required',
       'featured' => 'required',
       'quantity' => 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
       'category_id' => 'required',


    ]);
    $hmproduct = new twnProduct();
    $hmproduct->name = $request->name;
    $hmproduct->slug = Str::slug($request->name);
    $hmproduct->address = $request->address;
    $hmproduct->squareft = $request->squareft;
    $hmproduct->short_description = $request->short_description;
    $hmproduct->description = $request->description;
    $hmproduct->sale_price = $request->sale_price;
    $hmproduct->regular_price = $request->regular_price;
    $hmproduct->mltilvllayout = $request->mltilvllayout;
    $hmproduct->privateentrance = $request->privateentrance;

           $hmproduct->garagecarport = $request->garagecarport;
           $hmproduct->outdoorspace = $request->outdoorspace;
           $hmproduct->livingarea = $request->livingarea;
           $hmproduct->bedbathrooms = $request->bedbathrooms;
           $hmproduct->kitchen = $request->kitchen;

           $hmproduct->restrooms = $request->restrooms;
           $hmproduct->laundryarea = $request->laundryarea;
           $hmproduct->hvac = $request->hvac;
           $hmproduct->storagespace = $request->storagespace;
           $hmproduct->hoa = $request->hoa;
           $hmproduct->comnityamenities = $request->comnityamenities;
           $hmproduct->energyefficy = $request->energyefficy;
           $hmproduct->scrtyftrs = $request->scrtyftrs;

           $hmproduct->SKU = $request->SKU;
           $hmproduct->stock_status = $request->stock_status;
           $hmproduct->featured = $request->featured;
           $hmproduct->quantity = $request->quantity;
           $hmproduct->category_id = $request->category_id;




         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratetwnProductThumbnailImage($image,$imageName);
          $hmproduct->image = $imageName;
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
                  $this->GeneratetwnProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);

        }
        $hmproduct->images = $gallery_images;
        $hmproduct->save();
         return redirect()->route('admin.twnProduct')->with('status','Villa has been added suuccessfully!');

    }
    public function GeneratetwnProductThumbnailImage($image,$imageName)
   {
       $destinationPathThumbnail = public_path('uploads/twnproducts/thumbnails');
       $destinationPath = public_path('uploads/twnproducts');
       $img = Image::read($image->path());

       $img->cover(840,989,"top");
       $img->resize(840,989,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPath."/".$imageName);

       $img->resize(104,104,function($constraint){
           $constraint->aspectRatio();
       })->save($destinationPathThumbnail."/".$imageName);

   }

   public function twnproduct_edit($id)
   {
    $twnproduct = twnProduct::find($id);
    $categories = Category::select('id', 'name')->orderBy('name')->get();
      return view('admin.twnproduct-edit',compact('twnproduct','categories'));
    }


    public function twnproduct_update(Request $request)
    {
      $request->validate([
       'name' => 'required',
       'slug' => 'required|unique:vl_products,slug,'.$request->id,
       'short_description' => 'required',
       'description' => 'required',
       'address' => 'required',
       'squareft'=>'required',
       'sale_price' => 'required',
       'regular_price' => 'required',
       'mltilvllayout'=> '',
       'privateentrance'=>'',
       'garagecarport'=> '',
       'outdoorspace'=>'',
       'livingarea'=>'',
       'bedbathrooms'=>'',
       'kitchen'=>'',
       'restrooms'=>'',
       'laundryarea'=>'',
       'hvac'=>'',
       'storagespace'=>'',
       'hoa'=>'',
       'comnityamenities'=>'',
       'energyefficy'=>'',
       'scrtyftrs'=>'',

       'SKU'=> 'required',
       'stock_status' => 'required',
       'featured' => 'required',
       'quantity' => 'required',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
       'category_id' => 'required',


    ]);

    $hmproduct = twnProduct::find($request->id);
    $hmproduct->name = $request->name;
    $hmproduct->slug = Str::slug($request->name);
    $hmproduct->address = $request->address;
    $hmproduct->squareft = $request->squareft;
    $hmproduct->short_description = $request->short_description;
    $hmproduct->description = $request->description;
    $hmproduct->sale_price = $request->sale_price;
    $hmproduct->regular_price = $request->regular_price;
    $hmproduct->mltilvllayout = $request->mltilvllayout;
    $hmproduct->privateentrance = $request->privateentrance;

           $hmproduct->garagecarport = $request->garagecarport;
           $hmproduct->outdoorspace = $request->outdoorspace;
           $hmproduct->livingarea = $request->livingarea;
           $hmproduct->bedbathrooms = $request->bedbathrooms;
           $hmproduct->kitchen = $request->kitchen;

           $hmproduct->restrooms = $request->restrooms;
           $hmproduct->laundryarea = $request->laundryarea;
           $hmproduct->hvac = $request->hvac;
           $hmproduct->storagespace = $request->storagespace;
           $hmproduct->hoa = $request->hoa;
           $hmproduct->comnityamenities = $request->comnityamenities;
           $hmproduct->energyefficy = $request->energyefficy;
           $hmproduct->scrtyftrs = $request->scrtyftrs;

           $hmproduct->SKU = $request->SKU;
           $hmproduct->stock_status = $request->stock_status;
           $hmproduct->featured = $request->featured;
           $hmproduct->quantity = $request->quantity;
           $hmproduct->category_id = $request->category_id;




         $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = $current_timestamp.'.'.$image->extension();
           $this->GeneratetwnProductThumbnailImage($image,$imageName);
          $hmproduct->image = $imageName;
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
                  $this->GeneratetwnProductThumbnailImage($file,$gfileName);
                  array_push($gallery_arr,$gfileName);
                  $counter = $counter + 1;
              }
           }
           $gallery_images = implode(',',$gallery_arr);

        }
        $hmproduct->images = $gallery_images;
        $hmproduct->save();
         return redirect()->route('admin.twnProduct')->with('status','Villa has been added suuccessfully!');

    }


          public function twnproduct_delete($id)
          {
            $twnproduct = twnProduct::find($id);
            if(File::exists(public_path('uploads/twnproducts').'/'.$twnproduct->image))
            {

              File::delete(public_path('uploads/twnproducts').'/'.$twnproduct->image);
            }
            if(File::exists(public_path('uploads/twnproducts/thumbnails').'/'.$twnproduct->image))
            {

              File::delete(public_path('uploads/twnproducts/thumbnails').'/'.$twnproduct->image);
            }

            foreach(explode(',',$twnproduct->images)as $ofile)
            {
              if(File::exists(public_path('uploads/twnproducts').'/'.$ofile))
              {

                File::delete(public_path('uploads/twnproducts').'/'.$ofile);
              }
              if(File::exists(public_path('uploads/twnproducts/thumbnails').'/'.$ofile))
              {

                File::delete(public_path('uploads/twnproducts/thumbnails').'/'.$ofile);
              }
            }

            $twnproduct->delete();
            return redirect()->route('admin.twnProduct')->with('status','Town house has been deleted successfully');
          }
          //Town house code end up


              //Office code start up
              public function offproduct_store(Request $request)
              {
                $request->validate([
                 'name' => 'required',
                 'slug' => 'required|unique:vl_products,slug',
                 'short_description' => 'required',
                 'description' => 'required',
                 'address' => 'required',
                 'squareft'=>'required',
                 'sale_price' => 'required',
                 'regular_price' => 'required',

                 'Mtingrooms'=> '',
                 'restrooms'=>'',
                 'rceptnarea'=> '',
                 'privateoffices'=>'',
                 'brkroomcafeteria'=>'',
                 'strgefilesarea'=>'',
                 'cnfrencerooms'=>'',
                 'opnplanareas'=>'',
                 'intntwkinfrtrture'=>'',
                 'securitysyst'=>'',
                 'hvac'=>'',
                 'Egnmcfniture'=>'',
                 'lighting'=>'',
                 'prntcopy'=>'',

                 'SKU'=> 'required',
                 'stock_status' => 'required',
                 'featured' => 'required',
                 'quantity' => 'required',
                 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                 //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
                 'category_id' => 'required',


              ]);
              $hmproduct = new offProduct();
              $hmproduct->name = $request->name;
              $hmproduct->slug = Str::slug($request->name);
              $hmproduct->address = $request->address;
              $hmproduct->squareft = $request->squareft;
              $hmproduct->short_description = $request->short_description;
              $hmproduct->description = $request->description;
              $hmproduct->sale_price = $request->sale_price;
              $hmproduct->regular_price = $request->regular_price;

              $hmproduct->Mtingrooms = $request->Mtingrooms;
              $hmproduct->restrooms = $request->restrooms;

                     $hmproduct->rceptnarea = $request->rceptnarea;
                     $hmproduct->privateoffices = $request->privateoffices;
                     $hmproduct->brkroomcafeteria = $request->brkroomcafeteria;
                     $hmproduct->strgefilesarea = $request->strgefilesarea;
                     $hmproduct->cnfrencerooms = $request->cnfrencerooms;

                     $hmproduct->opnplanareas = $request->opnplanareas;
                     $hmproduct->intntwkinfrtrture = $request->intntwkinfrtrture;
                     $hmproduct->securitysyst = $request->securitysyst;
                     $hmproduct->hvac = $request->hvac;
                     $hmproduct->Egnmcfniture = $request->Egnmcfniture;
                     $hmproduct->lighting = $request->lighting;
                     $hmproduct->prntcopy = $request->prntcopy;

                     $hmproduct->SKU = $request->SKU;
                     $hmproduct->stock_status = $request->stock_status;
                     $hmproduct->featured = $request->featured;
                     $hmproduct->quantity = $request->quantity;
                     $hmproduct->category_id = $request->category_id;

                   $current_timestamp = Carbon::now()->timestamp;

                  if($request->hasFile('image'))
                  {
                    $image = $request->file('image');
                    $imageName = $current_timestamp.'.'.$image->extension();
                     $this->GenerateoffProductThumbnailImage($image,$imageName);
                    $hmproduct->image = $imageName;
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
                            $this->GenerateoffProductThumbnailImage($file,$gfileName);
                            array_push($gallery_arr,$gfileName);
                            $counter = $counter + 1;
                        }
                     }
                     $gallery_images = implode(',',$gallery_arr);

                  }
                  $hmproduct->images = $gallery_images;
                  $hmproduct->save();
                   return redirect()->route('admin.offProduct')->with('status','An office has been added suuccessfully!');

              }
              public function GenerateoffProductThumbnailImage($image,$imageName)
             {
                 $destinationPathThumbnail = public_path('uploads/offproducts/thumbnails');
                 $destinationPath = public_path('uploads/offproducts');
                 $img = Image::read($image->path());

                 $img->cover(840,989,"top");
                 $img->resize(840,989,function($constraint){
                     $constraint->aspectRatio();
                 })->save($destinationPath."/".$imageName);

                 $img->resize(104,104,function($constraint){
                     $constraint->aspectRatio();
                 })->save($destinationPathThumbnail."/".$imageName);

             }

             public function offproduct_edit($id)
             {
              $offproduct = offProduct::find($id);
              $categories = Category::select('id', 'name')->orderBy('name')->get();
                return view('admin.offproduct-edit',compact('offproduct','categories'));
              }


             public function offproduct_update(Request $request)
             {
               $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:vl_products,slug,'.$request->id,
                'short_description' => 'required',
                'description' => 'required',
                'address' => 'required',
                'squareft'=>'required',
                'sale_price' => 'required',
                'regular_price' => 'required',

                'Mtingrooms'=> '',
                'restrooms'=>'',
                'rceptnarea'=> '',
                'privateoffices'=>'',
                'brkroomcafeteria'=>'',
                'strgefilesarea'=>'',
                'cnfrencerooms'=>'',
                'opnplanareas'=>'',
                'intntwkinfrtrture'=>'',
                'securitysyst'=>'',
                'hvac'=>'',
                'Egnmcfniture'=>'',
                'lighting'=>'',
                'prntcopy'=>'',

                'SKU'=> 'required',
                'stock_status' => 'required',
                'featured' => 'required',
                'quantity' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
                'category_id' => 'required',


             ]);
             $hmproduct = offProduct::find($request->id);
             $hmproduct->name = $request->name;
             $hmproduct->slug = Str::slug($request->name);
             $hmproduct->address = $request->address;
             $hmproduct->squareft = $request->squareft;
             $hmproduct->short_description = $request->short_description;
             $hmproduct->description = $request->description;
             $hmproduct->sale_price = $request->sale_price;
             $hmproduct->regular_price = $request->regular_price;

             $hmproduct->Mtingrooms = $request->Mtingrooms;
             $hmproduct->restrooms = $request->restrooms;

                    $hmproduct->rceptnarea = $request->rceptnarea;
                    $hmproduct->privateoffices = $request->privateoffices;
                    $hmproduct->brkroomcafeteria = $request->brkroomcafeteria;
                    $hmproduct->strgefilesarea = $request->strgefilesarea;
                    $hmproduct->cnfrencerooms = $request->cnfrencerooms;

                    $hmproduct->opnplanareas = $request->opnplanareas;
                    $hmproduct->intntwkinfrtrture = $request->intntwkinfrtrture;
                    $hmproduct->securitysyst = $request->securitysyst;
                    $hmproduct->hvac = $request->hvac;
                    $hmproduct->Egnmcfniture = $request->Egnmcfniture;
                    $hmproduct->lighting = $request->lighting;
                    $hmproduct->prntcopy = $request->prntcopy;

                    $hmproduct->SKU = $request->SKU;
                    $hmproduct->stock_status = $request->stock_status;
                    $hmproduct->featured = $request->featured;
                    $hmproduct->quantity = $request->quantity;
                    $hmproduct->category_id = $request->category_id;

                  $current_timestamp = Carbon::now()->timestamp;

                 if($request->hasFile('image'))
                 {
                   $image = $request->file('image');
                   $imageName = $current_timestamp.'.'.$image->extension();
                    $this->GenerateoffProductThumbnailImage($image,$imageName);
                   $hmproduct->image = $imageName;
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
                           $this->GenerateoffProductThumbnailImage($file,$gfileName);
                           array_push($gallery_arr,$gfileName);
                           $counter = $counter + 1;
                       }
                    }
                    $gallery_images = implode(',',$gallery_arr);

                 }
                 $hmproduct->images = $gallery_images;
                 $hmproduct->save();
                  return redirect()->route('admin.offProduct')->with('status','An office has been updated suuccessfully!');

             }


             public function offproduct_delete($id)
             {
               $offproduct = offProduct::find($id);
               if(File::exists(public_path('uploads/offproducts').'/'.$offproduct->image))
               {

                 File::delete(public_path('uploads/offproducts').'/'.$offproduct->image);
               }
               if(File::exists(public_path('uploads/offproducts/thumbnails').'/'.$offproduct->image))
               {

                 File::delete(public_path('uploads/offproducts/thumbnails').'/'.$offproduct->image);
               }

               foreach(explode(',',$offproduct->images)as $ofile)
               {
                 if(File::exists(public_path('uploads/offproducts').'/'.$ofile))
                 {

                   File::delete(public_path('uploads/offproducts').'/'.$ofile);
                 }
                 if(File::exists(public_path('uploads/offproducts/thumbnails').'/'.$ofile))
                 {

                   File::delete(public_path('uploads/offproducts/thumbnails').'/'.$ofile);
                 }
               }

               $offproduct->delete();
               return redirect()->route('admin.offProduct')->with('status','Office has been deleted successfully');
             }
             //Office code end up

             //Shop code start up
             public function shproduct_store(Request $request)
             {
               $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:sh_products,slug',
                'short_description' => 'required',
                'description' => 'required',
                'address' => 'required',
                'squareft'=>'required',
                'sale_price' => 'required',
                'regular_price' => 'required',

                'displayarea'=> '',
                'strgestckroom'=>'',
                'etrncestorefront'=> '',
                'signage'=>'',
                'lighting'=>'',
                'securitysys'=>'',
                'changingrooms'=>'',
                'restroomfclits'=>'',
                'staffarea'=>'',
                'hvac'=>'',
                'accbilityftrs'=>'',
                'cstmersvicedesk'=>'',
                'mchadisingfxtrs'=>'',
                'musicpasystem'=>'',

                'SKU'=> 'required',
                'stock_status' => 'required',
                'featured' => 'required',
                'quantity' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
                'category_id' => 'required',


             ]);
             $shproduct = new shProduct();
             $shproduct->name = $request->name;
             $shproduct->slug = Str::slug($request->name);
             $shproduct->address = $request->address;
             $shproduct->squareft = $request->squareft;
             $shproduct->short_description = $request->short_description;
             $shproduct->description = $request->description;
             $shproduct->sale_price = $request->sale_price;
             $shproduct->regular_price = $request->regular_price;

             $shproduct->displayarea = $request->displayarea;
             $shproduct->strgestckroom = $request->strgestckroom;

                    $shproduct->etrncestorefront = $request->etrncestorefront;
                    $shproduct->signage = $request->signage;
                    $shproduct->lighting = $request->lighting;
                    $shproduct->securitysys = $request->securitysys;
                    $shproduct->changingrooms = $request->changingrooms;

                    $shproduct->restroomfclits = $request->restroomfclits;
                    $shproduct->staffarea = $request->staffarea;
                    $shproduct->hvac = $request->hvac;
                    $shproduct->accbilityftrs = $request->accbilityftrs;
                    $shproduct->cstmersvicedesk = $request->cstmersvicedesk;
                    $shproduct->mchadisingfxtrs = $request->mchadisingfxtrs;
                    $shproduct->musicpasystem = $request->musicpasystem;

                    $shproduct->SKU = $request->SKU;
                    $shproduct->stock_status = $request->stock_status;
                    $shproduct->featured = $request->featured;
                    $shproduct->quantity = $request->quantity;
                    $shproduct->category_id = $request->category_id;

                  $current_timestamp = Carbon::now()->timestamp;

                 if($request->hasFile('image'))
                 {
                   $image = $request->file('image');
                   $imageName = $current_timestamp.'.'.$image->extension();
                    $this->GenerateshProductThumbnailImage($image,$imageName);
                   $shproduct->image = $imageName;
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
                           $this->GenerateshProductThumbnailImage($file,$gfileName);
                           array_push($gallery_arr,$gfileName);
                           $counter = $counter + 1;
                       }
                    }
                    $gallery_images = implode(',',$gallery_arr);

                 }
                 $shproduct->images = $gallery_images;
                 $shproduct->save();
                  return redirect()->route('admin.shProduct')->with('status','Shop has been added suuccessfully!');

             }
             public function GenerateshProductThumbnailImage($image,$imageName)
              {
                $destinationPathThumbnail = public_path('uploads/shproducts/thumbnails');
                $destinationPath = public_path('uploads/shproducts');
                $img = Image::read($image->path());

                $img->cover(840,989,"top");
                $img->resize(840,989,function($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath."/".$imageName);

                $img->resize(104,104,function($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail."/".$imageName);

            }

            public function shproduct_edit($id)
            {
             $shproduct = shProduct::find($id);
             $categories = Category::select('id', 'name')->orderBy('name')->get();
               return view('admin.shproduct-edit',compact('shproduct','categories'));
             }


            public function shproduct_update(Request $request)
            {
              $request->validate([
               'name' => 'required',
               'slug' => 'required|unique:sh_products,slug,'.$request->id,
               'short_description' => 'required',
               'description' => 'required',
               'address' => 'required',
               'squareft'=>'required',
               'sale_price' => 'required',
               'regular_price' => 'required',

               'displayarea'=> '',
               'strgestckroom'=>'',
               'etrncestorefront'=> '',
               'signage'=>'',
               'lighting'=>'',
               'securitysys'=>'',
               'changingrooms'=>'',
               'restroomfclits'=>'',
               'staffarea'=>'',
               'hvac'=>'',
               'accbilityftrs'=>'',
               'cstmersvicedesk'=>'',
               'mchadisingfxtrs'=>'',
               'musicpasystem'=>'',

               'SKU'=> 'required',
               'stock_status' => 'required',
               'featured' => 'required',
               'quantity' => 'required',
               'image' => 'required|mimes:png,jpg,jpeg|max:2048',
               //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
               'category_id' => 'required',


            ]);
            $shproduct = shProduct::find($request->id);
            $shproduct->name = $request->name;
            $shproduct->slug = Str::slug($request->name);
            $shproduct->address = $request->address;
            $shproduct->squareft = $request->squareft;
            $shproduct->short_description = $request->short_description;
            $shproduct->description = $request->description;
            $shproduct->sale_price = $request->sale_price;
            $shproduct->regular_price = $request->regular_price;

            $shproduct->displayarea = $request->displayarea;
            $shproduct->strgestckroom = $request->strgestckroom;

                   $shproduct->etrncestorefront = $request->etrncestorefront;
                   $shproduct->signage = $request->signage;
                   $shproduct->lighting = $request->lighting;
                   $shproduct->securitysys = $request->securitysys;
                   $shproduct->changingrooms = $request->changingrooms;

                   $shproduct->restroomfclits = $request->restroomfclits;
                   $shproduct->staffarea = $request->staffarea;
                   $shproduct->hvac = $request->hvac;
                   $shproduct->accbilityftrs = $request->accbilityftrs;
                   $shproduct->cstmersvicedesk = $request->cstmersvicedesk;
                   $shproduct->mchadisingfxtrs = $request->mchadisingfxtrs;
                   $shproduct->musicpasystem = $request->musicpasystem;

                   $shproduct->SKU = $request->SKU;
                   $shproduct->stock_status = $request->stock_status;
                   $shproduct->featured = $request->featured;
                   $shproduct->quantity = $request->quantity;
                   $shproduct->category_id = $request->category_id;

                 $current_timestamp = Carbon::now()->timestamp;

                if($request->hasFile('image'))
                {
                  $image = $request->file('image');
                  $imageName = $current_timestamp.'.'.$image->extension();
                   $this->GenerateshProductThumbnailImage($image,$imageName);
                  $shproduct->image = $imageName;
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
                          $this->GenerateshProductThumbnailImage($file,$gfileName);
                          array_push($gallery_arr,$gfileName);
                          $counter = $counter + 1;
                      }
                   }
                   $gallery_images = implode(',',$gallery_arr);

                }
                $shproduct->images = $gallery_images;
                $shproduct->save();
                 return redirect()->route('admin.shProduct')->with('status',' Shop has been updated suuccessfully!');

            }



                         public function shproduct_delete($id)
                         {
                           $shproduct = shProduct::find($id);
                           if(File::exists(public_path('uploads/shproducts').'/'.$shproduct->image))
                           {

                             File::delete(public_path('uploads/shproducts').'/'.$shproduct->image);
                           }
                           if(File::exists(public_path('uploads/shproducts/thumbnails').'/'.$shproduct->image))
                           {

                             File::delete(public_path('uploads/shproducts/thumbnails').'/'.$shproduct->image);
                           }

                           foreach(explode(',',$shproduct->images)as $ofile)
                           {
                             if(File::exists(public_path('uploads/shproducts').'/'.$ofile))
                             {

                               File::delete(public_path('uploads/shproducts').'/'.$ofile);
                             }
                             if(File::exists(public_path('uploads/shproducts/thumbnails').'/'.$ofile))
                             {

                               File::delete(public_path('uploads/shproducts/thumbnails').'/'.$ofile);
                             }
                           }

                           $shproduct->delete();
                           return redirect()->route('admin.shProduct')->with('status','Shop has been deleted successfully');
                         }
                         //Shop code end up

                         //Garage code start up
                         public function grproduct_store(Request $request)
                         {
                           $request->validate([
                            'name' => 'required',
                            'slug' => 'required|unique:gr_products,slug',
                            'short_description' => 'required',
                            'description' => 'required',
                            'address' => 'required',
                            'squareft'=>'required',
                            'sale_price' => 'required',
                            'regular_price' => 'required',

                            'vehiclestoragespace'=> '',
                            'garagedoor'=>'',
                            'drivewayaccess'=> '',
                            'Wkbenchtool'=>'',
                            'shelvingcabinets'=>'',
                            'lghtngelctrcloutlets'=>'',
                            'concreteflooring'=>'',
                            'securityfeatures'=>'',
                            'insulation'=>'',
                            'pedestriandoor'=>'',
                            'waterdrainage'=>'',
                            'overheadstorage'=>'',
                            'automateddoor'=>'',
                            'firesafety'=>'',

                            'SKU'=> 'required',
                            'stock_status' => 'required',
                            'featured' => 'required',
                            'quantity' => 'required',
                            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                            //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
                            'category_id' => 'required',


                         ]);
                         $grgproduct = new grProduct();
                         $grgproduct->name = $request->name;
                         $grgproduct->slug = Str::slug($request->name);
                         $grgproduct->address = $request->address;
                         $grgproduct->squareft = $request->squareft;
                         $grgproduct->short_description = $request->short_description;
                         $grgproduct->description = $request->description;
                         $grgproduct->sale_price = $request->sale_price;
                         $grgproduct->regular_price = $request->regular_price;

                         $grgproduct->vehiclestoragespace = $request->vehiclestoragespace;
                         $grgproduct->garagedoor = $request->garagedoor;

                                $grgproduct->drivewayaccess = $request->drivewayaccess;
                                $grgproduct->Wkbenchtool = $request->Wkbenchtool;
                                $grgproduct->shelvingcabinets = $request->shelvingcabinets;
                                $grgproduct->lghtngelctrcloutlets = $request->lghtngelctrcloutlets;
                                $grgproduct->concreteflooring = $request->concreteflooring;

                                $grgproduct->securityfeatures = $request->securityfeatures;
                                $grgproduct->insulation = $request->insulation;
                                $grgproduct->pedestriandoor = $request->pedestriandoor;
                                $grgproduct->waterdrainage = $request->waterdrainage;
                                $grgproduct->overheadstorage = $request->overheadstorage;
                                $grgproduct->automateddoor = $request->automateddoor;
                                $grgproduct->firesafety = $request->firesafety;

                                $grgproduct->SKU = $request->SKU;
                                $grgproduct->stock_status = $request->stock_status;
                                $grgproduct->featured = $request->featured;
                                $grgproduct->quantity = $request->quantity;
                                $grgproduct->category_id = $request->category_id;

                              $current_timestamp = Carbon::now()->timestamp;

                             if($request->hasFile('image'))
                             {
                               $image = $request->file('image');
                               $imageName = $current_timestamp.'.'.$image->extension();
                                $this->GenerategrProductThumbnailImage($image,$imageName);
                               $grgproduct->image = $imageName;
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
                                       $this->GenerategrProductThumbnailImage($file,$gfileName);
                                       array_push($gallery_arr,$gfileName);
                                       $counter = $counter + 1;
                                   }
                                }
                                $gallery_images = implode(',',$gallery_arr);

                             }
                             $grgproduct->images = $gallery_images;
                             $grgproduct->save();
                              return redirect()->route('admin.grProduct')->with('status','A Garage has been added suuccessfully!');

                         }
                         public function GenerategrProductThumbnailImage($image,$imageName)
                          {
                            $destinationPathThumbnail = public_path('uploads/grproducts/thumbnails');
                            $destinationPath = public_path('uploads/grproducts');
                            $img = Image::read($image->path());

                            $img->cover(840,989,"top");
                            $img->resize(840,989,function($constraint){
                                $constraint->aspectRatio();
                            })->save($destinationPath."/".$imageName);

                            $img->resize(104,104,function($constraint){
                                $constraint->aspectRatio();
                            })->save($destinationPathThumbnail."/".$imageName);

                        }

                        public function grproduct_edit($id)
                        {
                         $grgproduct = grProduct::find($id);
                         $categories = Category::select('id', 'name')->orderBy('name')->get();
                           return view('admin.grgproduct-edit',compact('grgproduct','categories'));
                         }

                        public function grproduct_update(Request $request)
                        {
                          $request->validate([
                           'name' => 'required',
                           'slug' => 'required|unique:gr_products,slug,'.$request->id,
                           'short_description' => 'required',
                           'description' => 'required',
                           'address' => 'required',
                           'squareft'=>'required',
                           'sale_price' => 'required',
                           'regular_price' => 'required',

                           'vehiclestoragespace'=> '',
                           'garagedoor'=>'',
                           'drivewayaccess'=> '',
                           'Wkbenchtool'=>'',
                           'shelvingcabinets'=>'',
                           'lghtngelctrcloutlets'=>'',
                           'concreteflooring'=>'',
                           'securityfeatures'=>'',
                           'insulation'=>'',
                           'pedestriandoor'=>'',
                           'waterdrainage'=>'',
                           'overheadstorage'=>'',
                           'automateddoor'=>'',
                           'firesafety'=>'',

                           'SKU'=> 'required',
                           'stock_status' => 'required',
                           'featured' => 'required',
                           'quantity' => 'required',
                           'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                           //'images' => 'required|mimes:png,jpg,jpeg|max:2048',
                           'category_id' => 'required',


                        ]);
                        $grgproduct = grProduct::find($request->id);
                        $grgproduct->name = $request->name;
                        $grgproduct->slug = Str::slug($request->name);
                        $grgproduct->address = $request->address;
                        $grgproduct->squareft = $request->squareft;
                        $grgproduct->short_description = $request->short_description;
                        $grgproduct->description = $request->description;
                        $grgproduct->sale_price = $request->sale_price;
                        $grgproduct->regular_price = $request->regular_price;

                        $grgproduct->vehiclestoragespace = $request->vehiclestoragespace;
                        $grgproduct->garagedoor = $request->garagedoor;

                               $grgproduct->drivewayaccess = $request->drivewayaccess;
                               $grgproduct->Wkbenchtool = $request->Wkbenchtool;
                               $grgproduct->shelvingcabinets = $request->shelvingcabinets;
                               $grgproduct->lghtngelctrcloutlets = $request->lghtngelctrcloutlets;
                               $grgproduct->concreteflooring = $request->concreteflooring;

                               $grgproduct->securityfeatures = $request->securityfeatures;
                               $grgproduct->insulation = $request->insulation;
                               $grgproduct->pedestriandoor = $request->pedestriandoor;
                               $grgproduct->waterdrainage = $request->waterdrainage;
                               $grgproduct->overheadstorage = $request->overheadstorage;
                               $grgproduct->automateddoor = $request->automateddoor;
                               $grgproduct->firesafety = $request->firesafety;

                               $grgproduct->SKU = $request->SKU;
                               $grgproduct->stock_status = $request->stock_status;
                               $grgproduct->featured = $request->featured;
                               $grgproduct->quantity = $request->quantity;
                               $grgproduct->category_id = $request->category_id;

                             $current_timestamp = Carbon::now()->timestamp;

                            if($request->hasFile('image'))
                            {
                              $image = $request->file('image');
                              $imageName = $current_timestamp.'.'.$image->extension();
                               $this->GenerategrProductThumbnailImage($image,$imageName);
                              $grgproduct->image = $imageName;
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
                                      $this->GenerategrProductThumbnailImage($file,$gfileName);
                                      array_push($gallery_arr,$gfileName);
                                      $counter = $counter + 1;
                                  }
                               }
                               $gallery_images = implode(',',$gallery_arr);

                            }
                            $grgproduct->images = $gallery_images;
                            $grgproduct->save();
                             return redirect()->route('admin.grProduct')->with('status','A Garage has been added suuccessfully!');

                        }


                  public function grproduct_delete($id)
                  {
                    $grgproduct = grProduct::find($id);
                    if(File::exists(public_path('uploads/grproducts').'/'.$grgproduct->image))
                    {

                      File::delete(public_path('uploads/grproducts').'/'.$grgproduct->image);
                    }
                    if(File::exists(public_path('uploads/grproducts/thumbnails').'/'.$grgproduct->image))
                    {

                      File::delete(public_path('uploads/grproducts/thumbnails').'/'.$grgproduct->image);
                    }

                    foreach(explode(',',$grgproduct->images)as $ofile)
                    {
                      if(File::exists(public_path('uploads/grproducts').'/'.$ofile))
                      {

                        File::delete(public_path('uploads/grproducts').'/'.$ofile);
                      }
                      if(File::exists(public_path('uploads/grproducts/thumbnails').'/'.$ofile))
                      {

                        File::delete(public_path('uploads/grproducts/thumbnails').'/'.$ofile);
                      }
                    }

                    $grgproduct->delete();
                    return redirect()->route('admin.grProduct')->with('status','Garage has been deleted successfully');
                  }



                  public function agentform()
                  {

                     $agentlists=contactDetails::orderBy('created_at','DESC')->paginate(10);
                     return view('admin.agentform',compact('agentlists'));
                  }
                  //Apartment code startup
                   public function agentform_add(Request $request)
                   {
                     $request->validate([
                      'name' => 'required',
                      'mobile'=>'required',
                      'designation' => 'required',
                      'twitt' => '',
                      'fcbk' => '',
                      'instgrm' => '',

                          ]);

                      $agmform = new contactDetails();
                      $agmform->name = $request->name;
                      $agmform->mobile = $request->mobile;
                      $agmform->designation = $request->designation;
                      $agmform->twitt = $request->twitt;
                      $agmform->fcbk = $request->fcbk;
                      $agmform->instgrm = $request->instgrm;
                      $current_timestamp = Carbon::now()->timestamp;

                       if($request->hasFile('image'))
                       {
                         $image = $request->file('image');
                         $imageName = $current_timestamp.'.'.$image->extension();
                          $this->GenerateagnProductThumbnailImage($image,$imageName);
                         $agmform->image = $imageName;
                       }
                       $agmform->save();
                        return redirect()->route('home.index')->with('status','Suuccessfully added! For proper check up your add will be posted with 24hours');

                   }
                   public function GenerateagnProductThumbnailImage($image,$imageName)
                   {
                     // $destinationPathThumbnail = public_path('uploads/agentimage/thumbnails');
                      $destinationPath = public_path('uploads/agentimage');
                      $img = Image::read($image->path());

                      $img->cover(840,989,"top");
                      $img->resize(840,989,function($constraint){
                          $constraint->aspectRatio();
                      })->save($destinationPath."/".$imageName);

                     /* $img->resize(104,104,function($constraint){
                          $constraint->aspectRatio();
                      })->save($destinationPathThumbnail."/".$imageName);*/

                   }


                   public function agentform_edit($id)
                   {
                     $agentform = contactDetails::find($id);
                     //$categories = Category::select('id', 'name')->orderBy('name')->get();
                       return view('admin.agentform-edit',compact('agentform'));

                   }

                    public function agentform_update(Request $request)
                    {
                      $request->validate([
                       'name' => 'required',
                       'designation' => 'required',
                       'mobile'=>'required',
                       'twitt' => '',
                       'fcbk' => '',
                       'instgrm' => '',

                           ]);

                       $agmform = contactDetails::find($request->id);
                       $agmform->name = $request->name;
                       $agmform->mobile = $request->mobile;
                       $agmform->designation = $request->designation;
                       $agmform->twitt = $request->twitt;
                       $agmform->fcbk = $request->fcbk;
                       $agmform->instgrm = $request->instgrm;
                       $current_timestamp = Carbon::now()->timestamp;

                        if($request->hasFile('image'))
                        {
                          $image = $request->file('image');
                          $imageName = $current_timestamp.'.'.$image->extension();
                           $this->GenerateagnProductThumbnailImage($image,$imageName);
                          $agmform->image = $imageName;
                        }
                        $agmform->save();
                         return redirect()->route('admin.agentform')->with('status','Suuccessfully added! For proper check up your add will be posted with 24hours');

                    }

                    public function agentform_delete($id)
                    {
                      $agentimage = contactDetails::find($id);
                      if(File::exists(public_path('uploads/agentimage').'/'.$agentimage->image))
                      {

                        File::delete(public_path('uploads/agentimage').'/'.$agentimage->image);
                      }

                      foreach(explode(',',$agentimage->images)as $ofile)
                      {
                        if(File::exists(public_path('uploads/agentimage').'/'.$ofile))
                        {

                          File::delete(public_path('uploads/agentimage').'/'.$ofile);
                        }

                      }

                      $agentimage->delete();
                      return redirect()->route('admin.agentform')->with('status','your profile has been deleted successfully');
                    }



}
