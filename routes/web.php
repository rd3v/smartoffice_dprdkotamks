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
  Route::get('spd/updatestatusverified','SpdController@verified')->name('updateStatusSuratPerjalananDinasVerified');
  Route::get('surat-tugas/print','SuratTugasController@print')->name('printSuratTugas');
  Route::get('spd/print','SpdController@print')->name('printSPD');
  Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');
  Route::get('spd/printthis/{id}','SpdController@printthis')->name('printthisspd');
  Route::post('checkNomorSuratTugas','SuratTugasController@checkNomorSuratTugas');
  Route::post('checkNomorSPD','SpdController@checkNomorSPD');
  Route::get('updateStatusBatal/{id}','SuratTugasController@updateStatusBatal')->name('updatestatusBatal');

  Route::get('laporan-perjalanan-dinas/{id}/buatsppd', 'LaporanPerjalananDinasController@buatsppd');
  Route::get('spd/buat/{persuratan_id}','SpdController@buatspd')->name('buatspd');

  Route::resource('surat-tugas','SuratTugasController')->except(['destroy','update']);
  Route::resource('spd','SpdController');
  
});

# KEUANGAN
Route::group([
	'prefix' => 'keuangan',
	'middleware' => 'App\Http\Middleware\KeuanganMiddleware'
], function() {

	Route::get('laporan-perjalanan-dinas/validasilaporan', 'LaporanPerjalananDinasController@validasilaporan')->name('validasilaporan');
	Route::get('laporan-perjalanan-dinas/ceklaporan/{id}', 'LaporanPerjalananDinasController@ceklaporan')->name('ceklaporan');

	Route::resource('laporan-perjalanan-dinas','LaporanPerjalananDinasController');
	Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');	

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

# AJAX
Route::post('postTiketPerjalananComment','Ajax\PostCommentsController@tiketPerjalanan')->name('postTiketPerjalananComment');