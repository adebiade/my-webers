<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthAdmin;



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/inquiry',[InquiryController::class,'inquiry'])->name('inquiry.index');
Route::get('/inquiryOne',[InquiryController::class,'inquiryOne'])->name('inquiryOne.index');
Route::get('/inquiryAboutUs',[InquiryController::class,'inquiryAboutUs'])->name('inquiryAboutUs.index');

Route::get('/inquiryTwo',[InquiryController::class,'inquiryTwo'])->name('inquiryTwo.index');
Route::get('/inquiryThree',[InquiryController::class,'inquiryThree'])->name('inquiryThree.index');
Route::get('/inquiryFour',[InquiryController::class,'inquiryFour'])->name('inquiryFour.index');
Route::get('/inquiryFive',[InquiryController::class,'inquiryFive'])->name('inquiryFive.index');
Route::get('/inquirySix',[InquiryController::class,'inquirySix'])->name('inquirySix.index');
Route::get('/inquirySeven',[InquiryController::class,'inquirySeven'])->name('inquirySeven.index');






Route::get('/inquiry/{aproduct_slug}',[InquiryController::class,'aproduct_details'])->name('inquiry.aproduct.details');
Route::get('/inquiryOne/{bldproduct_slug}',[InquiryController::class,'bldproduct_detailsB'])->name('inquiryOne.bldproduct.detailsB');
Route::get('/inquiryTwo/{vlproduct_slug}',[InquiryController::class,'vlproduct_detailsV'])->name('inquiryTwo.vlproduct.detailsV');

Route::get('/inquiryAboutUs/{vlproduct_slug}',[InquiryController::class,'vlproduct_detailsVab'])->name('inquiryAboutUs.vlproduct.detailsV');

Route::get('/inquiryThree/{hmproduct_slug}',[InquiryController::class,'hmproduct_detailsH'])->name('inquiryThree.hmproduct.detailsH');
Route::get('/inquiryFour/{offproduct_slug}',[InquiryController::class,'offproduct_detailsOff'])->name('inquiryFour.offproduct.detailsOff');
Route::get('/inquiryFive/{shproduct_slug}',[InquiryController::class,'shproduct_detailsS'])->name('inquiryFive.shproduct.detailsS');
Route::get('/inquirySix/{twnproduct_slug}',[InquiryController::class,'twnproduct_detailsT'])->name('inquirySix.twnproduct.detailsT');
Route::get('/inquirySeven/{grproduct_slug}',[InquiryController::class,'grproduct_detailsG'])->name('inquirySeven.grproduct.detailsG');





Route::get('/',[InquiryController::class,'aproduct_index'])->name('home.index');
//Route::get('/',[InquiryController::class,'bldproduct_index'])->name('home.index');


