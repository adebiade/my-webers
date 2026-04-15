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
                                                     <th style="width:200px;">mobile</th>
                                                     <th style="width:200px;">availability</th>


                                                     <th style="width:200px;">Mtingrooms</th>
                                                     <th style="width:200px;">restrooms</th>
                                                     <th style="width:200px;">rceptnarea</th>
                                                     <th style="width:200px;">privateoffices</th>
                                                     <th style="width:200px;">brkroomcafeteria</th>
                                                     <th style="width:200px;">strgefilesarea</th>

                                                     <th style="width:200px;">cnfrencerooms</th>
                                                     <th style="width:200px;">opnplanareas</th>
                                                     <th style="width:200px;">intntwkinfrtrture</th>
                                                     <th style="width:200px;">securitysyst</th>
                                                     <th style="width:200px;">hvac</th>
                                                     <th style="width:200px;">Egnmcfniture</th>
                                                     <th style="width:200px;">lighting</th>
                                                     <th style="width:200px;">prntcopy</th>
                                                     <th style="width:200px;">SKU</th>
                                                     <th style="width:200px;">Stock</th>
                                                     <th style="width:200px;">Featured</th>
                                                     <th style="width:200px;">Quantity</th>
                                                     <th style="width:200px;">image</th>
                                                     <th style="width:200px;">images</th>
                                                     <th style="width:200px;">Category</th>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                               @foreach($offproducts as $offproduct)

                                                 <tr>
                                                     <td>{{$offproduct->id}}</td>
                                                     <td class="pname">
                                                         <div class="image">
                                                             <img src="{{asset('uploads/offproducts/thumbnails')}}/{{$offproduct->image}}" alt="{{$offproduct->name}}" class="image">
                                                         </div>
                                                         <div class="name">
                                                             <a href="#" class="body-title-2">{{$offproduct->name}}</a>
                                                             <div class="text-tiny mt-3">{{$offproduct->slug}}</div>
                                                         </div>
                                                     </td>
                                                     <td>{{$offproduct->short_description}}</td>
                                                     <td>{{$offproduct->description}}</td>
                                                     <td>{{$offproduct->address}}</td>
                                                     <td>{{$offproduct->squareft}}</td>
                                                     <td>{{$offproduct->sale_price}}</td>
                                                     <td>{{$offproduct->regular_price}}</td>
                                                     <td>{{$offproduct->username}}</td>
                                                     <td>{{$offproduct->mobile}}</td>
                                                     <td>{{$offproduct->availability}}</td>

                                                     <td>{{$offproduct->Mtingrooms}}</td>
                                                     <td>{{$offproduct->restrooms}}</td>
                                                     <td>{{$offproduct->rceptnarea}}</td>
                                                     <td>{{$offproduct->privateoffices}}</td>

                                                     <td>{{$offproduct->brkroomcafeteria}}</td>
                                                     <td>{{$offproduct->strgefilesarea}}</td>
                                                     <td>{{$offproduct->cnfrencerooms}}</td>
                                                     <td>{{$offproduct->opnplanareas}}</td>

                                                     <td>{{$offproduct->intntwkinfrtrture}}</td>
                                                     <td>{{$offproduct->securitysyst}}</td>
                                                     <td>{{$offproduct->hvac}}</td>
                                                     <td>{{$offproduct->Egnmcfniture}}</td>
                                                     <td>{{$offproduct->lighting}}</td>
                                                     <td>{{$offproduct->prntcopy}}</td>



                                                     <td>{{$offproduct->SKU}}</td>
                                                     <td>{{$offproduct->stock_status}}</td>
                                                     <td>{{$offproduct->featured == 0 ? "No":"Yes"}}</td>
                                                     <td>{{$offproduct->quantity}}</td>
                                                     <td>{{$offproduct->image}}</td>
                                                     <td>{{$offproduct->images}}</td>
                                                     <td>{{$offproduct->category->name}}</td>

                                                     <td>
                                                         <div class="list-icon-function">
                                                             <a href="#" target="_blank">
                                                                 <div class="item eye">
                                                                     <i class="icon-eye"></i>
                                                                 </div>
                                                             </a>
                                                             <a href="{{route('admin.offproduct.edit',['id'=>$offproduct->id])}}">
                                                                 <div class="item edit">
                                                                     <i class="icon-edit-3"></i>
                                                                 </div>
                                                             </a>
                                                             <form action="{{route('admin.offproduct.delete',['id'=>$offproduct->id])}}" method="POST">
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

                                            {{$offproducts->links('pagination::bootstrap-5')}}
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
