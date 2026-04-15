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
                                       @if(Session::has('status'))
                                            <p class="alert alert-success">{{ Session::get('status') }}</p>
                                            @endif
                                         <table class="table table-striped table-bordered">
                                             <thead>
                                                 <tr>
                                                     <th style="width:200px;">#</th>
                                                     <th style="width:200px;">Name</th>
                                                     <th style="width:200px;">Sdscrptn</th>
                                                     <th style="width:200px;">Dscrptn</th>
                                                     <th style="width:200px;">Address</th>
                                                     <th style="width:200px;">Regular Price</th>
                                                     <th style="width:200px;">Sqrft</th>
                                                     <th style="width:200px;">sPrice</th>
                                                     <th style="width:200px;">Bdrm</th>
                                                     <th style="width:200px;">Bthrm</th>
                                                     <th style="width:200px;">SKU</th>
                                                     <th style="width:200px;">Stock Status</th>
                                                     <th style="width:200px;">Availability</th>
                                                     <th style="width:200px;">mobile</th>

                                                     <th style="width:200px;">Featured</th>
                                                     <th style="width:200px;">Quantity</th>
                                                     <th style="width:200px;">image</th>
                                                     <th style="width:200px;">images</th>
                                                     <th style="width:200px;">category_id</th>
                                                     <th style="width:200px;">created_at</th>
                                                     <th style="width:200px;">updated_at</th>
                                                     <th style="width:200px;">kitchen</th>
                                                     <th style="width:200px;">livingroom</th>
                                                     <th style="width:200px;">utilityarea</th>
                                                     <th style="width:200px;">flooringfinish</th>
                                                     <th style="width:200px;">individualunit</th>
                                                     <th style="width:200px;">familyunit</th>
                                                     <th style="width:200px;">sharedwallfloor</th>
                                                     <th style="width:200px;">balconieorterrace</th>
                                                     <th style="width:200px;">entrancescorridors</th>
                                                     <th style="width:200px;">electricitylighting</th>
                                                     <th style="width:200px;">plumbing</th>
                                                     <th style="width:200px;">hvacACUnits</th>
                                                     <th style="width:200px;">internetcableready</th>
                                                     <th style="width:200px;">petfriendlyspaces</th>
                                                     <th style="width:200px;">locksintercom</th>
                                                     <th style="width:200px;">rooftopgardenterrace</th>
                                                     <th style="width:200px;">parking</th>
                                                     <th style="width:200px;">securitysystem</th>
                                                     <th style="width:200px;">powerbackup</th>
                                                     <th style="width:200px;">wastedisposalsystem</th>
                                                     <th style="width:200px;">gymorfitnesscenter</th>
                                                     <th style="width:200px;">swimmingpool</th>
                                                     <th style="width:200px;">clubhouseorlounge</th>
                                                     <th style="width:200px;">childrenplayarea</th>
                                                     <th style="width:200px;">Coworkingspaces</th>



                                                 </tr>
                                             </thead>
                                             <tbody>

                                               @foreach($arpproducts as $arproduct)

                                                 <tr>
                                                     <td>{{ $arproduct->id }}</td>
                                                     <td class="pname">
                                                         <div class="image">
                                                             <img src="{{asset('uploads/arpproducts/thumbnails')}}/{{$arproduct->image}}" alt="{{$arproduct->name}}" class="image">
                                                         </div>
                                                         <div class="name">
                                                             <a href="#" class="body-title-2">{{$arproduct->name}}</a>
                                                             <div class="text-tiny mt-3">{{$arproduct->slug}}</div>
                                                         </div>
                                                     </td>
                                                     <td>{{$arproduct->short_description}}</td>
                                                     <td>{{$arproduct->description}}</td>
                                                     <td>{{$arproduct->address}}</td>
                                                     <td>{{$arproduct->regular_price}}</td>
                                                     <td>{{$arproduct->squareft}}</td>
                                                     <td>{{$arproduct->sale_price}}</td>
                                                     <td>{{$arproduct->bedroom}}</td>
                                                     <td>{{$arproduct->bathroom}}</td>
                                                     <td>{{$arproduct->SKU}}</td>
                                                     <td>{{$arproduct->stock_status}}</td>
                                                     <td>{{$arproduct->availability}}</td>
                                                     <td>{{$arproduct->mobile}}</td>

                                                     <td>{{$arproduct->featured == 0 ? "No":"Yes"}}</td>
                                                     <td>{{$arproduct->quantity}}</td>
                                                     <td>{{$arproduct->image}}</td>
                                                     <td>{{$arproduct->images}}</td>
                                                     <td>{{$arproduct->category->name}}</td>
                                                     <td>{{$arproduct->created_at}}</td>
                                                     <td>{{$arproduct->updated_at}}</td>

                                                     <td>{{$arproduct->kitchen}}</td>
                                                     <td>{{$arproduct->livingroom}}</td>
                                                     <td>{{$arproduct->utilityarea}}</td>
                                                     <td>{{$arproduct->flooringfinish}}</td>
                                                     <td>{{$arproduct->individualunit}}</td>
                                                     <td>{{$arproduct->familyunit}}</td>

                                                     <td>{{$arproduct->sharedwallfloor}}</td>
                                                     <td>{{$arproduct->balconieorterrace}}</td>
                                                     <td>{{$arproduct->entrancescorridors}}</td>
                                                     <td>{{$arproduct->electricitylighting}}</td>
                                                     <td>{{$arproduct->plumbing}}</td>
                                                     <td>{{$arproduct->hvacACUnits}}</td>

                                                     <td>{{$arproduct->internetcableready}}</td>
                                                     <td>{{$arproduct->petfriendlyspaces}}</td>
                                                     <td>{{$arproduct->locksintercom}}</td>
                                                     <td>{{$arproduct->rooftopgardenterrace}}</td>
                                                     <td>{{$arproduct->parking}}</td>
                                                     <td>{{$arproduct->securitysystem}}</td>

                                                     <td>{{$arproduct->powerbackup}}</td>
                                                     <td>{{$arproduct->wastedisposalsystem}}</td>
                                                     <td>{{$arproduct->gymorfitnesscenter}}</td>
                                                     <td>{{$arproduct->swimmingpool}}</td>
                                                     <td>{{$arproduct->clubhouseorlounge}}</td>
                                                     <td>{{$arproduct->childrenplayarea}}</td>
                                                     <td>{{$arproduct->Coworkingspaces}}</td>




                                                     <td>
                                                         <div class="list-icon-function">
                                                             <a href="#" target="_blank">
                                                                 <div class="item eye">
                                                                     <i class="icon-eye"></i>
                                                                 </div>
                                                             </a>
                                                             <a href="{{route('admin.arproduct.edit',['id'=>$arproduct->id])}}">
                                                                 <div class="item edit">
                                                                     <i class="icon-edit-3"></i>
                                                                 </div>
                                                             </a>
                                                             <form action="{{route('admin.arproduct.delete',['id'=>$arproduct->id])}}" method="POST">
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

                                            {{$arpproducts->links('pagination::bootstrap-5')}}
                                     </div>
                                 </div>
                             </div>
                         </div>