Route::middleware(['auth'])->group(function(){
      Route::get('/account-dashboard',[UserController::class, 'index'])->name('user.index');
      Route::get('/appartmentPage',[UserController::class, 'apPage'])->name('user.appartmentPage');

      Route::get('/addProperty',[UserController::class,'add_Property'])->name('user.property.add');
      Route::post('/arproduct/store',[UserController::Class,'arproduct_store'])->name('user.arproduct.store');


      Route::get('/arproduct/add',[UserController::class,'arproduct_add'])->name('user.arproduct.add');
      //Route::get('/arpproducts',[UserController::class, 'arpProduct'])->name('user.arpProduct');
      Route::get('/arpproducts',[UserController::class, 'arpProduct'])->name('user.arpProduct');
      Route::get('/arproduct/{id}/edit',[UserController::class,'arproduct_edit'])->name('user.arproduct.edit');
      Route::put('/arproduct/update',[UserController::class,'arproduct_update'])->name('user.arproduct.update');
      Route::delete('/arproduct/{id}/delete',[UserController::class,'arproduct_delete'])->name('user.arproduct.delete');


      Route::post('/payment/details',[UserController::Class,'payment_details'])->name('user.payment.details');

      Route::post('/pay', [UserController::class, 'initialize'])->name('user.initialize');
      Route::get('/callback', [UserController::class, 'callback'])->name('user.callback');







      Route::get('/bldproduct/add',[UserController::class,'bldproduct_add'])->name('user.bldproduct.add');
      Route::get('/bldproducts',[UserController::class, 'bldProduct'])->name('user.bldProduct');
      Route::post('/bldproduct/store',[UserController::Class,'bldproduct_store'])->name('user.bldproduct.store');
      Route::get('/bldproduct/{id}/edit',[UserController::class,'bldproduct_edit'])->name('user.bldproduct.edit');
      Route::put('/bldproduct/update',[UserController::class,'bldproduct_update'])->name('user.bldproduct.update');
      Route::delete('/bldproduct/{id}/delete',[UserController::class,'bldproduct_delete'])->name('user.bldproduct.delete');


      Route::get('/vllproduct/add',[UserController::class,'vllproduct_add'])->name('user.vllproduct.add');
      Route::get('/vlproducts',[UserController::class, 'vlProduct'])->name('user.vlProduct');
      //Route::get('/admin/vllproduct/add',[AdminController::class,'vllproduct_add'])->name('admin.vlldproduct.add');
      Route::post('/vlproduct/store',[UserController::Class,'vlproduct_store'])->name('user.vlproduct.store');
      Route::get('/vlproduct/{id}/edit',[UserController::class,'vlproduct_edit'])->name('user.vlproduct.edit');
      Route::put('/vlproduct/update',[UserController::class,'vlproduct_update'])->name('user.vlproduct.update');
      Route::delete('/vlproduct/{id}/delete',[UserController::class,'vlproduct_delete'])->name('user.vlproduct.delete');





      Route::get('/hmproduct/add',[UserController::class,'hmproduct_add'])->name('user.hmproduct.add');
      Route::get('/hmproducts',[UserController::class, 'hmProduct'])->name('user.hmProduct');
      Route::post('/hmproduct/store',[UserController::Class,'hmproduct_store'])->name('user.hmproduct.store');
      Route::get('/hmproduct/{id}/edit',[UserController::class,'hmproduct_edit'])->name('user.hmproduct.edit');
      Route::put('/hmproduct/update',[UserController::class,'hmproduct_update'])->name('user.hmproduct.update');
      Route::delete('/hmproduct/{id}/delete',[UserController::class,'hmproduct_delete'])->name('user.hmproduct.delete');


      Route::get('/shproducts',[UserController::class, 'shProduct'])->name('user.shProduct');
      Route::get('/shproduct/add',[UserController::class,'shproduct_add'])->name('user.shproduct.add');
      Route::post('/shproduct/store',[UserController::Class,'shproduct_store'])->name('user.shproduct.store');
      Route::get('/shproduct/{id}/edit',[UserController::class,'shproduct_edit'])->name('user.shproduct.edit');
      Route::put('/shproduct/update',[UserController::class,'shproduct_update'])->name('user.shproduct.update');
      Route::delete('/shproduct/{id}/delete',[UserController::class,'shproduct_delete'])->name('user.shproduct.delete');



      Route::get('/twnproducts',[UserController::class, 'twnProduct'])->name('user.twnProduct');
      Route::get('/twnproduct/add',[UserController::class,'twnproduct_add'])->name('user.twnproduct.add');
      Route::post('/twnproduct/store',[UserController::Class,'twnproduct_store'])->name('user.twnproduct.store');
      Route::get('/twnproduct/{id}/edit',[UserController::class,'twnproduct_edit'])->name('user.twnproduct.edit');
      Route::put('/twnproduct/update',[UserController::class,'twnproduct_update'])->name('user.twnproduct.update');
      Route::delete('/twnproduct/{id}/delete',[UserController::class,'twnproduct_delete'])->name('user.twnproduct.delete');


      Route::get('/offproducts',[UserController::class, 'offProduct'])->name('user.offProduct');
      Route::get('/offproduct/add',[UserController::class,'offproduct_add'])->name('user.offproduct.add');
      Route::post('/offproduct/store',[UserController::Class,'offproduct_store'])->name('user.offproduct.store');
      Route::get('/offproduct/{id}/edit',[UserController::class,'offproduct_edit'])->name('user.offproduct.edit');
      Route::put('/offproduct/update',[UserController::class,'offproduct_update'])->name('user.offproduct.update');
      Route::delete('/offproduct/{id}/delete',[UserController::class,'offproduct_delete'])->name('user.offproduct.delete');



      Route::get('/grgproduct/add',[UserController::class,'grgproduct_add'])->name('user.grgproduct.add');
      Route::get('/grproducts',[UserController::class, 'grProduct'])->name('user.grProduct');
    //  Route::get('/admin/grgproduct/add',[AdminController::class,'grgproduct_add'])->name('admin.grgproduct.add');
      Route::post('/grproduct/store',[UserController::Class,'grproduct_store'])->name('user.grgproduct.store');
      Route::get('/grproduct/{id}/edit',[userController::class,'grproduct_edit'])->name('user.grgproduct.edit');
      Route::put('/grproduct/update',[userController::class,'grproduct_update'])->name('user.grgproduct.update');
      Route::delete('/grproduct/{id}/delete',[userController::class,'grproduct_delete'])->name('user.grgproduct.delete');


      Route::get('/agent/form/add',[UserController::class,'agentform_add'])->name('user.agentform.add');
      Route::post('user/agentform/store',[UserController::class,'agentform_store'])->name('user.agentform.store');
      Route::get('/agent/form',[UserController::class, 'agentforms'])->name('user.agentforms');
      Route::get('/agent/form/{id}/edit',[UserController::class,'agentform_edit'])->name('user.agentform.edit');
      Route::put('/agent/form/update',[UserController::class,'agentform_update'])->name('user.agentform.update');





});


