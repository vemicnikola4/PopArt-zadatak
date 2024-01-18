<?php

use App\Models\Custumer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\AdCategoryController;
use App\Http\Controllers\AdCategory2Controller;
use App\Http\Controllers\AdCategory3Controller;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('back',function(){
    return back();
})->name('back');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('custumer', CustumerController::class)->except(['show']);

    Route::resource('ad',AdController::class)->except(['create']);
    Route::get('ad/create/{custumer}',[AdController::class,'create'])->name('ad.create');
    Route::get('ad/delete/{ad}',[AdController::class,'delete'])->name('ad.delete');

    

});

//route for localization
Route::get('/lang/{locale}',function(string $locale){
    
    session(['locale' => $locale]);

    //kad postavi set locale treba da a vratimo na stranicu
    return redirect()->back();
})->whereIn('locale',['en','sr'])->name('lang');

 Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('/', [AdminController::class,'index'])->name('index');

    
    Route::resource('custumer', CustumerController::class)->except(['show']);

    //ad_category routes
    Route::resource('ad_category',AdCategoryController::class);
    Route::get('ad_category/delete/{ad_category}',[AdCategoryController::class,'delete'])->name('ad_category.delete');

    //ad_category_2 routes
    Route::resource('ad_category_2',AdCategory2Controller::class)->except(['create']);
    Route::get('ad_category_2/create/{ad_category_id}',[AdCategory2Controller::class,'create'])->name('ad_category_2.create');
    Route::get('ad_category_2/delete/{ad_category_2}',[AdCategory2Controller::class,'delete'])->name('ad_category_2.delete');


    Route::resource('ad_category_3',AdCategory3Controller::class);
    Route::get('ad_category_3/create/{ad_category_2}',[AdCategory3Controller::class,'create'])->name('ad_category_3.create');
    Route::get('ad_category_3/delete/{ad_category_3}',[AdCategory3Controller::class,'delete'])->name('ad_category_3.delete');

    Route::resource('custumer',CustumerController::class);
    Route::get('custumers',[CustumerController::class,'all'])->name('custumers.all');
    Route::get('custumer/delete/{custumer}',[CustumerController::class,'delete'])->name('custumer.delete');






 });

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
