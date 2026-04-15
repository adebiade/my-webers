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
   <div class="main-content-wrap">
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

         <div class="wg-box" style="margin-left:200px;">


         <form action="{{route('user.initialize')}}" method="POST" enctype="multipart/form-data" class="tf-section-2 form-add-product">
           @csrf

             <div class="wg-box">
               <h3>Payment form</h3>

               @if(Session::has('status'))
                  <p class="alert alert-success">{{ Session::get('status') }}</p>
                  @endif

               <fieldset class="name">
                   <div class="body-title mb-10">Full name <span class="tf-color-1">*</span>
                   </div>
                   <input class="mb-10" type="text" placeholder="Full name" name="name" value="{{old('name')}}" tabindex="0" aria-required="true" required="">
                   <div class="text-tiny"></div>
                   @error('name') <span class="alert alert-danger text-center">{{$message}} @enderror

               </fieldset>

                 <fieldset class="name">
                     <div class="body-title mb-10">Email<span class="tf-color-1">*</span>
                     </div>
                     <input class="mb-10" type="email" placeholder="email" name="email" value="{{old('email')}}"  tabindex="0" aria-required="true" required="">
                     <div class="text-tiny"></div>
                     @error('email') <span class="alert alert-danger text-center">{{$message}} @enderror

                 </fieldset>

                 <fieldset class="name">
                     <div class="body-title mb-10">Telephone number<span class="tf-color-1">*</span>
                     </div>
                     <input class="mb-10" type="tel" placeholder="phone" name="phone" value="{{old('phone')}}" tabindex="0" aria-required="true" required="">
                     <div class="text-tiny"></div>
                     @error('phone') <span class="alert alert-danger text-center">{{$message}} @enderror

                 </fieldset>



             <div class="wg-box">
               <fieldset class="description">
               <div class="body-title mb-10">Payment Plans<span class="tf-color-1">*</span></div><br/>
               <input type="tel" value="{{old('phone')}}" name="amount" tabindex="0" aria-required="true" required="" ><br/><br/>
               <span class="body-title mb-10">Basic plan per Month/N20000</span><br/>
               <span class="body-title mb-10">Silver plan per 3 Month/N72000</span><br/>
               <span class="body-title mb-10">Premium plan per 6 Month/N144000</span><br/>
             </fieldset>
             </div>
             <div class="cols gap10">
                 <button type="submit" class="btn btn-success" title="Pay now">Pay now</button>
             </div>
             </div>
             </form>

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
               <a class="tf-button style-1 w208" href="{{route('user.property.add')}}"><i
                       class="icon-plus"></i>Add new properties</a>
           </div>
           <div class="table-responsive">
               <table class="table table-striped table-bordered">
                   <thead>
                       <tr>
                           <th style="width:200px;">#</th>
                           <th style="width:200px;">Name</th>
                           <th style="width:200px;">sdscrptn</th>
                           <th style="width:200px;">dscrptn</th>
                           <th style="width:200px;">Bdrm</th>
                           <th style="width:200px;">bthrm</th>
                           <th style="width:200px;">Username</th>
                           <th style="width:200px;">mobile</th>
                           <th style="width:200px;">availability</th>

                           <th style="width:200px;">Address</th>
                           <th style="width:200px;">sqrft</th>
                           <th style="width:200px;">sPrice</th>
                           <th style="width:200px;">Category</th>
                           <th style="width:200px;">Featured</th>
                           <th style="width:200px;">Stock</th>
                           <th style="width:200px;">Quantity</th>


                           <th style="width:200px;">dining</th>
                           <th style="width:200px;">foundation</th>
                           <th style="width:200px;">windows</th>
                           <th style="width:200px;">walls</th>
                           <th style="width:200px;">roof</th>
                           <th style="width:200px;">storage</th>
                           <th style="width:200px;">pchblnydeck</th>
                            <th style="width:200px;">homeofficestudy</th>
                            <th style="width:200px;">facadedesign</th>
                            <th style="width:200px;">flooring</th>
                            <th style="width:200px;">laundryroom</th>
                            <th style="width:200px;">lighting</th>
                            <th style="width:200px;">livingrooms</th>
                            <th style="width:200px;">hvac</th>
                            <th style="width:200px;">gym</th>
                            <th style="width:200px;">plumbing</th>
                            <th style="width:200px;">fireplace</th>
                            <th style="width:200px;">smartsystems</th>
                            <th style="width:200px;">securitysystems</th>
                            <th style="width:200px;">securelcksdoors</th>
                            <th style="width:200px;">ldscpngYardgdenspce</th>
                            <th style="width:200px;">fireextinguishers</th>
                            <th style="width:200px;">Sstnablebuldngmtrls</th>
                            <th style="width:200px;">solarpanels</th>
                            <th style="width:200px;">soundproof</th>
                            <th style="width:200px;">greenroofswalls</th>
                            <th style="width:200px;">rainwaterharvesting</th>
                            <th style="width:200px;">swmgplhottub</th>
                            <th style="width:200px;">drivewaygarage</th>
                           <th style="width:200px;">SKU</th>
                           <th style="width:200px;">image</th>
                           <th style="width:200px;">images</th>
                           <th style="width:200px;">created_at</th>
                           <th style="width:200px;">updated_at</th>
                       </tr>
                   </thead>
                   <tbody>

                     @foreach($hmproducts as $hmproduct)

                       <tr>
                           <td>{{$hmproduct->id}}</td>
                           <td class="pname">
                               <div class="image">
                                   <img src="{{asset('uploads/hmproducts/thumbnails')}}/{{$hmproduct->image}}" alt="{{$hmproduct->name}}" class="image">
                               </div>
                               <div class="name">
                                   <a href="#" class="body-title-2">{{$hmproduct->name}}</a>
                                   <div class="text-tiny mt-3">{{$hmproduct->slug}}</div>
                               </div>
                           </td>
                           <td>{{$hmproduct->short_description}}</td>
                           <td>{{$hmproduct->description}}</td>
                           <td>{{$hmproduct->bedroom}}</td>
                           <td>{{$hmproduct->bathroom}}</td>
                           <td>{{$hmproduct->username}}</td>
                           <td>{{$hmproduct->mobile}}</td>
                           <td>{{$hmproduct->availability}}</td>
                           <td>{{$hmproduct->address}}</td>
                           <td>{{$hmproduct->squareft}}</td>
                           <td>{{$hmproduct->sale_price}}</td>
                           <td>{{$hmproduct->category->name}}</td>
                           <td>{{$hmproduct->featured == 0 ? "No":"Yes"}}</td>
                           <td>{{$hmproduct->stock_status}}</td>
                           <td>{{$hmproduct->quantity}}</td>
                           <td>{{$hmproduct->dining}}</td>
                           <td>{{$hmproduct->foundation}}</td>
                           <td>{{$hmproduct->windows}}</td>
                           <td>{{$hmproduct->walls}}</td>
                           <td>{{$hmproduct->roof}}</td>

                           <td>{{$hmproduct->storage}}</td>
                           <td>{{$hmproduct->pchblnydeck}}</td>
                           <td>{{$hmproduct->homeofficestudy}}</td>
                           <td>{{$hmproduct->facadedesign}}</td>
                           <td>{{$hmproduct->flooring}}</td>
                           <td>{{$hmproduct->laundryroom}}</td>
                           <td>{{$hmproduct->lighting}}</td>

                           <td>{{$hmproduct->livingrooms}}</td>
                           <td>{{$hmproduct->hvac}}</td>
                           <td>{{$hmproduct->gym}}</td>
                           <td>{{$hmproduct->plumbing}}</td>
                           <td>{{$hmproduct->fireplace}}</td>
                           <td>{{$hmproduct->smartsystems}}</td>
                           <td>{{$hmproduct->securitysystems}}</td>


                           <td>{{$hmproduct->securelcksdoors}}</td>
                           <td>{{$hmproduct->ldscpngYardgdenspce}}</td>
                           <td>{{$hmproduct->fireextinguishers}}</td>
                           <td>{{$hmproduct->Sstnablebuldngmtrls}}</td>
                           <td>{{$hmproduct->solarpanels}}</td>
                           <td>{{$hmproduct->soundproof}}</td>
                           <td>{{$hmproduct->greenroofswalls}}</td>

                           <td>{{$hmproduct->rainwaterharvesting}}</td>
                           <td>{{$hmproduct->swmgplhottub}}</td>
                           <td>{{$hmproduct->drivewaygarage}}</td>
                           <td>{{$hmproduct->SKU}}</td>
                           <td>{{$hmproduct->image}}</td>
                           <td>{{$hmproduct->images}}</td>
                           <td>{{$hmproduct->created_at}}</td>
                           <td>{{$hmproduct->updated_at}}</td>





                           <td>
                               <div class="list-icon-function">
                                   <a href="#" target="_blank">
                                       <div class="item eye">
                                           <i class="icon-eye"></i>
                                       </div>
                                   </a>
                                   <a href="{{route('user.hmproduct.edit',['id'=>$hmproduct->id])}}">
                                       <div class="item edit">
                                           <i class="icon-edit-3"></i>
                                       </div>
                                   </a>
                                   <form action="{{route('user.hmproduct.delete',['id'=>$hmproduct->id])}}" method="POST">
                                     @csrf
                                     @method('DELETE')
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
             {{$hmproducts->links('pagination::bootstrap-5')}}

           </div>
       </div>
   </div>
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
