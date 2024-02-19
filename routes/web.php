<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\PhoneController;
use App\Http\Middleware\CreatePhoneMiddleware;
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
    return view('welcome');
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// cara best practicenya
Route::get('/home-1', [HomeController::class, 'home'])->name('rumah');

// Route::get('/jual', function () {
//     return view('page_jual_beli.jual_page');
// });

// Route::get('/beli', function () {
//     return view('page_jual_beli.beli_page');
// });

// create Phone //
// Page khusus get page create Phone
// pakein middleare agar user role customer gk bisa masuk ke page ini


    // GET
    // create Phone page
    Route::get('/createPhone', [PhoneController::class, 'redirectToCreatePhonePage']);

    // post create Phone
    Route::post('/post-createPhone', [PhoneController::class, 'createPhone']);

    // update //
    // kita pasing id untuk page update agar si aplikasi tau Phone apa yang ingin kita update
    Route::get('/update-phone-page/{id}', [PhoneController::class, 'updatePhonePage']);

    // data yang bakal di post khusus update data dari table Phone
    Route::post('/update-phone/{id1}', [PhoneController::class, 'updatePhone']);


    // delete
    // kita pasing id untuk delete agar si aplikasi tau Phone apa yang ingin kita delete dari primary key
    Route::post('/delete-phone/{id}', [PhoneController::class, 'deletePhone']);

