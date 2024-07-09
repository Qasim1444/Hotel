<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


   // Debugbar::info($object);
Debugbar::error('Error!');
Debugbar::warning('Watch out…');
Debugbar::addMessage('Another message', 'mylabel');

try {
    throw new Exception('foobar');
} catch (Exception $e) {
    Debugbar::addThrowable($e);
}



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});







Route::get('/blog',[HomeController::class,'blog']);
Route::get('/singleblog',[HomeController::class,'singleblog']);


Route::get('/',[HomeController::class,'index']);
Route::post('/addreservationhome', [HomeController::class, 'addreservationhome']);
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
Route::post('/create-checkout-session', [HomeController::class, 'createCheckoutSession']);



Route::get('/success', function () {
    // Handle successful payment here
    return view('success');
});

Route::get('/cancel', function () {
    // Handle canceled payment here
    return view('cancel');
});






Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/userdata',[AdminController::class,'userdata']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('delete.user');
Route::get('/edituser/{id}', [AdminController::class, 'edituser'])->name('edit.user');
Route::post('/updateuser/{id}', [AdminController::class, 'updateuser'])->name('update.user');

Route::get('/adminmenu', [AdminController::class, 'adminmenu']);
Route::post('/addmenu', [AdminController::class, 'addmenu']);
Route::get('/destroymenu/{id}', [AdminController::class, 'destroymenu'])->name('destroymenu');
Route::get('/editmenu/{id}', [AdminController::class, 'editmenu'])->name('edit.menu');
Route::post('/updatemenu/{id}', [AdminController::class, 'updatemenu']);

Route::get('/adminreservation', [AdminController::class, 'adminreservation']);
Route::post('/addreservation', [AdminController::class, 'addreservation']);
Route::get('/destroyreservation/{id}', [AdminController::class, 'destroyreservation'])->name('destroyreservation');
Route::get('/editreservation/{id}', [AdminController::class, 'editreservation'])->name('edit.reservation');
Route::post('/updatereservation/{id}', [AdminController::class, 'updatereservation']);

Route::get('/adminchief', [AdminController::class, 'adminchief']);
Route::post('/addchief', [AdminController::class, 'addchief']);
Route::get('/destroychief/{id}', [AdminController::class, 'destroychief'])->name('destroychief');
Route::get('/editchief/{id}', [AdminController::class, 'editchief'])->name('edit.chief');
Route::post('/updatechief/{id}', [AdminController::class, 'updatechief']);

Route::get('/adminorder', [AdminController::class, 'adminorder']);
Route::post('/addorder', [AdminController::class, 'addorder']);
Route::get('/destroyorder/{id}', [AdminController::class, 'destroyorder'])->name('destroyorder');
Route::get('/editorder/{id}', [AdminController::class, 'editorder'])->name('edit.order');
Route::post('/updateorder/{id}', [AdminController::class, 'updateorder']);
Route::get("/search", [AdMinController::class, "search"]);





Route::get('/post', [AdminController::class, 'post']);
Route::post('/admin/poststore', [AdminController::class, 'poststore']);
Route::get('/admin/deletepost/{id}', [AdminController::class, 'deletepost'])->name('delete.post');
Route::get('/admin/editpost/{id}', [AdminController::class, 'editpost'])->name('edit.post');
Route::post('/admin/updatepost/{id}', [AdminController::class, 'updatepost'])->name('update.post');

Route::get('/categories', [AdminController::class, 'categories']);
Route::post('/admin/addcategoriesstore', [AdminController::class, 'categoriesstore']);
Route::get('/admin/deletecategories/{id}', [AdminController::class, 'deletecategories'])->name('delete.categories');
Route::get('/admin/editcategories/{id}', [AdminController::class, 'editcategories'])->name('edit.categories');
Route::post('/admin/updatecategories/{id}', [AdminController::class, 'updatecategories'])->name('update.categories');


Route::get('/tag', [AdminController::class, 'tag']);
Route::post('/admin/tagstore', [AdminController::class, 'tagstore']);
Route::get('/admin/deletetag/{id}', [AdminController::class, 'deletetag'])->name('delete.tag');
Route::get('/admin/edittag/{id}', [AdminController::class, 'edittag'])->name('edit.tag');
Route::post('/admin/updatetag/{id}', [AdminController::class, 'updatetag'])->name('update.tag');


