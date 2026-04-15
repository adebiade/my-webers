@extends('layouts.admin')
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
  <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.agentform.index')}}">
    @csrf

      <div class="wg-box">
        @if(Session::has('status'))
           <p class="alert alert-success">{{ Session::get('status') }}</p>
           @endif
        <fieldset class="name">
            <div class="body-title mb-10">Your name <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter your name"
                name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
            <div class="text-tiny">Do not exceed 100 characters when entering the name.</div>
            @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror

        </fieldset>
        <fieldset class="name">
            <div class="body-title mb-10">Designation <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter product name"
                name="designation" tabindex="0" value="{{old('designation')}}" aria-required="true" required="">
            <div class="text-tiny">Do not exceed 100 characters.</div>
            @error('designation') <span class="alert alert-danger text-center">{{$message}} @enderror

        </fieldset>

        <fieldset class="name">
            <div class="body-title mb-10">Twitter <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter your twitter account"
                name="twitt" tabindex="0" value="{{old('twitt')}}" aria-required="true" required="">
            <div class="text-tiny">Your facebook acccount link.</div>
            @error('twitt') <span class="alert alert-danger text-center">{{$message}} @enderror

        </fieldset>

        <fieldset class="name">
            <div class="body-title mb-10">Facebook <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter your twitter account"
                name="fcbk" tabindex="0" value="{{old('fcbk')}}" aria-required="true" required="">
            <div class="text-tiny">Your facebook acccount link.</div>
            @error('fcbk') <span class="alert alert-danger text-center">{{$message}} @enderror

        </fieldset>

        <fieldset class="name">
            <div class="body-title mb-10">Instagram <span class="tf-color-1">*</span>
            </div>
            <input class="mb-10" type="text" placeholder="Enter your twitter account"
                name="fcbk" tabindex="0" value="{{old('instgrm')}}" aria-required="true" required="">
            <div class="text-tiny">Your instagram acccount link.</div>
            @error('instgrm') <span class="alert alert-danger text-center">{{$message}} @enderror

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


@endpush
