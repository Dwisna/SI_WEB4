<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\backend\PengalamanKerjaController;
use App\Http\CustomerController;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

// --------------------ACARA 3--------------------
Route::get('/', function () {
    return view('welcome');
});

route::get('/foo', function(){
    return 'Hello Word';
});

route::get('user/{$id}', function($id){
    return 'user'.$id;
});
// Route::get('/user',[UserController::class,'index']);
Route::get('/user','UserController@index');

//metode http dalam routing laravel
//Route::get($uri, $callback);
//Route::post($uri, $callback);
//Route::put($uri, $callback);
//Route::patch($uri, $callback);
//Route::delete($uri, $callback);
//Route::options($uri, $callback);


Route::redirect('/coba','/sini');

Route::get('/', function(){
    return view('profile',[ 
        'nama' => 'Dwisna',
        'nim'=> 'e41230674'
    ]);
});

Route::get('user1/{name?}', function ($name = null){
    return $name? "Hallo, $name!" : "Hallo";
});

Route::get('user2/{name?}', function ($name = 'Hesti'){
    return $name? "Hallo, $name!" : "Hallo Hesti";
});

Route::get('user3/{name}', function($name){
    return "selamat, $name!";
})->where('nama', '[A-Za-z]+');

Route::get('user4/{id}', function ($id){
    return "User ID: $id";
})->where('id', '[0-9]+');

Route::get('user5/{id}/{name}', function ($id, $name){
    return "User ID: $id, Name: $name";
})->where(['id'=>'[0-9]+','name' => '[a-z]+']);

Route::get('search/{search}', function($search){
    return $search;
})->where('search', '.*');



// --------------------ACARA 4--------------------
use App\Http\Controllers\ProfileController;

Route::get('user6/profile', function(){
    return "ini adalah halaman user6!";
})->name('profile.user6');

Route::get('user7/profile', ['ProfileController@show'])->name('profile');


// $url = route('profile');
// return redirect()->route('profile');

Route::get('/redirect-profile', function(){
    return redirect()->route('profile', ['id'=>1, 'photos'=>'yes']);
});
Route::middleware(['check.user'])->group(function(){
    Route::get('/profileLogin',['UserController::class','profile'])->name('profile');
});
Route::namespace('App\Http\Controller\User')->group(function(){
    Route::get('/user/info','UserController@info')->name('user.info');
});
Route::domain('{account}.example.com')->group(function(){
    Route::get('/', function ($account){
        return "ini halaman akun : ".$account;
    });
});
Route::prefix('pengguna')->group(function(){
    Route::get('/dashboard', function(){
        return "ini adalah halaman dashboard pengguna";
    });
});
Route::name('pre')->prefix('cobalagi')->group(function(){
    Route::get('/dashboard', function(){
        return "ini halaman dashboard prefix name";
    });
});

// --------------------ACARA 5--------------------
Use App\Http\Controllers\ManagementUserController;
// Route::get('userr','ManagementUserController::class');
Route::get('/admin1', 'ManagementUserController@index');
//Home
Route::get("/admin", function(){
    return view("home");
});
// Auth::routes();

// Acara 7
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::groub(['namespace'=>'App\Http\Controllers\backend'], function(){
//     Route::resource('/dashboard', DashboardController::class);
// });

// Acara 8
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('/pendidikan', PendidikanController::class)->names('pendidikan');
    Route::resource('/pengalaman_kerja', PengalamanKerjaController::class)->names('pengalaman_kerja');
});

// Route::group(['namespace'=> 'backend'], function(){
//     Route::resource('dashboard', 'DashboardController');
//     Route::resource('/pendidikan', 'PendidikanController');
// });

// Acara 17-18
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);
Route::get('/pegawai/{dwisna}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::match(['get', 'post'], '/formulir/proses', [PegawaiController::class, 'proses']);
Route::get('/cobaerror', [CobaController::class, 'index']);

// Acara 19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

// Acara 20
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');