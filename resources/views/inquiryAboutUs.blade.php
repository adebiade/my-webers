@extends('layouts.app')
@section('content')


<main>

  <!-- Property List Start -->
<div class="container-xxl py-5">

    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
          @foreach($vlproducts as $vlproduct)

            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3"style=' float:left'>For State Real Estate Platform</h1>
                    <p>Welcome to Forstates real estate platform, where finding the right property doesn’t have to be complicated.
                     We connect buyers, sellers, and investors with accurate listings, local expertise, and tools designed to make every
                     real estate decision confident and informed. Whether you’re searching for your first home or managing a growing
                     portfolio, we’re here to guide you every step of the way..</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"style="float:left;">
              <a href="#"><img class="img-fluid" src="{{asset('uploads/vlproducts')}}/{{$vlproduct->image}}" alt="{{$vlproduct->name}}"></a>

            </div>
        </div>
        @endforeach
                  </div>

                
<div class="container-xxl py-5" >
    <div class="container">


                    <img class="img-fluid" src="{{asset('img/contactus.jpg')}}" alt="">


    </div>
</div>

<!-- Testimonial End -->

</main>


@endsection
