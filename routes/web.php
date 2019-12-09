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
  
  Route::get('rincian-awal/print/{spd_id}/{staff_id}/{asal}/{tujuan}','RincianAwalController@print')->name('printRincianAwal');

  Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');
  Route::get('spd/printthis/{id}','SpdController@printthis')->name('printthisspd');
  Route::post('checkNomorSuratTugas','SuratTugasController@checkNomorSuratTugas');
  Route::post('checkNomorSuratKomisi','SuratTugasController@checkNomorSuratKomisi');
  Route::post('checkNomorSPD','SpdController@checkNomorSPD');
  Route::get('updateStatusBatal/{id}','SuratTugasController@updateStatusBatal')->name('updatestatusBatal');

  Route::get('laporan-perjalanan-dinas/{id}/buatsppd', 'LaporanPerjalananDinasController@buatsppd');
  Route::get('spd/buat/{persuratan_id}','SpdController@buatspd')->name('buatspd');

  Route::get('rincian-awal/create/{persuratan_id}','RincianAwalController@create');
  
  Route::resource('surat-tugas','SuratTugasController')->except(['destroy','update']);
  Route::resource('spd','SpdController');
  Route::resource('rincian-awal','RincianAwalController')->except(['index','create','edit','update','destroy']);
  
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
	Route::get('rincian-akhir/create/{persuratan_id}','RincianAkhirController@create');
	Route::get('rincian-akhir/print','RincianAkhirController@print')->name('printRincianAkhir');
	Route::resource('rincian-akhir','RincianAkhirController');

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
	Route::get('rekapan/print','RekapanController@print');
	Route::get('laporan-perjalanan-dinas/upload-kelengkapan/{id}','LaporanPerjalananDinasController@uploadKelengkapan')->name('upload-kelengkapan');
	Route::get('laporan-perjalanan-dinas/edit-kelengkapan/{kelengkapan_id}','LaporanPerjalananDinasController@editKelengkapan')->name('edit-kelengkapan');
	Route::resource('laporan-perjalanan-dinas', 'LaporanPerjalananDinasController');
	Route::resource('anggota','AnggotaKomisiController');

	Route::get('surat-tugas/printthis/{id}','SuratTugasController@printthis')->name('printthis');

	Route::post('laporan/upload/{kelengkapan_id}','LaporanPerjalananDinasController@upload');;
	Route::post('getcomments','LaporanPerjalananDinasController@getComments')->name('getcomments');
});

# JADWAL SIDANG
Route::group(['middleware' => 'App\Http\Middleware\KomisiMiddleware'], function() {
	Route::resource('jadwal-sidang', 'JadwalSidangController');
});

# DATA KOMISI
Route::get('data-komisi/lihatanggota/{id}','DataKomisiController@lihat_anggota');
Route::resource('data-komisi','DataKomisiController');

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
Route::post('getAnggotaDewan','Ajax\AnggotaDewanController@get')->name('getAnggotaDewan');
Route::post('getAnggotaDewanByKomisi','Ajax\AnggotaDewanController@getByKomisi')->name('getAnggotaDewanByKomisi');
Route::post('getAnggotaDewanByFraksi','Ajax\AnggotaDewanController@getByFraksi')->name('getAnggotaDewanByFraksi');

Route::post('getStaff','Ajax\StaffController@get')->name('getStaff');