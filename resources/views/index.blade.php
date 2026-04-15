@extends('layouts.app')
@section('content')

<main>

  <!-- Header Start -->
  <div class="container-fluid header bg-white p-0">
      <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
          <div class="col-md-6 p-5 mt-lg-5">
              <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
              <p class="animated fadeIn mb-4 pb-2">Welcome to a world of timeless elegance and refined living — your luxurious retreat begins here.</p>
              <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
          </div>
          <div class="col-md-6 animated fadeIn">
              <div class="owl-carousel header-carousel">
                  <div class="owl-carousel-item">
                      <img class="img-fluid" src="{{asset('img/carousel-1.jpg')}}" alt="">
                  </div>
                  <div class="owl-carousel-item">
                      <img class="img-fluid" src="{{asset('img/carousel-2.jpg')}}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->

<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Property Type</option>
                            <option value="1">Property Type 1</option>
                            <option value="2">Property Type 2</option>
                            <option value="3">Property Type 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Location</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                            <option value="3">Location 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Welcome to Your Next Home. Discover comfort, style, and convenience with our exceptional selection of modern apartments, luxury villas, cozy vacation homes, commercial spaces. Whether you're looking for a weekend escape, a long-term rental, or the perfect place to settle in, we offer spaces that fit your lifestyle. Explore our listings, fall in love with the details, and let us help you find the perfect property—where comfort meets quality.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
              <!--  <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('user.appartmentPage')}}">-->
              <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiry.index')}}">

                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-apartment.png')}}" alt="Icon">
                        </div>
                        <h6>Apartment</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiryTwo.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-villa.png')}}" alt="Icon">
                        </div>
                        <h6>Villa</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiryThree.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-house.png')}}" alt="Icon">
                        </div>
                        <h6>Home</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiryFour.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-housing.png')}}" alt="Icon">
                        </div>
                        <h6>Office</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiryOne.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-building.png')}}" alt="Icon">
                        </div>
                        <h6>Building</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquirySix.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-neighborhood.png')}}" alt="Icon">
                        </div>
                        <h6>Townhouse</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquiryFive.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-condominium.png')}}" alt="Icon">
                        </div>
                        <h6>Shop</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('inquirySeven.index')}}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('img/icon-luxury.png')}}" alt="Icon">
                        </div>
                        <h6>Garage</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{asset('img/abou.jpg')}}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">#1 Place To Find The Perfect Property</h1>
                <p class="mb-4">Discover the difference with Perfect Property — where exceptional homes, trusted service, and unmatched value come together to turn your dream lifestyle into reality.</p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->


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
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($arpducts as $aproduct)

                            <div class="position-relative overflow-hidden">

                                <a href="{{route('inquiry.aproduct.details',['aproduct_slug'=>$aproduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/arpproducts')}}/{{$aproduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$aproduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Apartment</div>

                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$aproduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$aproduct->name}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$aproduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$aproduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$aproduct->bedroom}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$aproduct->bathroom}}</small>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($vlrpducts as $vproduct)

                            <div class="position-relative overflow-hidden">
                              <a href="{{route('inquiryTwo.vlproduct.detailsV',['vlproduct_slug'=>$vproduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/vlproducts')}}/{{$vproduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$vproduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Villa</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$vproduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$vproduct->short_description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$vproduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$vproduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$vproduct->bedroom}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$vproduct->bathroom}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($offrpducts as $offrpduct)

                            <div class="position-relative overflow-hidden">
                              <a href="{{route('inquiryFour.offproduct.detailsOff',['offproduct_slug'=>$offrpduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/offproducts')}}/{{$offrpduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$offrpduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Office</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$offrpduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$offrpduct->short_description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$offrpduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>square feet{{$offrpduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$offrpduct->name}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($bldrpducts as $bldrpduct)

                            <div class="position-relative overflow-hidden">
                              <a href="{{route('inquiryOne.bldproduct.detailsB',['bldproduct_slug'=>$bldrpduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/bldproducts')}}/{{$bldrpduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$bldrpduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Building</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">{{$bldrpduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$bldrpduct->short_description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$bldrpduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$bldrpduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$bldrpduct->rooms}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>Bathrooms</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($hmrpducts as $hmrpduct)

                            <div class="position-relative overflow-hidden">
                              <a href="{{route('inquiryThree.hmproduct.detailsH',['hmproduct_slug'=>$hmrpduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/hmproducts')}}/{{$hmrpduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$hmrpduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$hmrpduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$hmrpduct->name}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$hmrpduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$hmrpduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$hmrpduct->bedroom}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$hmrpduct->bathroom}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="property-item rounded overflow-hidden">
                          @foreach($shrpducts as $rshproduct)
                            <div class="position-relative overflow-hidden">
                              <a href="{{route('inquiryFive.shproduct.detailsS',['shproduct_slug'=>$rshproduct->slug])}}"><img class="img-fluid" alt="" src="{{asset('uploads/shproducts')}}/{{$rshproduct->image}}"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$rshproduct->availability}}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Shop</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$rshproduct->sale_price}}</h5>
                                <a class="d-block h5 mb-2" href="">{{$rshproduct->short_description}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$rshproduct->address}}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>Square feet{{$rshproduct->squareft}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$rshproduct->changingrooms}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-toilet text-primary me-2"></i>{{$rshproduct->restroomfclits}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Property List End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="{{asset('img/call-to-action.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            <p>Have questions or need expert guidance? Our certified property agent is here to help you every step of the way. Whether you're buying, selling, renting or simply exploring your options, you can count on professional support, honest advice, and seamless service.</p>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                        <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Agents</h1>
            <p>Buying, renting or selling property can be overwhelming — but it doesn’t have to be. Contact our certified agent today for professional advice and smooth, stress-free service..</p>
        </div>
        @foreach($cntdtail as $contactdtl)


                  <div class="col-md-12">
                    <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s"style="float:right;">
                      <div class="team-item rounded overflow-hidden">

                    <div class="position-relative" >
                        <img class="img-fluid" src="{{asset('uploads/agentimage')}}/{{$contactdtl->image}}" alt="{{$contactdtl->name}}">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href="{{$contactdtl->twitt}}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href="{{$contactdtl->fcbk}}"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href="{{$contactdtl->instgrm}}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">{{$contactdtl->name}}</h5>
                        <small>{{$contactdtl->designation}}</small>
                    </div>
                  </div>
                </div>

        </div>
        @endforeach

    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('img/testimonial-1.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('img/testimonial-2.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('img/testimonial-3.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


</main>

@endsection
