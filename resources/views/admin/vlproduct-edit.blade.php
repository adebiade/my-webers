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
                    <a href="{{route('admin.vlldproduct.add')}}">
                        <div class="text-tiny ">Villa</div>
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
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.vlproduct.update')}}">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{$vlproduct->id}}" />

            <div class="wg-box">
              @if(Session::has('status'))
                 <p class="alert alert-success">{{ Session::get('status') }}</p>
                 @endif
                 <fieldset class="name">
                     <div class="body-title mb-10">Villa name <span class="tf-color-1">*</span>
                     </div>
                     <input class="mb-10" type="text" placeholder="Enter product name"
                         name="name" tabindex="0" value="{{$vlproduct->name}}" aria-required="true" required="">
                     <div class="text-tiny">Do not exceed 100 characters when entering the
                         product name.</div>
                 </fieldset>
                 @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror

                 <fieldset class="name">
                     <div class="body-title mb-10">username <span class="tf-color-1">*</span>
                     </div>
                     <input class="mb-10" type="text" placeholder="Enter username"
                         name="username" tabindex="0" value="{{$vlproduct->username}}" aria-required="true" required="">
                     <div class="text-tiny">The same username as your account username.</div>
                 </fieldset>
                 @error('username') <span class="alert alert-danger text-center">{{$message}} @enderror


                <fieldset class="name">
                   <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                   <input class="mb-10" type="text" placeholder="Enter product slug"
                       name="slug" tabindex="0" value="{{$vlproduct->slug}}" aria-required="true" required="">
                   <div class="text-tiny"></div>
                </fieldset>


                <fieldset class="name">
                <div class="body-title mb-10">Address <span class="tf-color-1">*</span>
                </div>
                <input class="mb-10" type="text" placeholder="Enter product name"name="address" tabindex="0" value="{{$vlproduct->address}}" aria-required="true" required="">
                <div class="text-tiny">Do not exceed 100 characters when entering the Address</div>

                      </fieldset>
                      @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                      <fieldset class="name">
                          <div class="body-title mb-10">Square feet<span class="tf-color-1">*</span>
                          </div>
                          <input class="mb-10" type="text" placeholder="Enter product name"
                              name="squareft" tabindex="0" value="{{$vlproduct->squareft}}" aria-required="true" required="">
                          <div class="text-tiny">Enter the square feet number.</div>
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
                                         <option value="{{$category->id}}"{{$vlproduct->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
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
                                                required="">{{$vlproduct->short_description}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                short description.</div>
                                        </fieldset>
                                        @error('short_description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true" required="">{{$vlproduct->description}}</textarea>
                                            <div class="text-tiny">Enter your full description.</div>
                                        </fieldset>
                                        @error('description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                              @if($vlproduct->image)
                                                <div class="item" id="imgpreview">
                                                    <img src="{{asset('uploads/vlproducts')}}/{{$vlproduct->image}}"
                                         class="effect8" alt="{{$vlproduct->name}}">
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
                                        @error('image') <span class="alert alert-danger text-center">{{$message}} @enderror


                                        <fieldset>
                                            <div class="body-title mb-10">Upload Gallery Images</div>
                                            <div class="upload-image mb-16">
                                              @if($vlproduct->images)
                                              @foreach(explode(',',$vlproduct->images) as $img)
                                                 <div class="item gitems">
                                                 <img src="{{asset('uploads/vlproducts')}}/{{trim($img)}}" alt="">
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
                                        @error('images') <span class="alert alert-danger text-center">{{$message}} @enderror


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price"
                                                    name="regular_price" tabindex="0" value="{{$vlproduct->regular_price}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('regular_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{$vlproduct->sale_price}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('sale_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{$vlproduct->mobile}}" aria-required="true" required="">

                                        </fieldset>
                                        @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{$vlproduct->SKU}}" aria-required="true" required="">
                                            </fieldset>
                                            @error('SKU')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{$vlproduct->quantity}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('quantity')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                      <option value="Available"{{$vlproduct->stock_status == "Available" ? "selected":""}}>Available</option>
                                                      <option value="Sold"{{$vlproduct->stock_status == "Sold" ? "selected":""}}>Sold</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('stock_status')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Availability</div>
                                                <div class="select mb-10">
                                                    <select class="" name="availability">
                                                        <option value="For Sell"{{$vlproduct->availability == "For Sell" ? "selected":""}}>For Sell</option>
                                                        <option value="For Rent"{{$vlproduct->availability == "For Rent" ? "selected":""}}>For Rent</option>
                                                        <option value="For Lease"{{$vlproduct->availability == "For Lease" ? "selected":""}}>For Lease</option>

                                                    </select>
                                                </div>

                                            </fieldset>
                                            @error('availability')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                      <option value="0"{{$vlproduct->featured == "0" ? "selected":""}}>No</option>
                                                      <option value="1"{{$vlproduct->featured == "1" ? "selected":""}}>Yes</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('featured')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>


                                          <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Architectural and Design Features</b></label><br/>
                                          <input type="radio" name="spaciouslayout" value="Spacious Layout"> <span class="body-title mb-10">Spacious Layout</span><br/>
                                          <input type="radio" name="independentstructure" value="Independent Structure"><span class="body-title mb-10">Independent Structure</span><br/>
                                          <input type="radio" name="highceilings" value="High Ceilings"> <span class="body-title mb-10">High Ceilings<br/>
                                          <input type="radio" name="modernclscaesthtics" value="Modern or Classical Aesthetics"> <span class="body-title mb-10">Modern or Classical Aesthetics</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Outdoor Features</b></label><br/>
                                          <input type="radio" name="privategardenlawn " value="Private Garden/Lawn "><span class="body-title mb-10">Private Garden/Lawn</span><br/>
                                          <input type="radio" name="Swimmingpool" value="Swimming Pool"><span class="body-title mb-10">Swimming Pool</span><br/>
                                          <input type="radio" name="patiodeck" value="Patio or Deck"><span class="body-title mb-10">Patio or Deck</span><br/>
                                          <input type="radio" name="drvwygrgathtics" value="Driveway and Garage"><span class="body-title mb-10">Driveway and Garage</span><br/>

                                          <br><br>


                                          <label for="html"><b class="body-title mb-10">Interior Features</b></label><br/>
                                          <input type="radio" name="bedroom" value="Bedrooms"><span class="body-title mb-10"> Bedrooms</span><br/>
                                          <input type="radio" name="bathroom" value="Bathroom"><span class="body-title mb-10"> Bathroom</span><br/>
                                          <input type="radio" name="homeofficestudy " value="Home Office or Study"><span class="body-title mb-10">Home Office or Study</span><br/>
                                          <input type="radio" name="kitchen" value="Modern Kitchen"><span class="body-title mb-10">Modern Kitchen</span><br/>

                                          <br><br>



                                          <label for="html"><b class="body-title mb-10">Utilities and Technology</b></label><br/>
                                          <input type="radio" name="hvac" value="HVAC Systems"><span class="body-title mb-10">HVAC Systems</span><br/>
                                          <input type="radio" name="electrical " value="Electrical Wiring and Outlets"><span class="body-title mb-10">Electrical Wiring and Outlets</span><br/>
                                          <input type="radio" name="plumbing" value="Smart Home Feaxtures"><span class="body-title mb-10">Smart Home Feaxtures</span><br/>
                                          <input type="radio" name="highspeedinternet" value="High-Speed Internet"><span class="body-title mb-10">High-Speed Internet</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Lifestyle & Luxury Feature</b></label><br/>
                                          <input type="radio" name="smartsystems " value="Smart Systems"><span class="body-title mb-10">Smart Systems</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Security and Privacy</b></label><br/>
                                          <input type="radio" name="bndrywllsfencing" value="Boundary Walls or Fencing"><span class="body-title mb-10">Boundary Walls or Fencing</span><br/>
                                          <input type="radio" name="sveillancesystms" value="Surveillance Systems"><span class="body-title mb-10">Surveillance Systems<br/>
                                          <input type="radio" name="gatedentry" value="Gated Entry"><span class="body-title mb-10">Gated Entry</span><br/>
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
