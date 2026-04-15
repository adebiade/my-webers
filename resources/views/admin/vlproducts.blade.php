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
                                                     <th style="width:200px;">Regular Price</th>
                                                     <th style="width:200px;">Bdrm</th>
                                                     <th style="width:200px;">bthrm</th>
                                                     <th style="width:200px;">Username</th>
                                                     <th style="width:200px;">Mobile</th>
                                                     <th style="width:200px;">Availability</th>
                                                     <th style="width:200px;">independentstructure</th>
                                                     <th style="width:200px;">spaciouslayout</th>
                                                     <th style="width:200px;">highceilings</th>
                                                     <th style="width:200px;">modernclscaesthtics</th>
                                                     <th style="width:200px;">privategardenlawn</th>
                                                     <th style="width:200px;">homeofficestudy</th>
                                                     <th style="width:200px;">Swimmingpool</th>
                                                     <th style="width:200px;">kitchen</th>

                                                     <th style="width:200px;">hvac</th>
                                                     <th style="width:200px;">electrical</th>

                                                     <th style="width:200px;">patiodeck</th>
                                                     <th style="width:200px;">plumbing</th>
                                                     <th style="width:200px;">drvwygrgathtics</th>
                                                     <th style="width:200px;">smartsystems</th>
                                                     <th style="width:200px;">bndrywllsfencing</th>

                                                     <th style="width:200px;">sveillancesystms</th>
                                                     <th style="width:200px;">highspeedinternet</th>
                                                     <th style="width:200px;">gatedentry</th>
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

                                               @foreach($vlproducts as $vlproduct)

                                                 <tr>
                                                     <td>{{$vlproduct->id}}</td>
                                                     <td class="pname">
                                                         <div class="image">
                                                             <img src="{{asset('uploads/vlproducts/thumbnails')}}/{{$vlproduct->image}}" alt="{{$vlproduct->name}}" class="image">
                                                         </div>
                                                         <div class="name">
                                                             <a href="#" class="body-title-2">{{$vlproduct->name}}</a>
                                                             <div class="text-tiny mt-3">{{$vlproduct->slug}}</div>
                                                         </div>
                                                     </td>
                                                     <td>{{$vlproduct->short_description}}</td>
                                                     <td>{{$vlproduct->description}}</td>
                                                     <td>{{$vlproduct->address}}</td>
                                                     <td>{{$vlproduct->squareft}}</td>
                                                     <td>{{$vlproduct->sale_price}}</td>
                                                     <td>{{$vlproduct->regular_price}}</td>
                                                     <td>{{$vlproduct->bedroom}}</td>
                                                     <td>{{$vlproduct->bathroom}}</td>
                                                     <td>{{$vlproduct->username}}</td>
                                                     <td>{{$vlproduct->mobile}}</td>
                                                     <td>{{$vlproduct->availability}}</td>

                                                     <td>{{$vlproduct->independentstructure}}</td>
                                                     <td>{{$vlproduct->spaciouslayout}}</td>
                                                     <td>{{$vlproduct->highceilings}}</td>
                                                     <td>{{$vlproduct->modernclscaesthtics}}</td>
                                                     <td>{{$vlproduct->privategardenlawn}}</td>
                                                     <td>{{$vlproduct->homeofficestudy}}</td>
                                                     <td>{{$vlproduct->Swimmingpool}}</td>
                                                     <td>{{$vlproduct->kitchen}}</td>
                                                     <td>{{$vlproduct->hvac}}</td>
                                                     <td>{{$vlproduct->electrical}}</td>

                                                     <td>{{$vlproduct->patiodeck}}</td>

                                                     <td>{{$vlproduct->plumbing}}</td>
                                                     <td>{{$vlproduct->drvwygrgathtics}}</td>
                                                     <td>{{$vlproduct->smartsystems}}</td>
                                                     <td>{{$vlproduct->bndrywllsfencing}}</td>

                                                     <td>{{$vlproduct->sveillancesystms}}</td>

                                                     <td>{{$vlproduct->highspeedinternet}}</td>
                                                     <td>{{$vlproduct->gatedentry}}</td>

                                                     <td>{{$vlproduct->SKU}}</td>
                                                     <td>{{$vlproduct->stock_status}}</td>
                                                     <td>{{$vlproduct->featured == 0 ? "No":"Yes"}}</td>
                                                     <td>{{$vlproduct->quantity}}</td>
                                                     <td>{{$vlproduct->image}}</td>
                                                     <td>{{$vlproduct->images}}</td>
                                                     <td>{{$vlproduct->category->name}}</td>

                                                     <td>{{$vlproduct->created_at}}</td>
                                                     <td>{{$vlproduct->updated_at}}</td>


                                                     <td>
                                                         <div class="list-icon-function">
                                                             <a href="#" target="_blank">
                                                                 <div class="item eye">
                                                                     <i class="icon-eye"></i>
                                                                 </div>
                                                             </a>
                                                             <a href="{{route('admin.vlproduct.edit',['id'=>$vlproduct->id])}}">

                                                                 <div class="item edit">
                                                                     <i class="icon-edit-3"></i>
                                                                 </div>
                                                             </a>
                                                             <form action="{{route('admin.vlproduct.delete',['id'=>$vlproduct->id])}}" method="POST">
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

                                            {{$vlproducts->links('pagination::bootstrap-5')}}
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
