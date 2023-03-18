<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//admin route
//to open the product's create form 
Route::get('/admin', [ProductController::class, 'create']);


//to store the product's info 
Route::post('/admin', [ProductController::class, 'store']);


//to show the products
Route::get('/gallery', [ProductController::class, 'show']);

// to show single product
Route::get('/art/{product}', [ProductController::class, 'artDetail'])->name('art-details');


Route::get('/cart', function () {
    return view('cart');
});