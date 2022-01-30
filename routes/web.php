<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as Productsuser;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomePageController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::name('admin.')->group(function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::resource('products', ProductController::class);

		Route::resource('orders', OrderController::class);
	});
});
Route::get('/users', [UserController::class, 'index']); 

Route::get('/users/tambah', [UserController::class, 'tambah']); 

Route::post('/users/store', [UserController::class, 'store']); 

Route::get ('/users/edit/{id}', [UserController::class, 'edit']); 

Route::post('/users/update', [UserController::class, 'update']); 

Route::get('/users/hapus/{id}',[UserController::class, 'hapus']);

Route::patch('orders/update', [CartController::class,'update'])->name('orders.update');

Route::get('/products', [Productsuser::class,'index'])->name('products.index');
Route::get('/products/{id}', [Productsuser::class,'show'])->name('products.show');
Route::get('/products/image/{imageName}', [Productsuser::class,'image'])->name('products.image');

Route::get('/carts', [CartController::class,'index'])->name('carts.index');
Route::get('/carts/add/{id}', [CartController::class,'add'])->name('carts.add');
Route::patch('carts/update', [CartController::class,'update'])->name('carts.update');
Route::delete('carts/remove', [CartController::class,'remove'])->name('carts.remove');
Route::get('carts/checkout', [CartController::class,'checkout'])->name('carts.checkout');

Route::get('getKota/{id}', function ($id) {
    $kota = App\Models\Kota::where('provinsi_id',$id)->get();
    return response()->json($kota);
});

Route::get('getKecamatan/{id}', function ($id) {
    $kecamatan = App\Models\Kecamatan::where('kota_id',$id)->get();
    return response()->json($kecamatan);
});

Route::get('getKelurahan/{id}', function ($id) {
    $kelurahan = App\Models\Kelurahan::where('kecamatan_id',$id)->get();
    return response()->json($kelurahan);
});

Route::post('products/{id}', [ProductReviewController::class,'store'])->name('products.store');

Route::get('/', [HomepageController::class, 'index']);
Route::get('/homepage', [HomepageController::class,'about'])->name('homepage.about');
Route::get('/about', [HomepageController::class, 'about']);
Route::get('/kontak', [HomepageController::class, 'kontak']);
Route::get('/kategori', [HomepageController::class, 'kategori']);
