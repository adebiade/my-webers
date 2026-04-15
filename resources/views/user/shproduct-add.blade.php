@extends('layouts.app')
@section('content')

<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="stylesheet"  href="{{asset('asmin/css/animate.min.css')}}">
<link rel="stylesheet"  href="{{asset('asmin/css/animation.css')}}">
<link rel="stylesheet"  href="{{asset('asmin/icon/style.css')}}">
<link rel="stylesheet" href="{{asset('asmin/css/sweetalert.min.css')}}">
<link rel="stylesheet"  href="{{asset('asmin/css/custom.css')}}">



<link rel="stylesheet"  href="{{asset('asmin/css/bootstrap-select.min.css')}}">
<link rel="stylesheet"  href="{{asset('asmin/css/style.css')}}">
<!--<link rel="stylesheet"  href="{{asset('asmin/font/fonts.css')}}">-->

@stack('styles')


<div class="main-content-inner">
                            <!-- main-content-wrap -->
              <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Properties</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('user.index')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('user.shproduct.add')}}">
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
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('user.shproduct.store')}}">
                                  @csrf

                                    <div class="wg-box">
                                      @if(Session::has('status'))
                                         <p class="alert alert-success">{{ Session::get('status') }}</p>
                                         @endif
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Shop name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Username <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="username" tabindex="0" value="{{old('username')}}" aria-required="true" required="">
                                            <div class="text-tiny">The same as your registered username.</div>
                                        </fieldset>
                                        @error('username') <span class="alert alert-danger text-center">{{$message}} @enderror


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                                name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true" required="">
                                            <div class="text-tiny"></div>
                                        </fieldset>
                                        @error('slug') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Address<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="address" tabindex="0" value="{{old('address')}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering address.</div>
                                        </fieldset>
                                        @error('slug') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Square feet<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="squareft" tabindex="0" value="{{old('squareft')}}" aria-required="true" required="">
                                            <div class="text-tiny">Square feet in number</div>
                                        </fieldset>
                                        @error('squareft') <span class="alert alert-danger text-center">{{$message}} @enderror


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
                                            @error('category_id') <span class="alert alert-danger text-center">{{$message}} @enderror

                                              </div>

                                        <fieldset class="shortdescription">
                                            <div class="body-title mb-10">Short Description <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="short_description"
                                                placeholder="Short Description" tabindex="0" aria-required="true"
                                                required="">{{old('short_description')}}</textarea>
                                            <div class="text-tiny">Short Description</div>
                                        </fieldset>
                                        @error('short_description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true" required="">{{old('description')}}</textarea>
                                            <div class="text-tiny">Full descriptions.</div>
                                        </fieldset>
                                        @error('description') <span class="alert alert-danger text-center">{{$message}} @enderror

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
                                        @error('image') <span class="alert alert-danger text-center">{{$message}} @enderror

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
                                        @error('images') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price"
                                                    name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('regular_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('sale_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{old('mobile')}}" aria-required="true" required="">

                                        </fieldset>
                                        @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{old('SKU')}}" aria-required="true" required="">
                                            </fieldset>
                                            @error('SKU')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('quantity')<span class="alert alert-danger text-center">{{$message}} @enderror

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
                                            @error('stock_status')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Availability</div>
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
                                            @error('featured')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>



                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Features of a shop</b></label><br/>
                                          <input type="radio" id="myRadio1" name="displayarea" value="Display Area"><span class="body-title mb-10">Display Area</span><br/>
                                          <input type="radio" id="myRadio2" name="strgestckroom" value="Storage/Stock Room"><span class="body-title mb-10">Storage/Stock Room</span><br/>
                                          <input type="radio" id="myRadio3" name="etrncestorefront" value="Entrance and Storefront"><span class="body-title mb-10">Entrance and Storefront<br/>
                                          <input type="radio" id="myRadio4" name="signage" value="Signage"><span class="body-title mb-10">Signage</span><br/>
                                          <input type="radio" id="myRadio5"  name="lighting" value="Lighting"><span class="body-title mb-10">Lighting</span><br/>
                                          <input type="radio" id="myRadio6" name="securitysys" value="Security Systems"><span class="body-title mb-10">Security Systems<br/>
                                          <input type="radio" id="myRadio7" name="changingrooms" value="Changing Rooms"><span class="body-title mb-10">Changing Rooms</span><br/>
                                          <input type="radio" id="myRadio8" name="restroomfclits" value="Restroom Facilities"><span class="body-title mb-10">Restroom Facilities</span><br/>
                                          <input type="radio" id="myRadio9" name="staffarea" value="Staff Area"><span class="body-title mb-10">Staff Area</span><br/>
                                          <input type="radio" id="myRadio10" name="hvac" value="HVAC"><span class="body-title mb-10">HVAC</span><br/>
                                          <input type="radio" id="myRadio11" name="accbilityftrs" value="Accessibility Features"><span class="body-title mb-10">Accessibility Features</span><br/>
                                          <input type="radio" id="myRadio12" name="cstmersvicedesk" value="Customer Service Desk"><span class="body-title mb-10">Customer Service Desk</span><br/>
                                          <input type="radio" id="myRadio13" name="mchadisingfxtrs" value="Merchandising Fixtures"><span class="body-title mb-10">Merchandising Fixtures</span><br/>
                                          <input type="radio" id="myRadio14" name="musicpasystem" value="Music/PA System"><span class="body-title mb-10">Music/PA System</span><br/>

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


                     <script src="{{asset('js/jquery.min.js')}}"></script>
                     <script src="{{asset('js/bootstrap.min.js')}}"></script>
                     <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
                     <script src="{{asset('js/sweetalert.min.js')}}"></script>
                     <script src="{{asset('js/apexcharts/apexcharts.js')}}"></script>
                     <script src="{{asset('js/mains.js')}}"></script>



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


          <script>

          $(document).ready(function() {
            $('#myRadio').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio1').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio2').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio3').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio4').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio5').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio6').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio7').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio8').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio9').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio10').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio11').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio12').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio13').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio14').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio15').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio16').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio17').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio18').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio19').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio20').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio21').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio23').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio24').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio25').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio26').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio27').data('isChecked', false); // Initialize a data attribute to track state
            $('#myRadio28').data('isChecked', false); // Initialize a data attribute to track state


            $('#myRadio').on('click', function() {
              var status = $(this).data('isChecked'); // Get current state
              if (status) {
                $(this).prop("checked", false); // Uncheck if currently checked
              } else {
                $(this).prop("checked", true); // Check if currently unchecked
              }
              $(this).data('isChecked', !status); // Toggle the state
            });

          $('#myRadio1').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })

          $('#myRadio2').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })

          $('#myRadio3').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio4').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio5').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio6').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio7').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio8').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio9').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio10').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio11').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio12').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio13').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio14').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio15').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio16').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio17').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio18').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio19').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio20').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio21').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio22').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio23').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio24').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio25').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio26').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio27').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio28').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio29').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })
          $('#myRadio30').on('click', function() {
            var status = $(this).data('isChecked'); // Get current state
            if (status) {
              $(this).prop("checked", false); // Uncheck if currently checked
            } else {
              $(this).prop("checked", true); // Check if currently unchecked
            }
            $(this).data('isChecked', !status); // Toggle the state
          })


          });
          </script>

@endpush
