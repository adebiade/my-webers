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
                         <a href="{{route('admin.shproduct.add')}}">
                             <div class="text-tiny ">Shop</div>
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
           <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.shproduct.update')}}">
             @csrf
             @method('PUT')
             <input type="hidden" name="id" value="{{$shproduct->id}}" />

        <div class="wg-box">
             <fieldset class="name">
                 <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                 </div>
                 <input class="mb-10" type="text" placeholder="Enter product name"
                     name="name" tabindex="0" value="{{$shproduct->name}}" aria-required="true" required="">
                 <div class="text-tiny">Do not exceed 100 characters when entering the
                     product name.</div>
             </fieldset>
             <fieldset class="name">
                 <div class="body-title mb-10">username <span class="tf-color-1">*</span>
                 </div>
                 <input class="mb-10" type="text" placeholder="Enter username"
                     name="username" tabindex="0" value="{{$shproduct->username}}" aria-required="true" required="">
                 <div class="text-tiny">The same username as your account username.</div>
             </fieldset>

            <fieldset class="name">
               <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
               <input class="mb-10" type="text" placeholder="Enter product slug"
                   name="slug" tabindex="0" value="{{$shproduct->slug}}" aria-required="true" required="">
               <div class="text-tiny">Do not exceed 100 characters when entering the
                   product name.</div>
            </fieldset>


            <fieldset class="name">
            <div class="body-title mb-10">Address <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter product name"name="address" tabindex="0" value="{{$shproduct->address}}" aria-required="true" required="">
            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                 @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                  </fieldset>
                  <fieldset class="name">
                      <div class="body-title mb-10">Square feet<span class="tf-color-1">*</span>
                      </div>
                      <input class="mb-10" type="text" placeholder="Enter product name"
                          name="squareft" tabindex="0" value="{{$shproduct->squareft}}" aria-required="true" required="">
                      <div class="text-tiny">Do not exceed 100 characters when entering the
                          product name.</div>
                          @error('squareft') <span class="alert alert-danger text-center">{{$message}} @enderror
                  </fieldset>
                  <div class="gap22 cols">
       <fieldset class="category">
       <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
        </div>
        <div class="select">
        <select class="" name="category_id">
               <option>Choose category</option>
               @foreach($categories as $category)
               <option value="{{$category->id}}"{{$shproduct->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
               @endforeach

            </select>
            </div>
            </fieldset>

            </div>

        <fieldset class="shortdescription">
            <div class="body-title mb-10">Short Description <span
                    class="tf-color-1">*</span></div>
            <textarea class="mb-10 ht-150" name="short_description"
                placeholder="Short Description" tabindex="0" aria-required="true"
                required="">{{$shproduct->short_description}}</textarea>
            <div class="text-tiny">Do not exceed 100 characters when entering the
                product name.</div>
        </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description" placeholder="Description"
                        tabindex="0" aria-required="true" required="">{{$shproduct->description}}</textarea>
                    <div class="text-tiny">Do not exceed 100 characters when entering the
                        product name.</div>
                </fieldset>
            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                      @if($shproduct->image)
                        <div class="item" id="imgpreview">
                            <img src="{{asset('uploads/shproducts')}}/{{$shproduct->image}}"
                 class="effect8" alt="{{$shproduct->name}}">
                        </div>
                        @endif
                  <div id="upload-file" class="item up-load">
                  <label class="uploadfile" for="myFile">
                 <span class="icon">
                  <i class="icon-upload-cloud"></i>
                 </span>
                 <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                 <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                      <div class="body-title mb-10">Upload Gallery Images</div>
                      <div class="upload-image mb-16">
                        @if($shproduct->images)
                        @foreach(explode(',',$shproduct->images) as $img)
                           <div class="item gitems">
                           <img src="{{asset('uploads/shproducts')}}/{{trim($img)}}" alt="">
                           </div>
                           @endforeach
                         @endif
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
                  </fieldset>

                   <div class="cols gap22">
                       <fieldset class="name">
                           <div class="body-title mb-10">Regular Price <span
                                   class="tf-color-1">*</span></div>
                           <input class="mb-10" type="text" placeholder="Enter regular price"
                               name="regular_price" tabindex="0" value="{{$shproduct->regular_price}}" aria-required="true"
                               required="">
                       </fieldset>
                       <fieldset class="name">
                           <div class="body-title mb-10">Sale Price <span
                                   class="tf-color-1">*</span></div>
                           <input class="mb-10" type="text" placeholder="Enter sale price"
                               name="sale_price" tabindex="0" value="{{$shproduct->sale_price}}" aria-required="true"
                               required="">
                       </fieldset>
                   </div>
                   <fieldset class="name">
                       <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                       </div>
                       <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{$shproduct->mobile}}" aria-required="true" required="">
                           @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                   </fieldset>

                   <div class="cols gap22">
                       <fieldset class="name">
                           <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                           </div>
                           <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                               tabindex="0" value="{{$shproduct->SKU}}" aria-required="true" required="">
                       </fieldset>
                       <fieldset class="name">
                           <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                           </div>
                           <input class="mb-10" type="text" placeholder="Enter quantity"
                               name="quantity" tabindex="0" value="{{$shproduct->quantity}}" aria-required="true"
                               required="">
                       </fieldset>
                   </div>

                   <div class="cols gap22">
                       <fieldset class="name">
                           <div class="body-title mb-10">Stock</div>
                           <div class="select mb-10">
                               <select class="" name="stock_status">
                                 <option value="Available"{{$shproduct->stock_status == "Available" ? "selected":""}}>Available</option>
                                 <option value="Sold"{{$shproduct->stock_status == "Sold" ? "selected":""}}>Sold</option>
                               </select>
                           </div>
                       </fieldset>
                       <fieldset class="name">
                           <div class="body-title mb-10">Availability</div>
                           <div class="select mb-10">
                               <select class="" name="availability">
                                   <option value="For Sell"{{$shproduct->availability == "For Sell" ? "selected":""}}>For Sell</option>
                                   <option value="For Rent"{{$shproduct->availability == "For Rent" ? "selected":""}}>For Rent</option>
                                   <option value="For Lease"{{$shproduct->availability == "For Lease" ? "selected":""}}>For Lease</option>

                               </select>
                           </div>
                           @error('availability')<span class="alert alert-danger text-center">{{$message}} @enderror

                       </fieldset>

                       <fieldset class="name">
                           <div class="body-title mb-10">Featured</div>
                           <div class="select mb-10">
                               <select class="" name="featured">
                                 <option value="0"{{$shproduct->featured == "0" ? "selected":""}}>No</option>
                                 <option value="1"{{$shproduct->featured == "1" ? "selected":""}}>Yes</option>
                               </select>
                           </div>
                       </fieldset>
                   </div>



                   <div class="wg-box">
                     <fieldset class="description">
                     <div class="body-title mb-10">Features</div><br/>
                     <label for="html"><b class="body-title mb-10">Features of a shop</b></label><br/>
                     <input type="radio" name="displayarea" value="Display Area"><span class="body-title mb-10">Display Area</span><br/>
                     <input type="radio" name=" strgestckroom" value="Storage/Stock Room"><span class="body-title mb-10">Storage/Stock Room</span><br/>
                     <input type="radio" name="etrncestorefront" value="Entrance and Storefront"><span class="body-title mb-10">Entrance and Storefront<br/>
                     <input type="radio" name="signage" value="Signage"><span class="body-title mb-10">Signage</span><br/>
                     <input type="radio" name="lighting" value="Lighting"><span class="body-title mb-10">Lighting</span><br/>
                     <input type="radio" name="securitysys" value="Security Systems"><span class="body-title mb-10">Security Systems<br/>
                     <input type="radio" name="changingrooms" value="Changing Rooms"><span class="body-title mb-10">Changing Rooms</span><br/>
                     <input type="radio" name="restroomfclits" value="Restroom Facilities"><span class="body-title mb-10">Restroom Facilities</span><br/>
                     <input type="radio" name="staffarea" value="Staff Area"><span class="body-title mb-10">Staff Area</span><br/>
                     <input type="radio" name="hvac" value="HVAC"><span class="body-title mb-10">HVAC</span><br/>
                     <input type="radio" name="accbilityftrs" value="Accessibility Features"><span class="body-title mb-10">Accessibility Features</span><br/>
                     <input type="radio" name="cstmersvicedesk" value="Customer Service Desk"><span class="body-title mb-10">Customer Service Desk</span><br/>
                     <input type="radio" name="mchadisingfxtrs" value="Merchandising Fixtures"><span class="body-title mb-10">Merchandising Fixtures</span><br/>
                     <input type="radio" name="musicpasystem" value="Music/PA System"><span class="body-title mb-10">Music/PA System</span><br/>

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