Route::middleware(['auth', AuthAdmin::class])->group(function(){
      Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
      Route::get('/agentform',[AdminController::class, 'agentform'])->name('admin.agentform');
      Route::get('/agentform/add',[AdminController::class,'agentform_add'])->name('admin.agentform.add');
      Route::get('/admin/agentform/{id}/edit',[AdminController::class,'agentform_edit'])->name('admin.agentform.edit');
      Route::put('/admin/agentform/update',[AdminController::class,'agentform_update'])->name('admin.agentform.update');
      Route::delete('/admin/agentform/{id}/delete',[AdminController::class,'agentform_delete'])->name('admin.agentform.delete');





      Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
      Route::get('/admin/category/add',[AdminController::class,'category_add'])->name('admin.category.add');
      Route::post('/admin/category/store',[AdminController::class,'category_store'])->name('admin.category.store');
      Route::get('/admin/category/{id}/edit',[Admincontroller::class,'category_edit'])->name('admin.category.edit');
      Route::put('/admin/category/update',[AdminController::class,'category_update'])->name('admin.category.update');
      Route::delete('/admin/category/{id}/delete',[AdminController::class,'category_delete'])->name('admin.category.delete');
      Route::get('admin/add/Property',[AdminController::class,'add_Property'])->name('admin.property.add');

      Route::get('/admin/arpproducts',[AdminController::class, 'arpProduct'])->name('admin.arpProduct');
      Route::get('/admin/arproduct/add',[AdminController::class,'arproduct_add'])->name('admin.arproduct.add');
      Route::post('/admin/arproduct/store',[AdminController::Class,'arproduct_store'])->name('admin.arproduct.store');
      Route::get('/admin/arproduct/{id}/edit',[AdminController::class,'arproduct_edit'])->name('admin.arproduct.edit');
      Route::put('/admin/arproduct/update',[AdminController::class,'arproduct_update'])->name('admin.arproduct.update');
      Route::delete('/admin/arproduct/{id}/delete',[AdminController::class,'arproduct_delete'])->name('admin.arproduct.delete');




      Route::get('/admin/bldproducts',[AdminController::class, 'bldProduct'])->name('admin.bldProduct');
      Route::get('/admin/bldproduct/add',[AdminController::class,'bldproduct_add'])->name('admin.bldproduct.add');
      Route::post('/admin/bldproduct/store',[AdminController::Class,'bldproduct_store'])->name('admin.bldproduct.store');
      Route::get('/admin/bldproduct/{id}/edit',[AdminController::class,'bldproduct_edit'])->name('admin.bldproduct.edit');
      Route::put('/admin/bldproduct/update',[AdminController::class,'bldproduct_update'])->name('admin.bldproduct.update');
      Route::delete('/admin/bldproduct/{id}/delete',[AdminController::class,'bldproduct_delete'])->name('admin.bldproduct.delete');


      Route::get('/admin/hmproducts',[AdminController::class, 'hmProduct'])->name('admin.hmProduct');
      Route::get('/admin/hmproduct/add',[AdminController::class,'hmproduct_add'])->name('admin.hmproduct.add');
      Route::post('/admin/hmproduct/store',[AdminController::Class,'hmproduct_store'])->name('admin.hmproduct.store');
      Route::get('/admin/hmproduct/{id}/edit',[AdminController::class,'hmproduct_edit'])->name('admin.hmproduct.edit');
      Route::put('/admin/hmproduct/update',[AdminController::class,'hmproduct_update'])->name('admin.hmproduct.update');
      Route::delete('/admin/hmproduct/{id}/delete',[AdminController::class,'hmproduct_delete'])->name('admin.hmproduct.delete');


      Route::get('/admin/vlproducts',[AdminController::class, 'vlProduct'])->name('admin.vlProduct');
      Route::get('/admin/vllproduct/add',[AdminController::class,'vllproduct_add'])->name('admin.vlldproduct.add');
      Route::post('/admin/vlproduct/store',[AdminController::Class,'vlproduct_store'])->name('admin.vlproduct.store');
      Route::get('/admin/vlproduct/{id}/edit',[AdminController::class,'vlproduct_edit'])->name('admin.vlproduct.edit');
      Route::put('/admin/vlproduct/update',[AdminController::class,'vlproduct_update'])->name('admin.vlproduct.update');
      Route::delete('/admin/vlproduct/{id}/delete',[AdminController::class,'vlproduct_delete'])->name('admin.vlproduct.delete');


      Route::get('/admin/offproducts',[AdminController::class, 'offProduct'])->name('admin.offProduct');
      Route::get('/admin/offproduct/add',[AdminController::class,'offproduct_add'])->name('admin.offproduct.add');
      Route::post('/admin/offproduct/store',[AdminController::Class,'offproduct_store'])->name('admin.offproduct.store');
      Route::get('/admin/offproduct/{id}/edit',[AdminController::class,'offproduct_edit'])->name('admin.offproduct.edit');
      Route::put('/admin/offproduct/update',[AdminController::class,'offproduct_update'])->name('admin.offproduct.update');
      Route::delete('/admin/offproduct/{id}/delete',[AdminController::class,'offproduct_delete'])->name('admin.offproduct.delete');


      Route::get('/admin/twnproducts',[AdminController::class, 'twnProduct'])->name('admin.twnProduct');
      Route::get('/admin/twnproduct/add',[AdminController::class,'twnproduct_add'])->name('admin.twnproduct.add');
      Route::post('/admin/twnproduct/store',[AdminController::Class,'twnproduct_store'])->name('admin.twnproduct.store');
      Route::get('/admin/twnproduct/{id}/edit',[AdminController::class,'twnproduct_edit'])->name('admin.twnproduct.edit');
      Route::put('/admin/twnproduct/update',[AdminController::class,'twnproduct_update'])->name('admin.twnproduct.update');
      Route::delete('/admin/twnproduct/{id}/delete',[AdminController::class,'twnproduct_delete'])->name('admin.twnproduct.delete');


      Route::get('/admin/grproducts',[AdminController::class, 'grProduct'])->name('admin.grProduct');
      Route::get('/admin/grgproduct/add',[AdminController::class,'grgproduct_add'])->name('admin.grgproduct.add');
      Route::post('/admin/grproduct/store',[AdminController::Class,'grproduct_store'])->name('admin.grgproduct.store');
      Route::get('/admin/grproduct/{id}/edit',[AdminController::class,'grproduct_edit'])->name('admin.grgproduct.edit');
      Route::put('/admin/grproduct/update',[AdminController::class,'grproduct_update'])->name('admin.grgproduct.update');
      Route::delete('/admin/grproduct/{id}/delete',[AdminController::class,'grproduct_delete'])->name('admin.grgproduct.delete');


      Route::get('/admin/shproducts',[AdminController::class, 'shProduct'])->name('admin.shProduct');
      Route::get('/admin/shproduct/add',[AdminController::class,'shproduct_add'])->name('admin.shproduct.add');
      Route::post('/admin/shproduct/store',[AdminController::Class,'shproduct_store'])->name('admin.shproduct.store');
      Route::get('/admin/shproduct/{id}/edit',[AdminController::class,'shproduct_edit'])->name('admin.shproduct.edit');
      Route::put('/admin/shproduct/update',[AdminController::class,'shproduct_update'])->name('admin.shproduct.update');
      Route::delete('/admin/shproduct/{id}/delete',[AdminController::class,'shproduct_delete'])->name('admin.shproduct.delete');




});