@endsection


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/mains.js')}}"></script>

    @push('scripts')
    <script>
    $(function(){
      $('#pay-now').on('click',function(e){
        e.preventDefault();

    let timeElapsed = 0;
    const timeLimit = 2;
    const redirectURL = "{{route('user.arpProduct')}}";
    const redirectTimer = setInterval(() => {
      timeElapsed += 1;
      if (timeElapsed === timeLimit) {
        popup.cancelTransaction(transaction.id);
        window.location.href = redirectURL;

      }
    }, 1000);

    const popup = new Paystack();
    const transaction = popup.newTransaction({
    key: 'pk_domain_xxxxx', // Replace with your public key
    //email: "demo@example.com",
    user_email: document.getElementById("user_email").value,
    basic: document.getElementById("basic").value*100,
    silver: document.getElementById("silver").value*100,
    premium: document.getElementById("premium").value*100,
    //amount: 10000,
    username: document.getElementById("username").value,

    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    ref:'P'+Math.floor((Math.random() * 1000000000) + 1),
    onClose function() {
           window.location = "{{route('user.arpProduct')}}?transaction=cancel";
           //window.location = "http://localhost/paymentsystem/index.php?transaction=cancel";

          alert('Transaction cancelled.');
         },

    callback: Function(response){
    let message = 'Payment complete! Reference: ' + response.reference;
    alert(message);
    window.location"{{route('user.apayment.store')}}?reference=" + response.reference;

    //window.location"https://www.passover.com/verify_transaction.php?reference=" +response.reference;

    },

    onLoad: (transaction) => {
      popup.openIframe();
      window.clearInterval(redirectTimer);
      }

    });

    });
    });

    </script>
<script>
     $(document).ready(function() {
     $('#myRadio1').data('isChecked', false); // Initialize a data attribute to track state
     $('#myRadio2').data('isChecked', false); // Initialize a data attribute to track state
     $('#myRadio3').data('isChecked', false);

     $('#myRadio1').on('click', function() {
       var status = $(this).data('isChecked'); // Get current state
       if (status) {
         $(this).prop("checked", false); // Uncheck if currently checked
       } else {
         $(this).prop("checked", true); // Check if currently unchecked
       }
       $(this).data('isChecked', !status); // Toggle the state
     });

     $('#myRadio2').on('click', function() {
       var status = $(this).data('isChecked'); // Get current state
       if (status) {
         $(this).prop("checked", false); // Uncheck if currently checked
       } else {
         $(this).prop("checked", true); // Check if currently unchecked
       }
       $(this).data('isChecked', !status); // Toggle the state
     });

     $('#myRadio3').on('click', function() {
       var status = $(this).data('isChecked'); // Get current state
       if (status) {
         $(this).prop("checked", false); // Uncheck if currently checked
       } else {
         $(this).prop("checked", true); // Check if currently unchecked
       }
       $(this).data('isChecked', !status); // Toggle the state
     });

   });
</script>



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
