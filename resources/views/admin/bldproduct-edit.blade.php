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
                                            <a href="{{route('admin.bldproduct.add')}}">
                                                <div class="text-tiny "> Building</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Properties</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- form-add-product -->
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.bldproduct.update')}}">
                                  @csrf
                                  @method('PUT')
                                   <input type="hidden" name="id" value="{{$ebldproduct->id}}" />
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Product name <span class=" tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{$ebldproduct->name}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">username <span class=" tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter username"
                                                name="username" tabindex="0" value="{{$ebldproduct->username}}" aria-required="true" required="">
                                            <div class="text-tiny">The same username as your account username.</div>
                                        </fieldset>


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0" value="{{$ebldproduct->slug}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Square feet <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="squareft" tabindex="0" value="{{$ebldproduct->squareft}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 200 characters when entering the
                                                Address.</div>
                                                @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Address <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="address" tabindex="0" value="{{$ebldproduct->address}}" aria-required="true" required="">
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
                                                        <option value="{{$category->id}}" {{$ebldproduct->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
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
                                                required="">{{$ebldproduct->short_description}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description"
                                                tabindex="0" aria-required="true" required="">{{$ebldproduct->description}}</textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                              @if($ebldproduct->image)
                                                <div class="item" id="imgpreview">
                                                    <img src="{{asset('uploads/bldproducts')}}/{{$ebldproduct->image}}"
                                                        class="effect8" alt="{{$ebldproduct->name}}">
                                                </div>
                                                @endif

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
                                              @if($ebldproduct->images)
                                              @foreach(explode(',',$ebldproduct->images) as $img)
                                                 <div class="item gitems">
                                                        <img src="{{asset('uploads/bldproducts')}}/{{trim($img)}}" alt="">
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
                                                    name="regular_price" tabindex="0" value="{{$ebldproduct->regular_price}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{$ebldproduct->sale_price}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{$ebldproduct->mobile}}" aria-required="true" required="">
                                                @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{$ebldproduct->SKU}}" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{$ebldproduct->quantity}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <div class="cols gap22">

                                          <fieldset class="name">
                                              <div class="body-title mb-10">Availability</div>
                                              <div class="select mb-10">
                                                  <select class="" name="availability">
                                                      <option value="For Sell"{{$ebldproduct->availability == "For Sell" ? "selected":""}}>For Sell</option>
                                                      <option value="For Rent"{{$ebldproduct->availability == "For Rent" ? "selected":""}}>For Rent</option>
                                                      <option value="For Lease"{{$ebldproduct->availability == "For Lease" ? "selected":""}}>For Lease</option>

                                                  </select>
                                              </div>
                                              @error('availability')<span class="alert alert-danger text-center">{{$message}} @enderror

                                          </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                      <option value="Available" {{$ebldproduct->stock_status == "Available" ? "selected":""}}>Available</option>
                                                      <option value="Rented" {{$ebldproduct->stock_status == "Rented" ? "selected":""}}>Rented</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                          </div>
                                          <div class="cols gap22">

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                      <option value="0" {{$ebldproduct->featured == "0" ? "selected":""}}>No</option>
                                                      <option value="1" {{$ebldproduct->featured == "1" ? "selected":""}}>Yes</option>

                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>



                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Structural Features</b></label><br/>
                                          <input type="radio" name="foundation" value="Foundation"> <span class="body-title mb-10">Foundation</span><br/>
                                          <input type="radio" name="frame" value="Frame"><span class="body-title mb-10">Frame</span><br/>
                                          <input type="radio" name="walls" value="Walls"> <span class="body-title mb-10">Walls<br/>
                                          <input type="radio" name="roof" value="Roof"> <span class="body-title mb-10">Roof</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Architectural Features</b></label><br/>
                                          <input type="radio" name="windowsdoors" value="Windows and Doors"><span class="body-title mb-10">Windows and Doors</span><br/>
                                          <input type="radio" name="balconiesverandas" value="Balconies/Verandas"><span class="body-title mb-10">Balconies/Verandas</span><br/>
                                          <input type="radio" name="staircaseselevators" value="Staircases/Elevators"><span class="body-title mb-10">Staircases and Elevators</span><br/>
                                          <input type="radio" name="facadedesign" value="Facade Design"><span class="body-title mb-10">Façade Design</span><br/>
                                          <br><br>


                                          <label for="html"><b class="body-title mb-10">Interior Features</b></label><br/>
                                          <input type="radio" name="Flooring" value="Flooring"><span class="body-title mb-10">Flooring</span><br/>
                                          <input type="radio" name="ceilingdesign" value="Ceiling Design"><span class="body-title mb-10">Ceiling Design</span><br/>
                                          <input type="radio" name="lightingfixtures" value="Lighting Fixtures"><span class="body-title mb-10">Lighting Fixtures</span><br/>
                                          <input type="radio" name="rooms" value="Rooms"><span class="body-title mb-10">Rooms</span><br/>

                                          <br><br>



                                          <label for="html"><b class="body-title mb-10">Mechanical, Electrical & Plumbing (MEP)</b></label><br/>
                                          <input type="radio" name="hvacsystems" value="HVAC Systems"><span class="body-title mb-10">HVAC Systems</span><br/>
                                          <input type="radio" name="electricalwiring " value="ElectricalWiringOutlets"><span class="body-title mb-10">Electrical Wiring and Outlets</span><br/>
                                          <input type="radio" name="plumbing" value="Plumbing Systems"><span class="body-title mb-10">Plumbing Systems</span><br/>
                                          <input type="radio" name="firesafetysystems" value="Fire Safety Systems"><span class="body-title mb-10">Fire Safety Systems</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Lifestyle & Luxury Feature</b></label><br/>
                                          <input type="radio" name="smartsystems" value="Smart Systems"><span class="body-title mb-10">Smart Systems</span><br/>
                                          <input type="radio" name="securitysystems" value="Security Systems"><span class="body-title mb-10">Security Systems<br/>
                                          <input type="radio" name="internetnetworkcablings" value="InternetNetworkCabling"><span class="body-title mb-10">Internet and Network Cabling</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Sustainability Features</b></label><br/>
                                          <input type="radio" name="insulation" value="Insulation"><span class="body-title mb-10">Insulation</span><br/>
                                          <input type="radio" name="solarpanels" value="Solar Panels"><span class="body-title mb-10">Solar Panels<br/>
                                          <input type="radio" name="rainwaterharvesting" value="Rainwater Harvesting"><span class="body-title mb-10">Rainwater Harvesting</span><br/>
                                          <input type="radio" name="greenroofswalls" value="Green Roofs/Walls"><span class="body-title mb-10">Green Roofs/Walls</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Accessibility Features</b></label><br/>
                                          <input type="radio" name="ramps" value="Ramps"><span class="body-title mb-10">Ramps</span><br/>
                                          <input type="radio" name="widedoorwayshallways" value="Wide DoorWay Shallways"><span class="body-title mb-10">Wide Door Way Shallways<br/>
                                          <input type="radio" name="accessiblerestrooms" value="Accessible Restrooms"><span class="body-title mb-10">Accessible Restrooms</span><br/>
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
