@extends('layouts.admin')
@section('content')


<!-- Category Start -->
      <div class="container-xxl py-5">
          <div class="container">
              <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                  <h1 class="mb-3">Add Property</h1>
                  <p>Add your properties base on categories.</p>
              </div>
              <div class="row g-4">
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.arproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                              </div>
                              <h6>Apartment</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.vlldproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                              </div>
                              <h6>Villa</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.hmproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                              </div>
                              <h6>Home</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.offproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                              </div>
                              <h6>Office</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.bldproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-building.png" alt="Icon">
                              </div>
                              <h6>Building</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.twnproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-neighborhood.png" alt="Icon">
                              </div>
                              <h6>Townhouse</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.shproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-condominium.png" alt="Icon">
                              </div>
                              <h6>Shop</h6>
                              <span>123 Properties</span>
                          </div>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                      <a class="cat-item d-block bg-light text-center rounded p-3" href="{{route('admin.grgproduct.add')}}">
                          <div class="rounded p-4">
                              <div class="icon mb-3">
                                  <img class="img-fluid" src="img/icon-luxury.png" alt="Icon">
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


@endsection
