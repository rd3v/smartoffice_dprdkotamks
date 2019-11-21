<?php

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

# DASHBOARD
Route::get('dashboard', 'DashboardController@view');

# USER MANAGEMENT
Route::group([
	'middleware' => ['App\Http\Middleware\AdminMiddleware']
], function() {

	Route::resource('manajemen-user','UserController');

});

# PROTOKOLER
Route::group([
	'prefix' => 'protokoler',
	'middleware' => ['auth','protokoler']
], function() {

  Route::get('surat-tugas/updatestatusverified','SuratTugasController@verified')->name('updateStatusSuratTugasVerified');
  Route::get('surat-tugas/print','SuratTugasController@print')->name('printSuratTugas');
  Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');
  Route::post('checkNomorSuratTugas','SuratTugasController@checkNomorSuratTugas');
  Route::get('updateStatusBatal/{id}','SuratTugasController@updateStatusBatal')->name('updatestatusBatal');

  Route::get('laporan-perjalanan-dinas/{id}/buatsppd', 'LaporanPerjalananDinasController@buatsppd');

  Route::resource('surat-tugas','SuratTugasController');
  Route::resource('sppd','SppdController');
  
});

# KEUANGAN
Route::group([
	'prefix' => 'keuangan',
	'middleware' => 'App\Http\Middleware\KeuanganMiddleware'
], function() {

	Route::get('laporan-perjalanan-dinas/{komisi}', 'LaporanPerjalananDinasController@lihatkomisi');

	Route::get('laporan-perjalanan-dinas/{komisi}/validasi/{id}', 'LaporanPerjalananDinasController@validasilaporan');

	Route::resource('laporan-perjalanan-dinas', 'LaporanPerjalananDinasController');
});

# BENDAHARA
Route::group([
	'prefix' => 'bendahara',
	'middleware' => 'App\Http\Middleware\BendaharaMiddleware'
], function() {

	Route::get('laporan-perjalanan-dinas/{komisi}', 'LaporanPerjalananDinasController@lihatkomisi');

	Route::get('laporan-perjalanan-dinas/{komisi}/validasi/{id}', 'LaporanPerjalananDinasController@validasilaporan');

	Route::resource('laporan-perjalanan-dinas', 'LaporanPerjalananDinasController');
});

# KOMISI
Route::group([
	'prefix' => 'komisi',
	'middleware' => 'App\Http\Middleware\KomisiMiddleware'
], function() {
	Route::get('laporan-perjalanan-dinas/upload-kelengkapan/{id}','LaporanPerjalananDinasController@uploadKelengkapan')->name('upload-kelengkapan');
	Route::resource('laporan-perjalanan-dinas', 'LaporanPerjalananDinasController');
	Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');
});

# JADWAL SIDANG
Route::group(['middleware' => 'App\Http\Middleware\KomisiMiddleware'], function() {
	Route::resource('jadwal-sidang', 'JadwalSidangController');
});

# DATA KOMISI
Route::get('data-komisi/lihatanggota/{id}','DataKomisiController@lihat_anggota');
Route::resource('data-komisi','DataKomisiController');
Route::resource('anggota-komisi','AnggotaKomisiController');

# UBAH PASSWQORD
Route::resource('password','Auth\PasswordSettingController');

# ERROR PAGE
Route::get('404',function() {
	return view('errors.404');
})->name('404');

Route::get('403',function() {
	return view('errors.403');
})->name('403');


// Route::get('laporan-perjalanan-dinas-contoh', 'HomeController@laporan_perjalanan_dinas');
// Route::get('laporan-perjalanan-dinas-contoh/view', 'HomeController@show');
// Route::get('laporan-perjalanan-dinas-contoh/edit', 'HomeController@edit');
