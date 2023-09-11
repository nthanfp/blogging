<?php

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

//harus di isi lengkap
Route::get('/salam/{nama}', function ($nama) {
    echo "<h2>Good day, $nama!</h2>";
});


//optional bebas
Route::get('/produk/{nama?}/{qty?}', function ($nama = "N/A", $qty = 0) {
    echo "<p>Jual <strong>$nama</strong>. Stok saat ini: $qty</p>";
});

//where untuk menfilter terhadap parameter Id
//[] pola, untuk + digit merubah parameter angka jumlahnya bebas
// tanda {} mengizinkan sebanyak 3 karakter
Route::get('/users/{id?}', function ($id = -1) {
    return "Displaying user with ID: $id";
})->where('id', '[A-z0-9]{3}');


//redirect hanya mengalihkan doang
Route::get('/hubungi-kami', function () {
    return '<h3>Hubungi kami</h3>';
});
Route::redirect('/contact-us', '/hubungi-kami', 301);


Route::prefix('/admin')->group(function () {
    Route::get('/mahasiswa', function () {
        echo "<h1>Administrasi Mahasiswa</h1>";
    });
    Route::get('/dosen', function () {
        echo "<h1>Administrasi Dosen</h1>";
    });
    Route::get('/staf', function () {
        echo "<h1>Administrasi Staf Kampus</h1>";
    });

    Route::fallback(function () {
        return redirect('/');
    });
});
