<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TblData1Controller;
use App\Http\Controllers\TblData2Controller;
use App\Http\Controllers\TblData3Controller;
use App\Http\Controllers\TblData4Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\SpasialController;
use App\Http\Controllers\KuesController;

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
    return view('login');
})->name('login')->middleware('guest');

Route::post('/register', [MainController::class, 'register']);
Route::post('/login', [MainController::class, 'login']);
Route::post('/logout', [MainController::class, 'logout']);
Route::get('/landing', [MainController::class, 'index'])->middleware('auth');
Route::get('/pindah', [MainController::class, 'pindah']);
Route::get('/data/dump', [MainController::class, 'dump'])->middleware(['auth', 'checkAdmin']);
Route::post('/data/import/bip', [MainController::class, 'importBip'])->middleware('auth');
Route::post('/data/import/vaksin', [MainController::class, 'importVaksin'])->middleware('auth');
// 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

Route::get('/admin', [UserController::class, 'index'])->middleware(['auth', 'checkAdmin']);
Route::post('/user/flag', [UserController::class, 'update'])->middleware(['auth', 'checkAdmin']);
Route::post('/user/remove', [UserController::class, 'remove'])->middleware(['auth', 'checkAdmin']);

Route::get('/forgot-password', function () {
    return view('user.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [UserController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('user.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware('guest')->name('password.update');


// 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

Route::post('/data/nmtempat', [TblData1Controller::class, 'nmtempat']);

Route::post('/data/index', [TblData1Controller::class, 'index'])->middleware(['auth', 'checkEditor']);
Route::get('/data/add', [TblData1Controller::class, 'create'])->middleware('auth');
Route::post('/data/flag', [TblData1Controller::class, 'flagUpdate'])->middleware('auth');

Route::post('/data/add/blok1', [TblData1Controller::class, 'storeBlok1'])->middleware('auth');

Route::post('/data/add/blok2', [TblData1Controller::class, 'storeBlok2'])->middleware('auth');

Route::post('/data/add/blok3', [TblData1Controller::class, 'storeBlok3'])->middleware('auth');

Route::post('/data/add/blok4table', [TblData1Controller::class, 'storeBlok4Table'])->middleware('auth');
Route::post('/data/nik/edit', [TblData2Controller::class, 'edit'])->middleware('auth');
Route::post('/data/nik/update', [TblData2Controller::class, 'update'])->middleware('auth');
Route::post('/data/anggotakeluarga', [TblData2Controller::class, 'namaAnggota'])->middleware('auth');
Route::post('/data/nik/flag/', [TblData2Controller::class, 'flagUpdate'])->middleware('auth');

Route::post('/data/add/blok5table', [TblData1Controller::class, 'storeBlok5Table'])->middleware('auth');
Route::post('/data/tanah/edit', [TblData3Controller::class, 'edit'])->middleware('auth');
Route::post('/data/tanah/update', [TblData3Controller::class, 'update'])->middleware('auth');
Route::post('/data/tanah/flag', [TblData3Controller::class, 'flagUpdate'])->middleware('auth');

Route::post('/data/add/blok6', [TblData1Controller::class, 'storeBlok6'])->middleware('auth');

Route::post('/data/add/blok7', [TblData1Controller::class, 'storeBlok7'])->middleware('auth');
Route::post('/data/add/blok7table', [TblData1Controller::class, 'storeBlok7Table'])->middleware('auth');
Route::post('/data/usaha/edit', [TblData4Controller::class, 'edit'])->middleware('auth');
Route::post('/data/usaha/update', [TblData4Controller::class, 'update'])->middleware('auth');
Route::post('/data/usaha/flag', [TblData4Controller::class, 'flagUpdate'])->middleware('auth');

Route::post('/data/add/blok8', [TblData1Controller::class, 'storeBlok8'])->middleware('auth');


Route::post('/data/kk/', [TblData1Controller::class, 'show'])->middleware('auth');
Route::get('/data/kk/{kk}/edit', [TblData1Controller::class, 'edit'])->name('kk.edit')->middleware(['auth', 'checkEditor']);

Route::post('/data/edit/blok1', [TblData1Controller::class, 'editBlok1'])->middleware('auth');
Route::post('/data/edit/blok2', [TblData1Controller::class, 'storeBlok2'])->middleware('auth');
Route::post('/data/edit/blok3', [TblData1Controller::class, 'storeBlok3'])->middleware('auth');
Route::post('/data/edit/blok4table', [TblData1Controller::class, 'storeBlok4Table'])->middleware('auth');
Route::post('/data/edit/blok5table', [TblData1Controller::class, 'storeBlok5Table'])->middleware('auth');
Route::post('/data/edit/blok6', [TblData1Controller::class, 'storeBlok6'])->middleware('auth');
Route::post('/data/edit/blok7', [TblData1Controller::class, 'storeBlok7'])->middleware('auth');
Route::post('/data/edit/blok7table', [TblData1Controller::class, 'storeBlok7Table'])->middleware('auth');

// 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

Route::post('/data/kuisioner', [KuesController::class, 'index'])->middleware(['auth', 'checkEditor']);
Route::post('/data/kuisioner/tabelkk', [KuesController::class, 'tabelkk'])->middleware(['auth', 'checkEditor']);
Route::post('/data/kuisioner/tabelpenduduk', [KuesController::class, 'tabelpenduduk'])->middleware(['auth', 'checkEditor']);
Route::post('/data/kuisioner/tabelsertifikat', [KuesController::class, 'tabelsertifikat'])->middleware(['auth', 'checkEditor']);
Route::post('/data/kuisioner/tabelusaha', [KuesController::class, 'tabelusaha'])->middleware(['auth', 'checkEditor']);

// 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

Route::post('/tabel', [TabelController::class, 'index'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel1', [TabelController::class, 'tabel1'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel2', [TabelController::class, 'tabel2'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel3', [TabelController::class, 'tabel3'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel4', [TabelController::class, 'tabel4'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel5', [TabelController::class, 'tabel5'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel6', [TabelController::class, 'tabel6'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel7', [TabelController::class, 'tabel7'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel8', [TabelController::class, 'tabel8'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel9', [TabelController::class, 'tabel9'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel10', [TabelController::class, 'tabel10'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel11', [TabelController::class, 'tabel11'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel12', [TabelController::class, 'tabel12'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel13', [TabelController::class, 'tabel13'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel14', [TabelController::class, 'tabel14'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel15', [TabelController::class, 'tabel15'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel16', [TabelController::class, 'tabel16'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel17', [TabelController::class, 'tabel17'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel18', [TabelController::class, 'tabel18'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel19', [TabelController::class, 'tabel19'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel20', [TabelController::class, 'tabel20'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel21', [TabelController::class, 'tabel21'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel22', [TabelController::class, 'tabel22'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel23', [TabelController::class, 'tabel23'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel24', [TabelController::class, 'tabel24'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel25', [TabelController::class, 'tabel25'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel26', [TabelController::class, 'tabel26'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel27', [TabelController::class, 'tabel27'])->middleware('auth');
Route::get('/tabel/{prov}/{kab}/{kec}/{desa}/tabel28', [TabelController::class, 'tabel28'])->middleware('auth');

// Route::get('/tabel/pkk', [TabelController::class, 'pkk'])->middleware('auth');

// 00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

Route::post('/spasial', [SpasialController::class, 'index'])->middleware('auth');

Route::post('/spasial/tabel1/add', [SpasialController::class, 'tabel1Store'])->middleware('auth');
Route::post('/spasial/tabel1/data', [SpasialController::class, 'tabel1Data'])->middleware('auth');
Route::post('/spasial/tabel2/add', [SpasialController::class, 'tabel2Store'])->middleware('auth');
Route::post('/spasial/tabel2/data', [SpasialController::class, 'tabel2Data'])->middleware('auth');
Route::post('/spasial/tabel3/add', [SpasialController::class, 'tabel3Store'])->middleware('auth');
Route::post('/spasial/tabel3/data', [SpasialController::class, 'tabel3Data'])->middleware('auth');
Route::post('/spasial/tabel4/add', [SpasialController::class, 'tabel4Store'])->middleware('auth');
Route::post('/spasial/tabel4/data', [SpasialController::class, 'tabel4Data'])->middleware('auth');
Route::post('/spasial/tabel5/add', [SpasialController::class, 'tabel5Store'])->middleware('auth');
Route::post('/spasial/tabel5/data', [SpasialController::class, 'tabel5Data'])->middleware('auth');
Route::post('/spasial/tabel6/add', [SpasialController::class, 'tabel6Store'])->middleware('auth');
Route::post('/spasial/tabel6/data', [SpasialController::class, 'tabel6Data'])->middleware('auth');
Route::post('/spasial/tabel7/add', [SpasialController::class, 'tabel7Store'])->middleware('auth');
Route::post('/spasial/tabel7/data', [SpasialController::class, 'tabel7Data'])->middleware('auth');
Route::post('/spasial/tabel8/add', [SpasialController::class, 'tabel8Store'])->middleware('auth');
Route::post('/spasial/tabel8/data', [SpasialController::class, 'tabel8Data'])->middleware('auth');
Route::post('/spasial/tabel9/add', [SpasialController::class, 'tabel9Store'])->middleware('auth');
Route::post('/spasial/tabel9/data', [SpasialController::class, 'tabel9Data'])->middleware('auth');
Route::post('/spasial/tabel10/add', [SpasialController::class, 'tabel10Store'])->middleware('auth');
Route::post('/spasial/tabel10/data', [SpasialController::class, 'tabel10Data'])->middleware('auth');
Route::post('/spasial/tabel11/add', [SpasialController::class, 'tabel11Store'])->middleware('auth');
Route::post('/spasial/tabel11/data', [SpasialController::class, 'tabel11Data'])->middleware('auth');
Route::post('/spasial/tabel12/add', [SpasialController::class, 'tabel12Store'])->middleware('auth');
Route::post('/spasial/tabel12/data', [SpasialController::class, 'tabel12Data'])->middleware('auth');
Route::post('/spasial/tabel13/add', [SpasialController::class, 'tabel13Store'])->middleware('auth');
Route::post('/spasial/tabel13/data', [SpasialController::class, 'tabel13Data'])->middleware('auth');
Route::post('/spasial/tabel14/add', [SpasialController::class, 'tabel14Store'])->middleware('auth');
Route::post('/spasial/tabel14/data', [SpasialController::class, 'tabel14Data'])->middleware('auth');
Route::post('/spasial/tabel15/add', [SpasialController::class, 'tabel15Store'])->middleware('auth');
Route::post('/spasial/tabel15/data', [SpasialController::class, 'tabel15Data'])->middleware('auth');
Route::post('/spasial/tabel16/add', [SpasialController::class, 'tabel16Store'])->middleware('auth');
Route::post('/spasial/tabel16/data', [SpasialController::class, 'tabel16Data'])->middleware('auth');
Route::post('/spasial/tabel17/add', [SpasialController::class, 'tabel17Store'])->middleware('auth');
Route::post('/spasial/tabel17/data', [SpasialController::class, 'tabel17Data'])->middleware('auth');
Route::post('/spasial/tabel18/add', [SpasialController::class, 'tabel18Store'])->middleware('auth');
Route::post('/spasial/tabel18/data', [SpasialController::class, 'tabel18Data'])->middleware('auth');
Route::post('/spasial/tabel19/add', [SpasialController::class, 'tabel19Store'])->middleware('auth');
Route::post('/spasial/tabel19/data', [SpasialController::class, 'tabel19Data'])->middleware('auth');
Route::post('/spasial/tabel20/add', [SpasialController::class, 'tabel20Store'])->middleware('auth');
Route::post('/spasial/tabel20/data', [SpasialController::class, 'tabel20Data'])->middleware('auth');
Route::post('/spasial/tabel21/add', [SpasialController::class, 'tabel21Store'])->middleware('auth');
Route::post('/spasial/tabel21/data', [SpasialController::class, 'tabel21Data'])->middleware('auth');
Route::post('/spasial/tabel22/add', [SpasialController::class, 'tabel22Store'])->middleware('auth');
Route::post('/spasial/tabel22/data', [SpasialController::class, 'tabel22Data'])->middleware('auth');
Route::post('/spasial/tabel23/add', [SpasialController::class, 'tabel23Store'])->middleware('auth');
Route::post('/spasial/tabel23/data', [SpasialController::class, 'tabel23Data'])->middleware('auth');
Route::post('/spasial/tabel24/add', [SpasialController::class, 'tabel24Store'])->middleware('auth');
Route::post('/spasial/tabel24/data', [SpasialController::class, 'tabel24Data'])->middleware('auth');
Route::post('/spasial/tabel25/add', [SpasialController::class, 'tabel25Store'])->middleware('auth');
Route::post('/spasial/tabel25/data', [SpasialController::class, 'tabel25Data'])->middleware('auth');
Route::post('/spasial/tabel26/add', [SpasialController::class, 'tabel26Store'])->middleware('auth');
Route::post('/spasial/tabel26/data', [SpasialController::class, 'tabel26Data'])->middleware('auth');
Route::post('/spasial/tabel27/add', [SpasialController::class, 'tabel27Store'])->middleware('auth');
Route::post('/spasial/tabel27/data', [SpasialController::class, 'tabel27Data'])->middleware('auth');

Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel1', [SpasialController::class, 'tabel1'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel2', [SpasialController::class, 'tabel2'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel3', [SpasialController::class, 'tabel3'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel4', [SpasialController::class, 'tabel4'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel5', [SpasialController::class, 'tabel5'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel6', [SpasialController::class, 'tabel6'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel7', [SpasialController::class, 'tabel7'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel8', [SpasialController::class, 'tabel8'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel9', [SpasialController::class, 'tabel9'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel10', [SpasialController::class, 'tabel10'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel11', [SpasialController::class, 'tabel11'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel12', [SpasialController::class, 'tabel12'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel13', [SpasialController::class, 'tabel13'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel14', [SpasialController::class, 'tabel14'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel15', [SpasialController::class, 'tabel15'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel16', [SpasialController::class, 'tabel16'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel17', [SpasialController::class, 'tabel17'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel18', [SpasialController::class, 'tabel18'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel19', [SpasialController::class, 'tabel19'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel20', [SpasialController::class, 'tabel20'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel21', [SpasialController::class, 'tabel21'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel22', [SpasialController::class, 'tabel22'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel23', [SpasialController::class, 'tabel23'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel24', [SpasialController::class, 'tabel24'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel25', [SpasialController::class, 'tabel25'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel26', [SpasialController::class, 'tabel26'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel27', [SpasialController::class, 'tabel27'])->middleware('auth');
Route::get('/spasial/{prov}/{kab}/{kec}/{desa}/tabel28', [SpasialController::class, 'tabel28'])->middleware('auth');
