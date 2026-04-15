@extends('layouts.admin')
 @section('content')
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
                                         <table class="table table-striped table-bordered">
                                             <thead>
                                                 <tr>
                                                     <th style="width:200px;">#</th>
                                                     <th style="width:200px;">Name</th>
                                                     <th style="width:200px;">sdscrptn</th>
                                                     <th style="width:200px;">dscrptn</th>
                                                     <th style="width:200px;">Address</th>
                                                     <th style="width:200px;">sqrft</th>
                                                     <th style="width:200px;">sPrice</th>
                                                     <th style="width:200px;">RegPrice</th>
                                                     <th style="width:200px;">Username</th>
                                                     <th style="width:200px;">Mobile</th>
                                                     <th style="width:200px;">Availability</th>


                                                     <th style="width:200px;">displayarea</th>
                                                     <th style="width:200px;">strgestckroom</th>
                                                     <th style="width:200px;">etrncestorefront</th>
                                                     <th style="width:200px;">signage</th>
                                                     <th style="width:200px;">lighting</th>
                                                     <th style="width:200px;">securitysystems</th>
                                                     <th style="width:200px;">changingrooms</th>
                                                     <th style="width:200px;">restroomfclits</th>
                                                     <th style="width:200px;">staffarea</th>
                                                     <th style="width:200px;">hvac</th>
                                                     <th style="width:200px;">accbilityftrs</th>
                                                     <th style="width:200px;">cstmersvicedesk</th>
                                                     <th style="width:200px;">cstmersvicedesk</th>
                                                     <th style="width:200px;">mchadisingfxtrs</th>
                                                     <th style="width:200px;">musicpasystem</th>

                                                     <th style="width:200px;">SKU</th>
                                                     <th style="width:200px;">Stock</th>
                                                     <th style="width:200px;">Featured</th>
                                                     <th style="width:200px;">Quantity</th>
                                                     <th style="width:200px;">image</th>
                                                     <th style="width:200px;">images</th>
                                                    <th style="width:200px;">Category</th>
                                                    <th style="width:200px;">created_at</th>
                                                    <th style="width:200px;">updated_at</th>


                                                 </tr>
                                             </thead>
                                             <tbody>

                                               @foreach($shproducts as $shproduct)

                                                 <tr>
                                                     <td>{{$shproduct->id}}</td>
                                                     <td class="pname">
                                                         <div class="image">
                                                             <img src="{{asset('uploads/shproducts/thumbnails')}}/{{$shproduct->image}}" alt="{{$shproduct->name}}" class="image">
                                                         </div>
                                                         <div class="name">
                                                             <a href="#" class="body-title-2">{{$shproduct->name}}</a>
                                                             <div class="text-tiny mt-3">{{$shproduct->slug}}</div>
                                                         </div>
                                                     </td>
                                                     <td>{{$shproduct->short_description}}</td>
                                                     <td>{{$shproduct->description}}</td>
                                                     <td>{{$shproduct->address}}</td>
                                                     <td>{{$shproduct->squareft}}</td>
                                                     <td>{{$shproduct->sale_price}}</td>
                                                     <td>{{$shproduct->regular_price}}</td>
                                                     <td>{{$shproduct->username}}</td>
                                                     <td>{{$shproduct->mobile}}</td>
                                                     <td>{{$shproduct->availability}}</td>

                                                     <td>{{$shproduct->displayarea}}</td>
                                                     <td>{{$shproduct->strgestckroom}}</td>
                                                     <td>{{$shproduct->etrncestorefront}}</td>
                                                     <td>{{$shproduct->signage}}</td>
                                                     <td>{{$shproduct->lighting}}</td>
                                                     <td>{{$shproduct->securitysys}}</td>
                                                     <td>{{$shproduct->changingrooms}}</td>
                                                     <td>{{$shproduct->restroomfclits}}</td>
                                                     <td>{{$shproduct->staffarea}}</td>
                                                     <td>{{$shproduct->hvac}}</td>
                                                     <td>{{$shproduct->accbilityftrs}}</td>
                                                     <td>{{$shproduct->cstmersvicedesk}}</td>
                                                     <td>{{$shproduct->mchadisingfxtrs}}</td>
                                                     <td>{{$shproduct->musicpasystem}}</td>
                                                     <td>{{$shproduct->SKU}}</td>
                                                     <td>{{$shproduct->stock_status}}</td>
                                                     <td>{{$shproduct->featured == 0 ? "No":"Yes"}}</td>
                                                     <td>{{$shproduct->quantity}}</td>
                                                     <td>{{$shproduct->image}}</td>
                                                     <td>{{$shproduct->images}}</td>
                                                     <td>{{$shproduct->category->name}}</td>
                                                     <td>{{$shproduct->created_at}}</td>
                                                     <td>{{$shproduct->updated_at}}</td>


                                                     <td>
                                                         <div class="list-icon-function">
                                                             <a href="#" target="_blank">
                                                                 <div class="item eye">
                                                                     <i class="icon-eye"></i>
                                                                 </div>
                                                             </a>
                                                             <a href="{{route('admin.shproduct.edit',['id'=>$shproduct->id])}}">
                                                                 <div class="item edit">
                                                                     <i class="icon-edit-3"></i>
                                                                 </div>
                                                             </a>
                                                             <form action="{{route('admin.shproduct.delete',['id'=>$shproduct->id])}}" method="POST">
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

                                            {{$shproducts->links('pagination::bootstrap-5')}}
                                     </div>
                                 </div>
                             </div>
                         </div>

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
