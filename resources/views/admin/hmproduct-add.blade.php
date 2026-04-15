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
                                            <a href="{{route('admin.hmproduct.add')}}">
                                                <div class="text-tiny ">Home</div>
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
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.hmproduct.store')}}">
                                  @csrf

                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Home name <span class="tf-color-1">*</span>
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
                                            <div class="text-tiny">Should be the same with your account username.</div>
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
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                                @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

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
                                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required="">{{old('description')}}</textarea>
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
                                            @error('images') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </fieldset>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price"
                                                    name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true"
                                                    required="">
                                                    @error('regular_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true"
                                                    required="">

                                                    @error('sale_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="phone number" name="mobile"tabindex="0" value="{{old('mobile')}}" aria-required="true" required="">
                                                    @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>

                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{old('SKU')}}" aria-required="true" required="">
                                                    @error('SKU') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true"
                                                    required="">
                                                    @error('quantity') <span class="alert alert-danger text-center">{{$message}} @enderror

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
                                                @error('stock_status') <span class="alert alert-danger text-center">{{$message}} @enderror

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
                                                @error('featured') <span class="alert alert-danger text-center">{{$message}} @enderror
                                            </fieldset>
                                        </div>



                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Architectural and Design Features</b></label><br/>
                                          <input type="radio" name="roof" value="Roof"> <span class="body-title mb-10">Roof</span><br/>
                                          <input type="radio" name="drivewaygarage" value="Driveway/garage"> <span class="body-title mb-10">Driveway and garage<br/>
                                          <input type="radio" name="pchblnydeck" value="Porch, balcony, deck/patio"><span class="body-title mb-10">Porch, balcony, deck, or patio</span><br/>
                                          <input type="radio" name=" ldscpngYardgdenspce" value="Landscaping and yard/garden space"><span class="body-title mb-10">Landscaping and yard/garden space</span><br/>
                                          <input type="radio" name="swmgplhottub" value="Swimming pool or hot tub"><span class="body-title mb-10">Swimming pool or hot tub</span><br/>

                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Interior Features</b></label><br/>
                                          <input type="radio" name="bedroom " value="Bedrooms"><span class="body-title mb-10">Bedrooms</span><br/>
                                          <input type="radio" name="bathroom" value="Bathrooms"><span class="body-title mb-10">Bathrooms</span><br/>
                                          <input type="radio" name="laundryroom" value="Laundry Room"><span class="body-title mb-10">Laundry Room</span><br/>
                                          <input type="radio" name="storage" value="Storage"><span class="body-title mb-10">Storage</span><br/>
                                          <input type="radio" name="fireplace" value="Fireplace"><span class="body-title mb-10">Fireplace</span><br/>
                                          <input type="radio" name="dining" value="Dining"><span class="body-title mb-10">Dining</span><br/>
                                          <input type="radio" name="flooring" value="Flooring"><span class="body-title mb-10">Flooring</span><br/>
                                          <input type="radio" name="lighting" value="Lighting"><span class="body-title mb-10">Lighting</span><br/>

                                          <br><br>


                                          <label for="html"><b class="body-title mb-10">Comfort and Convenience</b></label><br/>
                                          <input type="radio" name="hvac" value="HVAC"><span class="body-title mb-10">HVAC</span><br/>
                                          <input type="radio" name="windows" value="Windows"><span class="body-title mb-10">Windows</span><br/>
                                          <input type="radio" name="gym" value="Gym"><span class="body-title mb-10">Gym</span><br/>
                                          <input type="radio" name="homeofficestudy" value="Home office/orstudy"><span class="body-title mb-10">Home office or study</span><br/>
                                          <input type="radio" name="soundproof" value="Soundproof"><span class="body-title mb-10">Soundproof</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Safety and Security</b></label><br/>
                                          <input type="radio" name="securitysystems" value="Security systems"><span class="body-title mb-10">Security systems</span><br/>
                                          <input type="radio" name="plumbing" value="Plumbing Systems"><span class="body-title mb-10">Plumbing Systems</span><br/>
                                          <input type="radio" name="fireextinguishers" value=">Fire extinguishersor/sprinklers"><span class="body-title mb-10">Fire extinguishers or sprinklers</span><br/>
                                          <input type="radio" name="securelcksdoors" value="Secure locks/doors"><span class="body-title mb-10">Secure locks and doors</span><br/>
                                          <input type="radio" name="foundation" value="Foundation"><span class="body-title mb-10">Foundation</span><br/>
                                          <input type="radio" name="facadedesign" value="facadedesign"><span class="body-title mb-10">Facade design</span><br/>

                                          <br><br>facadedesign

                                          <label for="html"><b class="body-title mb-10">Sustainability Features</b></label><br/>
                                          <input type="radio" name="solarpanels" value="Solar panels"><span class="body-title mb-10">Solar panels</span><br/>
                                          <input type="radio" name="energyeffictapplnce" value="Energy-efficient appliances"><span class="body-title mb-10">Energy-efficient appliances<br/>
                                          <input type="radio" name="rainwaterharvesting" value="Rainwater harvesting"><span class="body-title mb-10">Rainwater harvesting</span><br/>
                                          <input type="radio" name="livingrooms" value="Living room"><span class="body-title mb-10">Living room<br/>
                                          <input type="radio" name="Sstnablebuldngmtrls" value="Sustainable building materials"><span class="body-title mb-10">Sustainable building materials</span><br/>
                                          <input type="radio" name="smartsystems" value="Smart systems"><span class="body-title mb-10">Smart systems</span><br/>

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
