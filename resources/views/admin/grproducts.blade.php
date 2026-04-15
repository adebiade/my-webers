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
           <th style="width:200px;">RegularPrice</th>
           <th style="width:200px;">username</th>
           <th style="width:200px;">mobile</th>
           <th style="width:200px;">availability</th>


           <th style="width:200px;">vehiclestoragespace</th>
           <th style="width:200px;">garagedoor</th>
           <th style="width:200px;">drivewayaccess</th>
           <th style="width:200px;">Wkbenchtool</th>
           <th style="width:200px;">shelvingcabinets</th>
           <th style="width:200px;">lghtngelctrcloutlets</th>
           <th style="width:200px;">concreteflooring</th>
           <th style="width:200px;">securityfeatures</th>
           <th style="width:200px;">insulation</th>
           <th style="width:200px;">pedestriandoor</th>
           <th style="width:200px;">waterdrainage</th>
           <th style="width:200px;">overheadstorage</th>
           <th style="width:200px;">automateddoor</th>
           <th style="width:200px;">firesafety</th>


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

            @foreach($grgproducts as $grproduct)

            <tr>
           <td>{{$grproduct->id}}</td>
           <td class="pname">
               <div class="image">
                   <img src="{{asset('uploads/grproducts/thumbnails')}}/{{$grproduct->image}}" alt="{{$grproduct->name}}" class="image">
               </div>
               <div class="name">
                   <a href="#" class="body-title-2">{{$grproduct->name}}</a>
                   <div class="text-tiny mt-3">{{$grproduct->slug}}</div>
               </div>
           </td>
           <td>{{$grproduct->short_description}}</td>
           <td>{{$grproduct->description}}</td>
           <td>{{$grproduct->address}}</td>
           <td>{{$grproduct->squareft}}</td>
           <td>{{$grproduct->sale_price}}</td>
           <td>{{$grproduct->regular_price}}</td>
           <td>{{$grproduct->username}}</td>
           <td>{{$grproduct->mobile}}</td>
           <td>{{$grproduct->availability}}</td>

           <td>{{$grproduct->vehiclestoragespace}}</td>
           <td>{{$grproduct->garagedoor}}</td>
           <td>{{$grproduct->drivewayaccess}}</td>
           <td>{{$grproduct->Wkbenchtool}}</td>
           <td>{{$grproduct->shelvingcabinets}}</td>
           <td>{{$grproduct->lghtngelctrcloutlets}}</td>
           <td>{{$grproduct->concreteflooring}}</td>
           <td>{{$grproduct->securityfeatures}}</td>
           <td>{{$grproduct->insulation}}</td>
           <td>{{$grproduct->pedestriandoor}}</td>
           <td>{{$grproduct->waterdrainage}}</td>
           <td>{{$grproduct->overheadstorage}}</td>
           <td>{{$grproduct->automateddoor}}</td>
           <td>{{$grproduct->firesafety}}</td>
           <td>{{$grproduct->SKU}}</td>
           <td>{{$grproduct->stock_status}}</td>
           <td>{{$grproduct->featured == 0 ? "No":"Yes"}}</td>
           <td>{{$grproduct->quantity}}</td>
           <td>{{$grproduct->image}}</td>
           <td>{{$grproduct->images}}</td>
           <td>{{$grproduct->category->name}}</td>

           <td>
               <div class="list-icon-function">
                   <a href="#" target="_blank">
                       <div class="item eye">
                           <i class="icon-eye"></i>
                       </div>
                   </a>
                   <a href="{{route('admin.grgproduct.edit',['id'=>$grproduct->id])}}">
                       <div class="item edit">
                           <i class="icon-edit-3"></i>
                       </div>
                   </a>
                   <form action="{{route('admin.grgproduct.delete',['id'=>$grproduct->id])}}" method="POST">
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

            {{$grgproducts->links('pagination::bootstrap-5')}}
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
