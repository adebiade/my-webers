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
                                            <a href="{{route('admin.offproduct.add')}}">
                                                <div class="text-tiny ">Office</div>
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
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.offproduct.store')}}">
                                  @csrf

                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Username <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter Username"
                                                name="username" tabindex="0" value="{{old('username')}}" aria-required="true" required="">
                                            <div class="text-tiny">The same username as your account username</div>
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Address<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="address" tabindex="0" value="{{old('address')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Square feet<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="squareft" tabindex="0" value="{{old('squareft')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                                @error('squareft') <span class="alert alert-danger text-center">{{$message}} @enderror
                                        </fieldset>


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                                name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
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
                                        </fieldset>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true" required="">{{old('description')}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
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
                                        </fieldset>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price"
                                                    name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true"
                                                    required="">
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
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{old('SKU')}}" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="Available">Available</option>
                                                        <option value="Sold">Sold</option>
                                                    </select>
                                                </div>
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

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Design Features</b></label><br/>
                                          <input type="radio" name="Wkstnsdesks" value="Workstations/Desks"><span class="body-title mb-10">Workstations/Desks</span><br/>
                                          <input type="radio" name="Mtingrooms" value="Meeting Rooms"><span class="body-title mb-10">Meeting Rooms</span><br/>
                                          <input type="radio" name="rceptnarea" value="Reception Area"><span class="body-title mb-10">Reception Area<br/>
                                          <input type="radio" name="privateoffices" value="Private Offices"><span class="body-title mb-10">Private Offices</span><br/>
                                          <input type="radio" name="brkroomcafeteria" value="Break Room/Cafeteria"><span class="body-title mb-10">Break Room/Cafeteria</span><br/>
                                          <input type="radio" name="strgefilesarea" value="Storage/Files Area"><span class="body-title mb-10">Storage/Files Area<br/>
                                          <input type="radio" name="opnplanareas" value="Open Plan Areas"><span class="body-title mb-10">Open Plan Areas</span><br/>
                                          <input type="radio" name="restrooms" value="Restrooms"><span class="body-title mb-10">Restrooms</span><br/>
                                          <input type="radio" name="intntwkinfrtrture" value="Internet & Network Infrastructure"><span class="body-title mb-10"> Internet & Network Infrastructure</span><br/>
                                          <input type="radio" name="securitysyst" value="Security Systems"><span class="body-title mb-10">Security Systems</span><br/>
                                          <input type="radio" name="hvac" value="HVAC"><span class="body-title mb-10">HVAC</span><br/>
                                          <input type="radio" name="Egnmcfniture" value="Ergonomic Furniture"><span class="body-title mb-10">Ergonomic Furniture</span><br/>
                                          <input type="radio" name="lighting" value="Lighting"><span class="body-title mb-10">Lighting</span><br/>
                                          <input type="radio" name="prntcopy" value="Printing/Copy Stations"><span class="body-title mb-10">Printing/Copy Stations</span><br/>

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
