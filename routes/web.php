<?php
use Illuminate\Support\Facades\Route;

//Admin Namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DompetController;
use App\Http\Controllers\Admin\DompetMasukController;
use App\Http\Controllers\Admin\DompetKeluarController;
use App\Http\Controllers\Admin\KategoriController;

//Auth Namespace
use App\Http\Controllers\Auth\AuthController;

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

//Auth
Route::get('/', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/registration', [AuthController::class, 'viewRegistration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth', 'is_verified']],function(){
	Route::name('admin.')->group(function(){
		Route::get('/', [AdminController::class,'index'])->name('index');
		Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
		Route::get('/kategori', [KategoriController::class,'index'])->name('kategori');
		
		Route::resource('dompet', 'DompetController');
		Route::get('/dompet-masuk', [DompetMasukController::class,'index'])->name('dompet.masuk');
		Route::get('/dompet-keluar', [DompetKeluarController::class,'index'])->name('dompet.keluar');
	});
});
