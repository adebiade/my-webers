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
                                                     <th style="width:200px;">Availability</th>
                                                     <th style="width:200px;">Mobile</th>

                                                     <th style="width:200px;">sqrft</th>
                                                     <th style="width:200px;">Regular Price</th>
                                                     <th style="width:200px;">sPrice</th>
                                                     <th style="width:200px;">Category</th>
                                                     <th style="width:200px;">Featured</th>
                                                     <th style="width:200px;">Stock</th>
                                                     <th style="width:200px;">Quantity</th>


                                                     <th style="width:200px;">foundation</th>
                                                     <th style="width:200px;">frame</th>
                                                     <th style="width:200px;">walls</th>
                                                     <th style="width:200px;">roof</th>
                                                     <th style="width:200px;">windowsdoors</th>
                                                     <th style="width:200px;">balconiesverandas</th>
                                                     <th style="width:200px;">staircaseselevators</th>

                                                     <th style="width:200px;">facadedesign</th>
                                                     <th style="width:200px;">Flooring</th>
                                                     <th style="width:200px;">ceilingdesign</th>
                                                     <th style="width:200px;">lightingfixtures</th>
                                                     <th style="width:200px;">rooms</th>
                                                     <th style="width:200px;">hvacsystems</th>
                                                     <th style="width:200px;">electricalwiring</th>

                                                     <th style="width:200px;">plumbing</th>
                                                     <th style="width:200px;">firesafetysystems</th>
                                                     <th style="width:200px;">smartsystems</th>
                                                     <th style="width:200px;">securitysystems</th>
                                                     <th style="width:200px;">internetnetworkcabling</th>
                                                     <th style="width:200px;">insulation</th>
                                                     <th style="width:200px;">solarpanels</th>

                                                     <th style="width:200px;">rainwaterharvesting</th>
                                                     <th style="width:200px;">greenroofswalls</th>
                                                     <th style="width:200px;">ramps</th>
                                                     <th style="width:200px;">accessiblerestrooms</th>
                                                     <th style="width:200px;">widedoorwayshallways</th>
                                                     <th style="width:200px;">SKU</th>
                                                     <th style="width:200px;">image</th>
                                                     <th style="width:200px;">images</th>
                                                     <th style="width:200px;">created_at</th>
                                                     <th style="width:200px;">updated_at</th>


                                                 </tr>
                                             </thead>
                                             <tbody>

                                               @foreach($bldproducts as $bldproduct)

                                                 <tr>
                                                     <td>{{$bldproduct->id}}</td>
                                                     <td class="pname">
                                                         <div class="image">
                                                             <img src="{{asset('uploads/bldproducts/thumbnails')}}/{{$bldproduct->image}}" alt="{{$bldproduct->name}}" class="image">
                                                         </div>
                                                         <div class="name">
                                                             <a href="#" class="body-title-2">{{$bldproduct->name}}</a>
                                                             <div class="text-tiny mt-3">{{$bldproduct->slug}}</div>
                                                         </div>
                                                     </td>
                                                     <td>{{$bldproduct->short_description}}</td>
                                                     <td>{{$bldproduct->description}}</td>
                                                     <td>{{$bldproduct->address}}</td>
                                                     <td>{{$bldproduct->availability}}</td>
                                                     <td>{{$bldproduct->mobile}}</td>

                                                     <td>{{$bldproduct->squareft}}</td>
                                                     <td>{{$bldproduct->regular_price}}</td>
                                                     <td>{{$bldproduct->sale_price}}</td>
                                                     <td>{{$bldproduct->category->name}}</td>
                                                     <td>{{$bldproduct->featured == 0 ? "No":"Yes"}}</td>
                                                     <td>{{$bldproduct->stock_status}}</td>
                                                     <td>{{$bldproduct->quantity}}</td>
                                                     <td>{{$bldproduct->foundation}}</td>
                                                     <td>{{$bldproduct->frame}}</td>
                                                     <td>{{$bldproduct->walls}}</td>
                                                     <td>{{$bldproduct->roof}}</td>
                                                     <td>{{$bldproduct->windowsdoors}}</td>
                                                     <td>{{$bldproduct->balconiesverandas}}</td>
                                                     <td>{{$bldproduct->staircaseselevators}}</td>
                                                     <td>{{$bldproduct->facadedesign}}</td>
                                                     <td>{{$bldproduct->Flooring}}</td>
                                                     <td>{{$bldproduct->ceilingdesign}}</td>
                                                     <td>{{$bldproduct->lightingfixtures}}</td>
                                                     <td>{{$bldproduct->rooms}}</td>
                                                     <td>{{$bldproduct->hvacsystems}}</td>
                                                     <td>{{$bldproduct->electricalwiring}}</td>
                                                     <td>{{$bldproduct->plumbing}}</td>
                                                     <td>{{$bldproduct->firesafetysystems}}</td>
                                                     <td>{{$bldproduct->smartsystems}}</td>
                                                     <td>{{$bldproduct->securitysystems}}</td>
                                                     <td>{{$bldproduct-> internetnetworkcabling }}</td>
                                                     <td>{{$bldproduct->insulation}}</td>
                                                     <td>{{$bldproduct->solarpanels}}</td>
                                                     <td>{{$bldproduct->rainwaterharvesting}}</td>
                                                     <td>{{$bldproduct->greenroofswalls}}</td>
                                                     <td>{{$bldproduct->ramps}}</td>
                                                     <td>{{$bldproduct->accessiblerestrooms}}</td>
                                                     <td>{{$bldproduct->widedoorwayshallways}}</td>
                                                     <td>{{$bldproduct->SKU}}</td>
                                                     <td>{{$bldproduct->image}}</td>
                                                     <td>{{$bldproduct->images}}</td>
                                                     <td>{{$bldproduct->created_at}}</td>
                                                     <td>{{$bldproduct->updated_at}}</td>

                                                     <td>
                                                         <div class="list-icon-function">
                                                             <a href="#" target="_blank">
                                                                 <div class="item eye">
                                                                     <i class="icon-eye"></i>
                                                                 </div>
                                                             </a>
                                                             <a href="{{route('admin.bldproduct.edit',['id'=>$bldproduct->id])}}">
                                                                 <div class="item edit">
                                                                     <i class="icon-edit-3"></i>
                                                                 </div>
                                                             </a>
                                                             <form action="{{route('admin.bldproduct.delete',['id'=>$bldproduct->id])}}" method="POST">
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

                                            {{$bldproducts->links('pagination::bootstrap-5')}}
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
