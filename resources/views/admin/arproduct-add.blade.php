@extends('layouts.admin')
@section('content')

<div class="main-content-inner">
                            <!-- main-content-wrap -->
              <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Properties</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('admin.index')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.arproduct.add')}}">
                                                <div class="text-tiny ">Apartment</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Add Properties</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- form-add-product -->
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.arproduct.store')}}">
                                  @csrf

                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Aparment name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                            @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Username <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="username" tabindex="0" value="{{old('username')}}" aria-required="true" required="">
                                            <div class="text-tiny">the same username as your account username.</div>
                                            @error('username') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                                name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                                @error('slug') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Address <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="address" tabindex="0" value="{{old('address')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 200 characters when entering the
                                                Address.</div>
                                                @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Square feet <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="squareft" tabindex="0" value="{{old('squareft')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 200 characters when entering the
                                                Address.</div>
                                                @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="category_id">
                                                        <option>Choose category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                @error('category_id') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>

                                              </div>

                                        <fieldset class="shortdescription">
                                            <div class="body-title mb-10">Short Description <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="short_description"
                                                placeholder="Short Description" tabindex="0" aria-required="true"
                                                required="">{{old('short_description')}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                                @error('short_description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true" required="">{{old('description')}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                                @error('description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>
                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                                <div class="item" id="imgpreview" style="display:none">
                                                    <img src="../../../localhost_8000/images/upload/upload-1.png"
                                                        class="effect8" alt="">
                                                </div>
                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Drop your images here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="myFile" name="image" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                            @error('image')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <fieldset>
                                            <div class="body-title mb-10">Upload Gallery Images</div>
                                            <div class="upload-image mb-16">
                                                <!-- <div class="item">
                                <img src="images/upload/upload-1.png" alt="">
                            </div>                                                 -->
                                            <div id="galUpload" class="item up-load">
                                                    <label class="uploadfile" for="gFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="text-tiny">Drop your images here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="gFile" name="images[]" accept="image/*" multiple="">
                                                    </label>
                                                </div>
                                            </div>
                                            @error('images')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price"name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true"required="">
                                                    @error('regular_price')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true"required="">
                                                    @error('sale_price')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                        </div>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{old('mobile')}}" aria-required="true" required="">
                                                @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"tabindex="0" value="{{old('SKU')}}" aria-required="true" required="">
                                                    @error('SKU')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                              <input class="mb-10" type="text" placeholder="Enter quantity"  name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true"  required="">
                                                    @error('quantity')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock<span class="tf-color-1">*</span></div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="Available">Available</option>
                                                        <option value="Rented">Rented</option>
                                                    </select>
                                                </div>
                                                @error('stock_status')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                              <fieldset class="name">
                                                  <div class="body-title mb-10">Availability<span class="tf-color-1">*</span></div>
                                                  <div class="select mb-10">
                                                      <select class="" name="availability">
                                                          <option value="For Sell">For Sell</option>
                                                          <option value="For Rent">For Rent</option>
                                                          <option value="For Lease">For Lease</option>

                                                      </select>
                                                  </div>
                                                  @error('availability')<span class="alert alert-danger text-center">{{$message}} @enderror

                                              </fieldset>
                                            </div>
                                            <div class="cols gap22">

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                                @error('featured')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                        </div>



                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Structural Features</b></label><br/>
                                          <input type="radio" name="individualunit" value="Individual Units"><span class="body-title mb-10">Individual Units</span></span><br/>
                                          <input type="radio" name=" familyunit" value="Family Units"><span class="body-title mb-10">Family Units</span><br/>
                                          <input type="radio" name="sharedwallfloor" value="Shared WallsFloors"><span class="body-title mb-10">Shared WallsFloors<br/>
                                          <input type="radio" name="balconieorterrace" value="Balconies or Terraces"><span class="body-title mb-10">Balconies or Terraces</span><br/>
                                          <input type="radio" name="entrancescorridors" value="Entrances and Corridors"><span class="body-title mb-10">Entrances and Corridors</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Interior Features</b></label><br/>
                                          <input type="radio" name="bedroom" value="Bedroom"><span class="body-title mb-10">Bedroom</span>@error('bedroom')<span class="alert alert-danger text-center">{{$message}} @enderror<br/>
                                          <input type="radio" name="livingroom" value="Living Room"><span class="body-title mb-10">Living Room</span>@error('livingroom')<span class="alert alert-danger text-center">{{$message}} @enderror<br/>
                                          <input type="radio" name="kitchen" value="Kitchen"><span class="body-title mb-10">Kitchen</span>@error('kitchen')<span class="alert alert-danger text-center">{{$message}} @enderror<br/>
                                          <input type="radio" name="bathroom" value="Bathroom"><span class="body-title mb-10">Bathroom</span>@error('bathroom')<span class="alert alert-danger text-center">{{$message}} @enderror<br/>
                                          <input type="radio" name="utilityarea" value="Utility Area"><span class="body-title mb-10">Utility Area</span><br/>
                                          <input type="radio" name="flooringfinish" value="Flooring & Finishes"><span class="body-title mb-10">Flooring & Finishes</span><br/>

                                          <br><br>


                                          <label for="html"><b class="body-title mb-10">Functional Features</b></label><br/>
                                          <input type="radio" name="electricitylighting" value="Electricity Lighting"><span class="body-title mb-10">Electricity & Lighting</span><br/>
                                          <input type="radio" name="plumbing" value="Plumbing">  <span class="body-title mb-10">Plumbing</span><br/>
                                          <input type="radio" name="hvacACUnits" value="HVAC AC Units">  <span class="body-title mb-10">HVAC/AC Units</span><br/>
                                          <input type="radio" name="internetcableready" value="Internet Cable Ready">  <span class="body-title mb-10">Internet/Cable Ready</span><br/>
                                          <input type="radio" name="locksintercom" value="Security Locks Intercom">  <span class="body-title mb-10">Security Locks/Intercom</span><br/>

                                          <br><br>



                                          <label for="html"><b class="body-title mb-10">Building-Wide Features</b></label><br/>
                                          <input type="radio" name="elevatorsstaircases" value="Elevators Staircases">  <span class="body-title mb-10">Elevators & Staircases</span><br/>
                                          <input type="radio" name="parking" value="Parking">  <span class="body-title mb-10">Parking</span><br/>
                                          <input type="radio" name="securitysystem" value="Security System">  <span class="body-title mb-10">Security System</span><br/>
                                          <input type="radio" name="powerbackup" value="Power Backup">  <span class="body-title mb-10">Power Backup</span><br/>
                                          <input type="radio" name="wastedisposalsystem" value="Waste Disposal System">  <span class="body-title mb-10">Waste Disposal System</span><br/>

                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Lifestyle & Luxury Feature</b></label><br/>
                                          <input type="radio" name="gymorfitnesscenter" value="Gym Fitness Center">  <span class="body-title mb-10">Gym or Fitness Center</span><br/>
                                          <input type="radio" name="swimmingpool" value="Swimming Pool">  <span class="body-title mb-10">Swimming Pool<br/>
                                          <input type="radio" name="clubhouseorlounge" value="Clubhouse or Lounge Area">  <span class="body-title mb-10">Clubhouse or Lounge Area</span><br/>
                                          <input type="radio" name="childrenplayarea" value="Childrens Play Area">  <span class="body-title mb-10">Children’s Play Area</span><br/>
                                          <input type="radio" name="rooftopgardenterrace" value="Rooftop Garden or Terrace">  <span class="body-title mb-10">Rooftop Garden or Terrace</span><br/>
                                          <input type="radio" name="petfriendlyspaces" value="Pet-Friendly Spaces">  <span class="body-title mb-10">Pet-Friendly Spaces</span><br/>
                                          <input type="radio" name="Coworkingspaces" value="Co-working Spacess">  <span class="body-title mb-10">Co-working Spaces</span><br/>


                                          <br><br>

                                        </fieldset>
                                        </div>



                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Add properties</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /form-add-product -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>

@endsection


@push('scripts')
      <script>
           $(function(){
            $("#myFile").on("change",function(e){
                const photoInp = $("#myFile");
                const [file] = this.files;
                if(file)
                {
                   $("#imgpreview img").attr('src',URL.createObjectURL(file));
                   $("#imgpreview").show();
                }
            });

            $("#gFile").on("change",function(e){
                const photoInp = $("#gFile");
                const gphotos = this.files;
                $.each(gphotos,function(key,val){
                  $("#galUpload").prepend(`<div class="item gitems"><img src="${URL.createObjectURL(val)}" /></div>`);
                });
            });

            $("input[name='name']").on("change",function(){
                 $("input[name='slug']").val(StringToSlug($(this).val()));
            });
           });

           function StringToSlug(Text)
           {
              return Text.toLowerCase()
              .replace(/[^\w ]+/g,"")
               .replace(/ +/g,"-");

           }

     </script>
@endpush
