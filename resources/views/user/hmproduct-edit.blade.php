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
                                            <a href="{{route('user.vllproduct.add')}}">
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
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('user.hmproduct.update')}}">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="id" value="{{$hmproduct->id}}" />

                                    <div class="wg-box">
                                      @if(Session::has('status'))
                                         <p class="alert alert-success">{{ Session::get('status') }}</p>
                                         @endif

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Home name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{$hmproduct->name}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror


                                        <fieldset class="name">
                                            <div class="body-title mb-10">User name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="username" tabindex="0" value="{{$hmproduct->username}}" aria-required="true" required="">
                                            <div class="text-tiny">The same as your registered username.</div>
                                        </fieldset>
                                        @error('username') <span class="alert alert-danger text-center">{{$message}} @enderror


                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                                name="slug" tabindex="0" value="{{$hmproduct->slug}}" aria-required="true" required="">
                                            <div class="text-tiny"></div>

                                        </fieldset>
                                        @error('slug') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Address <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="address" tabindex="0" value="{{$hmproduct->address}}" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 200 characters when entering the Address.</div>
                                        </fieldset>
                                        @error('address') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Square feet<span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="squareft" tabindex="0" value="{{$hmproduct->squareft}}" aria-required="true" required="">
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
                                                        <option value="{{$category->id}}"{{$hmproduct->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
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
                                                required="">{{$hmproduct->short_description}}</textarea>
                                            <div class="text-tiny">Enter short description.</div>

                                        </fieldset>
                                        @error('short_description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required="">{{$hmproduct->description}}</textarea>
                                            <div class="text-tiny">Enter your full description.</div>
                                        </fieldset>
                                        @error('description') <span class="alert alert-danger text-center">{{$message}} @enderror

                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">

                                              @if($hmproduct->image)
                                                <div class="item" id="imgpreview">
                                                    <img src="{{asset('uploads/hmproducts')}}/{{$hmproduct->image}}"
                                                        class="effect8" alt="{{$hmproduct->name}}">
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
                                        @error('image')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        <fieldset>
                                            <div class="body-title mb-10">Upload Gallery Images</div>
                                            <div class="upload-image mb-16">
                                              @if($hmproduct->images)
                                              @foreach(explode(',',$hmproduct->images) as $img)
                                                 <div class="item gitems">
                                                        <img src="{{asset('uploads/hmproducts')}}/{{trim($img)}}" alt="">
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
                                                    name="regular_price" tabindex="0" value="{{$hmproduct->regular_price}}" aria-required="true"
                                                    required="">

                                            </fieldset>
                                            @error('regular_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price"
                                                    name="sale_price" tabindex="0" value="{{$hmproduct->sale_price}}" aria-required="true"
                                                    required="">

                                            </fieldset>
                                            @error('sale_price') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Working phone number <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="phone number" name="mobile" tabindex="0" value="{{$hmproduct->mobile}}" aria-required="true" required="">

                                            </fieldset>
                                            @error('mobile')<span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU"
                                                    tabindex="0" value="{{$hmproduct->SKU}}" aria-required="true" required="">

                                            </fieldset>
                                            @error('SKU') <span class="alert alert-danger text-center">{{$message}} @enderror

                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{$hmproduct->quantity}}" aria-required="true"
                                                    required="">

                                            </fieldset>
                                            @error('quantity') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="Available"{{$hmproduct->stock_status == "Available" ? "selected":""}}>Available</option>
                                                        <option value="Sold"{{$hmproduct->stock_status == "Sold" ? "selected":""}}>Sold</option>
                                                    </select>
                                                </div>

                                            </fieldset>
                                            @error('stock_status') <span class="alert alert-danger text-center">{{$message}} @enderror

                                              <fieldset class="name">
                                                  <div class="body-title mb-10">Availability</div>
                                                  <div class="select mb-10">
                                                      <select class="" name="availability">
                                                          <option value="For Sell" {{$hmproduct->availability == "For Sell" ? "selected":""}}>For Sell</option>
                                                          <option value="For Rent" {{$hmproduct->availability == "For Rent" ? "selected":""}}>For Rent</option>
                                                          <option value="For Lease" {{$hmproduct->availability == "For Lease" ? "selected":""}}>For Lease</option>

                                                      </select>
                                                  </div>

                                              </fieldset>
                                              @error('availability')<span class="alert alert-danger text-center">{{$message}} @enderror


                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0"{{$hmproduct->featured == "0" ? "selected":""}}>No</option>
                                                        <option value="1"{{$hmproduct->featured == "1" ? "selected":""}}>Yes</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('featured') <span class="alert alert-danger text-center">{{$message}} @enderror

                                        </div>



                                        <div class="wg-box">
                                          <fieldset class="description">
                                          <div class="body-title mb-10">Features</div><br/>
                                          <label for="html"><b class="body-title mb-10">Architectural and Design Features</b></label><br/>
                                          <input type="radio" id="myRadio1" name="roof" value="Roof"> <span class="body-title mb-10">Roof</span><br/>
                                          <input type="radio" id="myRadio2" name="drivewaygarage" value="Driveway/garage"> <span class="body-title mb-10">Driveway and garage<br/>
                                          <input type="radio" id="myRadio3" name="pchblnydeck" value="Porch, balcony, deck/patio"><span class="body-title mb-10">Porch, balcony, deck, or patio</span><br/>
                                          <input type="radio" id="myRadio4" name=" ldscpngYardgdenspce" value="Landscaping and yard/garden space"><span class="body-title mb-10">Landscaping and yard/garden space</span><br/>
                                          <input type="radio" id="myRadio5" name="swmgplhottub" value="Swimming pool or hot tub"><span class="body-title mb-10">Swimming pool or hot tub</span><br/>

                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Interior Features</b></label><br/>
                                          <input type="radio" id="myRadio6" name="bedroom " value="Bedrooms"><span class="body-title mb-10">Bedrooms</span><br/>
                                          <input type="radio" id="myRadio7" name="bathroom" value="Bathrooms"><span class="body-title mb-10">Bathrooms</span><br/>
                                          <input type="radio" id="myRadio8" name="laundryroom" value="Laundry Room"><span class="body-title mb-10">Laundry Room</span><br/>
                                          <input type="radio" id="myRadio9" name="storage" value="Storage"><span class="body-title mb-10">Storage</span><br/>
                                          <input type="radio" id="myRadio10" name="fireplace" value="Fireplace"><span class="body-title mb-10">Fireplace</span><br/>
                                          <input type="radio" id="myRadio11" name="dining" value="Dining"><span class="body-title mb-10">Dining</span><br/>
                                          <input type="radio" id="myRadio12" name="flooring" value="Flooring"><span class="body-title mb-10">Flooring</span><br/>
                                          <input type="radio" id="myRadio13" name="lighting" value="Lighting"><span class="body-title mb-10">Lighting</span><br/>

                                          <br><br>


                                          <label for="html"><b class="body-title mb-10">Comfort and Convenience</b></label><br/>
                                          <input type="radio" id="myRadio14" name="hvac" value="HVAC"><span class="body-title mb-10">HVAC</span><br/>
                                          <input type="radio" id="myRadio15" name="windows" value="Windows"><span class="body-title mb-10">Windows</span><br/>
                                          <input type="radio" id="myRadio16" name="gym" value="Gym"><span class="body-title mb-10">Gym</span><br/>
                                          <input type="radio" id="myRadio17" name="homeofficestudy" value="Home office/orstudy"><span class="body-title mb-10">Home office or study</span><br/>
                                          <input type="radio" id="myRadio18" name="soundproof" value="Soundproof"><span class="body-title mb-10">Soundproof</span><br/>
                                          <br><br>

                                          <label for="html"><b class="body-title mb-10">Safety and Security</b></label><br/>
                                          <input type="radio" id="myRadio19" name="securitysystems" value="Security systems"><span class="body-title mb-10">Security systems</span><br/>
                                          <input type="radio" id="myRadio20" name="plumbing" value="Plumbing Systems"><span class="body-title mb-10">Plumbing Systems</span><br/>
                                          <input type="radio" id="myRadio21" name="fireextinguishers" value=">Fire extinguishersor/sprinklers"><span class="body-title mb-10">Fire extinguishers or sprinklers</span><br/>
                                          <input type="radio" id="myRadio22" name="securelcksdoors" value="Secure locks/doors"><span class="body-title mb-10">Secure locks and doors</span><br/>
                                          <input type="radio" id="myRadio23" name="foundation" value="Foundation"><span class="body-title mb-10">Foundation</span><br/>
                                          <input type="radio" id="myRadio24" name="facadedesign" value="facadedesign"><span class="body-title mb-10">Facade design</span><br/>

                                          <br><br>facadedesign

                                          <label for="html"><b class="body-title mb-10">Sustainability Features</b></label><br/>
                                          <input type="radio" id="myRadio25" name="solarpanels" value="Solar panels"><span class="body-title mb-10">Solar panels</span><br/>
                                          <input type="radio" id="myRadio26" name="energyeffictapplnce" value="Energy-efficient appliances"><span class="body-title mb-10">Energy-efficient appliances<br/>
                                          <input type="radio" id="myRadio27" name="rainwaterharvesting" value="Rainwater harvesting"><span class="body-title mb-10">Rainwater harvesting</span><br/>
                                          <input type="radio" id="myRadio28" name="livingrooms" value="Living room"><span class="body-title mb-10">Living room<br/>
                                          <input type="radio" id="myRadio29" name="Sstnablebuldngmtrls" value="Sustainable building materials"><span class="body-title mb-10">Sustainable building materials</span><br/>
                                          <input type="radio" id="myRadio30" name="smartsystems" value="Smart systems"><span class="body-title mb-10">Smart systems</span><br/>

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
                        <script>
                            (function ($) {

                                var tfLineChart = (function () {

                                    var chartBar = function () {

                                        var options = {
                                            series: [{
                                                name: 'Total',
                                                data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                                            }, {
                                                name: 'Pending',
                                                data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                                            },
                                            {
                                                name: 'Delivered',
                                                data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                                            }, {
                                                name: 'Canceled',
                                                data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 325,
                                                toolbar: {
                                                    show: false,
                                                },
                                            },
                                            plotOptions: {
                                                bar: {
                                                    horizontal: false,
                                                    columnWidth: '10px',
                                                    endingShape: 'rounded'
                                                },
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            legend: {
                                                show: false,
                                            },
                                            colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                                            stroke: {
                                                show: false,
                                            },
                                            xaxis: {
                                                labels: {
                                                    style: {
                                                        colors: '#212529',
                                                    },
                                                },
                                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                            },
                                            yaxis: {
                                                show: false,
                                            },
                                            fill: {
                                                opacity: 1
                                            },
                                            tooltip: {
                                                y: {
                                                    formatter: function (val) {
                                                        return "$ " + val + ""
                                                    }
                                                }
                                            }
                                        };

                                        chart = new ApexCharts(
                                            document.querySelector("#line-chart-8"),
                                            options
                                        );
                                        if ($("#line-chart-8").length > 0) {
                                            chart.render();
                                        }
                                    };

                                    /* Function ============ */
                                    return {
                                        init: function () { },

                                        load: function () {
                                            chartBar();
                                        },
                                        resize: function () { },
                                    };
                                })();

                                jQuery(document).ready(function () { });

                                jQuery(window).on("load", function () {
                                    tfLineChart.load();
                                });

                                jQuery(window).on("resize", function () { });
                            })(jQuery);
                        </script>


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
