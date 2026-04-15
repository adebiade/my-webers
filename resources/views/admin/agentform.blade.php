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
                            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                <h3>All Products</h3>
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
                                        <div class="text-tiny">All Products</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="wg-box">
                                <div class="flex items-center justify-between gap10 flex-wrap">
                                    <div class="wg-filter flex-grow">
                                        <form class="form-search">
                                            <fieldset class="name">
                                                <input type="text" placeholder="Search here..." class="" name="name"
                                                    tabindex="2" value="" aria-required="true" required="">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button class="" type="submit"><i class="icon-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <a class="tf-button style-1 w208" href="{{route('admin.property.add')}}"><i
                                            class="icon-plus"></i>Add new properties</a>
                                </div>
                                <div class="table-responsive">
                                  @if(Session::has('status'))
                                       <p class="alert alert-success">{{ Session::get('status') }}</p>
                                       @endif
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:200px;">#</th>
                                                <th style="width:200px;">Name</th>
                                                <th style="width:200px;">image</th>
                                                <th style="width:200px;">designation</th>
                                                <th style="width:200px;">twitt</th>
                                                <th style="width:200px;">fcbk</th>
                                                <th style="width:200px;">instgrm</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                          @foreach($agentlists as $agentlist)

                                            <tr>
                                                <td>{{ $arproduct->id }}</td>
                                                <td class="pname">
                                                    <div class="image">
                                                        <img src="{{asset('uploads/agentimage/thumbnails')}}/{{$agentlist->image}}" alt="{{$agentlist->name}}" class="image">
                                                    </div>
                                                    <div class="name">
                                                        <a href="#" class="body-title-2">{{$agentlist->name}}</a>
                                                    </div>
                                                </td>
                                                <td>{{$agentlist->designation}}</td>
                                                <td>{{$agentlist->image}}</td>
                                                <td>{{$agentlist->twitt}}</td>
                                                <td>{{$agentlist->fcbk}}</td>
                                                <td>{{$agentlist->instgrm}}</td>


                                                <td>
                                                    <div class="list-icon-function">
                                                        <a href="#" target="_blank">
                                                            <div class="item eye">
                                                                <i class="icon-eye"></i>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="item edit">
                                                                <i class="icon-edit-3"></i>
                                                            </div>
                                                        </a>
                                                        <form action="#" method="POST">
                                                          <!--@csrf
                                                          @method('DELETE')-->
                                                            <div class="item text-danger delete">
                                                                <i class="icon-trash-2"></i>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="divider"></div>
                                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                       {{$agentlists->links('pagination::bootstrap-5')}}
                                </div>
                            </div>
                        </div>


                    </div>


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
             $('.delete').on('click',function(e){
             e.preventDefault();
             var form = $(this).closest('form');
             swal({
             title: "Are you sure?",
             text: "You want to delete this record?",
             type:"warning",
             buttons:["No","Yes"],
             confirmButtonColor:'#dc3545',
             }).then(function(result){
             if(result){
               form.submit();
             }
             });
             });
             });
             </script>

             @endpush
