@extends('layouts.app')
@section('content')


<main>

  <!-- Property List Start -->
<div class="container-xxl py-5">

    <div class="container">
        <div class="row g-0 gx-5 align-items-end">

            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                    <p>We’re so excited to introduce you to this beautiful property listing. Whether you’re searching for your dream
                      home, a cozy rental, or the perfect investment opportunity, we’re here to help you find a space that feels just
                       right. Explore, envision, and let’s make your real estate journey a smooth and memorable one.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                    </li>
                </ul>
            </div>
        </div>


        @foreach($aproducts as $aproduct)

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"style="float:right;">
                      <section class="m-4">
                            <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{route('inquiry.aproduct.details',['aproduct_slug'=>$aproduct->slug])}}"><img class="img-fluid" src="{{asset('uploads/arpproducts')}}/{{$aproduct->image}}" alt="{{$aproduct->name}}"></a>
                                <p></p>

                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$aproduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{$aproduct->category->name}}</div>
                            </div>

                          <!--  <div class="position-relative overflow-hidden">
                              @foreach(explode(",",$aproduct->images) as $gimgs)
                                <a href=""><img class="img-fluid" src="{{asset('uploads/arpproducts')}}/{{$gimgs}}" alt="{{$aproduct->name}}"></a>
                                <p></p>
                                  @endforeach
                            </div>-->


                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">{{$aproduct->regular_price}}</h5>
                                <a class="d-block h5 mb-2" href="{{route('inquiry.aproduct.details',['aproduct_slug'=>$aproduct->slug])}}">{{$aproduct->short_description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$aproduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">


                              <div class="nav-item dropdown">
                                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                                  <div class="dropdown-menu rounded-0 m-0"  style="width:300px; height:500px;overflow-y:scroll;">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->squareft}}</a></small><br />
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->bedroom}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->bathroom}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-chair text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->livingroom}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-utensil-spoon text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->kitchen}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-people-carry text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->familyunit}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-water text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->plumbing}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-tv text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->electricitylighting}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-swimming-pool text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->swimmingpool}}</a></small><br />
                                    <!--<small class="flex-fill text-center py-2"><i class="fa fa-weight-hanging text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->gym}}</a></small><br />-->
                                    <small class="flex-fill text-center py-2"><i class="fa fa-network-wired text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->internetcableready}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="fa fa-door-closed text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->entrancescorridors}}</a></small><br />

                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->utilityarea}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->flooringfinish}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->individualunit}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->sharedwallfloor}}</a></small><br />

                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->balconieorterrace}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->hvacACUnits}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->petfriendlyspaces}}</a></small><br />

                                    <small class="flex-fill text-center py-2"><i class="fa fa-phone text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->locksintercom}}</a></small><br />
                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->elevatorsstaircases}}</a></small><br />

                                    <small class="flex-fill text-center py-2"><i class="text-primary me-2"></i><a href="" style="font-size:15px;">{{$aproduct->rooftopgardenterrace}}</a></small><br />










                                  </div>
                              </div>





                            </div>
                       </div>

                    <section>
                    </div>
                    @endforeach

                  </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                  {{$aproducts->links('pagination::bootstrap-5')}}
                </div>


<!-- Property List End -->






<!-- Testimonial Start -->
<div class="container-xxl py-5" style="margin-top:1500px">
    <div class="container">

        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div>

            </div>


        </div>
    </div>
</div>

<!-- Testimonial End -->

</main>


@endsection
