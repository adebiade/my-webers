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
                        <th  style="width:200px;">dscrptn</th>
                        <th style="width:200px;">Address</th>
                        <th style="width:200px;">sqrft</th>
                        <th style="width:200px;">sPrice</th>
                        <th style="width:200px;">Regular Price</th>
                        <th style="width:200px;">Username</th>
                        <th style="width:200px;">mobile</th>
                        <th style="width:200px;">availability</th>

                        <th style="width:200px;">mltilvllayout</th>
                        <th  style="width:200px;">privateentrance</th>
                        <th style="width:200px;">garagecarport</th>
                        <th style="width:200px;">outdoorspace</th>
                        <th style="width:200px;">livingarea</th>

                        <th style="width:200px;">bedbathrooms</th>
                        <th  style="width:200px;">kitchen</th>
                        <th style="width:200px;">restrooms</th>
                        <th style="width:200px;">laundryarea</th>
                        <th style="width:200px;">hvac</th>

                        <th style="width:200px;">storagespace</th>
                        <th  style="width:200px;">hoa</th>
                        <th style="width:200px;">comnityamenities</th>
                        <th style="width:200px;">energyefficy</th>
                        <th style="width:200px;">scrtyftrs</th>



                        <th style="width:200px;">SKU</th>
                        <th style="width:200px;">Stock</th>
                        <th style="width:200px;">Featured</th>
                        <th style="width:200px;">Quantity</th>
                        <th style="width:200px;">Image</th>
                        <th style="width:200px;">Images</th>
                        <th style="width:200px;">Category</th>
                        <th style="width:200px;">Created_at</th>
                        <th style="width:200px;">Updated_at</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                   @foreach($twnproducts as $twnproduct)

                     <tr>
                         <td>{{$twnproduct->id}}</td>
                         <td class="pname">
                             <div class="image">
                                 <img src="{{asset('uploads/twnproducts/thumbnails')}}/{{$twnproduct->image}}" alt="{{$twnproduct->name}}" class="image">
                             </div>
                             <div class="name">
                                 <a href="#" class="body-title-2">{{$twnproduct->name}}</a>
                                 <div class="text-tiny mt-3">{{$twnproduct->slug}}</div>
                             </div>
                         </td>
                         <td>{{$twnproduct->short_description}}</td>
                         <td>{{$twnproduct->description}}</td>
                         <td>{{$twnproduct->address}}</td>
                         <td>{{$twnproduct->squareft}}</td>
                         <td>{{$twnproduct->sale_price}}</td>
                         <td>{{$twnproduct->regular_price}}</td>
                         <td>{{$twnproduct->username}}</td>
                         <td>{{$twnproduct->mobile}}</td>
                         <td>{{$twnproduct->availability}}</td>
                         <td>{{$twnproduct->mltilvllayout}}</td>
                         <td>{{$twnproduct->privateentrance}}</td>
                         <td>{{$twnproduct->garagecarport}}</td>
                         <td>{{$twnproduct->outdoorspace}}</td>
                         <td>{{$twnproduct->livingarea}}</td>
                         <td>{{$twnproduct->bedbathrooms}}</td>
                         <td>{{$twnproduct->kitchen}}</td>
                         <td>{{$twnproduct->restrooms}}</td>
                         <td>{{$twnproduct->laundryarea}}</td>
                         <td>{{$twnproduct->hvac}}</td>
                         <td>{{$twnproduct->storagespace}}</td>
                         <td>{{$twnproduct->hoa}}</td>
                         <td>{{$twnproduct->comnityamenities}}</td>
                         <td>{{$twnproduct->energyefficy}}</td>
                         <td>{{$twnproduct->scrtyftrs}}</td>
                         <td>{{$twnproduct->SKU}}</td>
                         <td>{{$twnproduct->stock_status}}</td>
                         <td>{{$twnproduct->featured == 0 ? "No":"Yes"}}</td>
                         <td>{{$twnproduct->quantity}}</td>
                         <td>{{$twnproduct->image}}</td>
                         <td>{{$twnproduct->images}}</td>
                         <td>{{$twnproduct->category->name}}</td>
                         <td>{{$twnproduct->created_at}}</td>
                         <td>{{$twnproduct->Updated_at}}</td>
                         <td>
                              <div class="list-icon-function">
                                  <a href="#" target="_blank">
                                      <div class="item eye">
                                          <i class="icon-eye"></i>
                                      </div>
                                  </a>
                                  <a href="{{route('admin.twnproduct.edit',['id'=>$twnproduct->id])}}">
                                      <div class="item edit">
                                          <i class="icon-edit-3"></i>
                                      </div>
                                  </a>
                                  <form action="{{route('admin.twnproduct.delete',['id'=>$twnproduct->id])}}" method="POST">
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

                                            {{$twnproducts->links('pagination::bootstrap-5')}}
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
