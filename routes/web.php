<?php

use App\Http\Controllers\BebanKerjaController;
use App\Http\Controllers\BebanKerjaMitraController;
use App\Http\Controllers\BebanKerjaOrganikController;
use App\Http\Controllers\CapaianAgregatController;
use App\Http\Controllers\CapaianOrganikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ManajemenSampelController;
use App\Http\Controllers\MasterKegiatanController;
use App\Http\Controllers\MasterMitraController;
use App\Http\Controllers\MasterOrganikController;
use App\Http\Controllers\MasterPerusahaanController;
use App\Http\Controllers\PenugasanMitraController;
use App\Http\Controllers\PenugasanPegawaiController;
use App\Models\PenugasanPegawai;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'capaian'], function () {
    Route::get('/agregat', [CapaianAgregatController::class, 'index'])
        ->name('capaian-agregat');
    Route::get('/organik', [CapaianOrganikController::class, 'index'])
        ->name('capaian-organik');
    Route::get('/organik/{nama}', [CapaianOrganikController::class, 'showDetail'])
        ->name('capaian-organik-detail');
    Route::get('/organik/mitra/{nama}', [CapaianOrganikController::class, 'showMitra'])
        ->name('capaian-organik-mitra');
});

Route::group(['prefix' => 'beban-kerja'], function () {
    Route::get('/tugas', [BebanKerjaController::class, 'index'])
        ->name('beban-kerja-all');
    Route::get('/', [BebanKerjaController::class, 'showAll'])
        ->name('jls');
    Route::get('/{id}/tugas-organik/show', [PenugasanPegawaiController::class, 'show'])
        ->name('penugasan-organik-detail');
    Route::get('/{id}/penugasan', [BebanKerjaController::class, 'show'])
        ->name('beban-kerja-tugas');
    Route::get('/{id}/tugas-organik/{petugas}', [PenugasanPegawaiController::class, 'view'])
        ->name('jlsss');
    Route::get('/{id}/tambah-organik', [PenugasanPegawaiController::class, 'create'])
        ->name('penugasan-organik-create');
    Route::post('{id}/tambah-organik/save', [PenugasanPegawaiController::class, 'store'])
        ->name('penugasan-organik-create-save');
    Route::get('/tugas-organik/edit/{id}', [PenugasanPegawaiController::class, 'edit'])
        ->name('penugasan-organik-edit-view');
    Route::put('/tugas-organik/edit/{id}', [PenugasanPegawaiController::class, 'update'])
        ->name('penugasan-organik-edit-save');
    Route::delete('/tugas-organik/delete/{id}', [PenugasanPegawaiController::class, 'delete'])
        ->name('penugasan-organik-delete');

    Route::get('/tugas-mitra/show/{id}', [PenugasanMitraController::class, 'show'])
        ->name('penugasan-mitra-detail');
    Route::get('/{id}/tambah-mitra', [PenugasanMitraController::class, 'create'])
        ->name('penugasan-mitra-create');
    Route::post('/{id}/tambah-mitra/save', [PenugasanMitraController::class, 'store'])
        ->name('penugasan-mitra-create-save');
    Route::get('/tugas-mitra/edit/{id}', [PenugasanMitraController::class, 'edit'])
        ->name('penugasan-mitra-edit-view');
    Route::put('/tugas-mitra/edit/{id}', [PenugasanMitraController::class, 'update'])
        ->name('penugasan-mitra-edit-save');
    Route::delete('/tugas-mitra/delete/{id}', [PenugasanMitraController::class, 'delete'])
        ->name('penugasan-mitra-delete');

    Route::get('/organik', [BebanKerjaOrganikController::class, 'index'])
        ->name('beban-kerja-organik');
    Route::get('/mitra', [BebanKerjaMitraController::class, 'index'])
        ->name('beban-kerja-mitra');
});

Route::group(['prefix' => 'manajemen-sampel'], function () {
    Route::get('/', [ManajemenSampelController::class, 'index'])
        ->name('sampel-index');
    Route::get('/details/{id}', [ManajemenSampelController::class, 'show'])
        ->name('sampel-show');

    Route::get('/edit/{id}', [ManajemenSampelController::class, 'edit'])
        ->name('sampel-edit-view');
    Route::put('/edit/{id}', [ManajemenSampelController::class, 'update'])
        ->name('sampel-edit-save');
    Route::post('/seeder/{id}', [ManajemenSampelController::class, 'seeder'])
        ->name('sampel-seeder');

    Route::get('/finalisasi/{id}', [ManajemenSampelController::class, 'finalisasi'])
        ->name('kegiatan-finalisasi');
    //
    //    Route::get('/assign/{id}', [ManajemenSampelController::class, 'assign'])
    //        ->name('sampel-assign-view');
    //    Route::post('/create', [ManajemenSampelController::class, 'store'])
    //        ->name('sampel-create-save');

    //    Route::delete('/delete/{id}', [ManajemenSampelController::class, 'delete'])
    //        ->name('sampel-delete');

});

Route::get('/manajemen-user-x', [MasterOrganikController::class, 'index'])
    ->name('master-organik');
Route::get('/manajemen-user', [MasterOrganikController::class, 'index'])
    ->name('manajemen-user');
Route::get('/manajemen-user/create', [MasterOrganikController::class, 'create'])
    ->name('master-organik-create-view');
Route::post('/manajemen-user/create', [MasterOrganikController::class, 'store'])
    ->name('master-organik-create-save');
Route::get('/manajemen-user/edit/{id}', [MasterOrganikController::class, 'edit'])
    ->name('master-organik-edit-view');
Route::put('/manajemen-user/edit/{id}', [MasterOrganikController::class, 'update'])
    ->name('master-organik-edit-save');
Route::delete('/manajemen-user/delete/{id}', [MasterOrganikController::class, 'delete'])
    ->name('master-organik-delete');

Route::group(['prefix' => 'master'], function () {
    Route::get('/kegiatan', [MasterKegiatanController::class, 'index'])
        ->name('master-kegiatan');
    Route::get('/kegiatan/create', [MasterKegiatanController::class, 'create'])
        ->name('master-kegiatan-create-view');
    Route::post('/kegiatan/create', [MasterKegiatanController::class, 'store'])
        ->name('master-kegiatan-create-save');
    Route::get('/kegiatan/edit/{id}', [MasterKegiatanController::class, 'edit'])
        ->name('master-kegiatan-edit-view');
    Route::put('/kegiatan/edit/{id}', [MasterKegiatanController::class, 'update'])
        ->name('master-kegiatan-edit-save');
    Route::delete('/kegiatan/delete/{id}', [MasterKegiatanController::class, 'delete'])
        ->name('master-kegiatan-delete');




    Route::get('/mitra', [MasterMitraController::class, 'index'])
        ->name('master-mitra');
    Route::get('/mitra/create', [MasterMitraController::class, 'create'])
        ->name('master-mitra-create-view');
    Route::post('/mitra/create', [MasterMitraController::class, 'store'])
        ->name('master-mitra-create-save');
    Route::get('/mitra/edit/{id}', [MasterMitraController::class, 'edit'])
        ->name('master-mitra-edit-view');
    Route::put('/mitra/edit/{id}', [MasterMitraController::class, 'update'])
        ->name('master-mitra-edit-save');
    Route::delete('/mitra/delete/{id}', [MasterMitraController::class, 'delete'])
        ->name('master-mitra-delete');


    Route::resource('perusahaan', MasterPerusahaanController::class)
        ->except(['show'])
        ->names([
            'index' => 'perusahaan-index',
            'create' => 'perusahaan-create-view',
            'store' => 'perusahaan-create-save',
            'edit' => 'perusahaan-edit-view',
            'update' => 'perusahaan-edit-save',
            'destroy' => 'perusahaan-destroy',
        ])->parameters([
            'perusahaan' => 'id'
        ]);
    Route::post('/perusahaan/seeder', [MasterPerusahaanController::class, 'seeder'])
        ->name('perusahaan-seeder');
});

Route::group(['prefix' => 'template'], function () {
    Route::get('/seeder-sampel', [DownloadController::class, 'sampel'])
        ->name('template-sampel');
    Route::get('/seeder-perusahaan', [DownloadController::class, 'perusahaan'])
        ->name('template-perusahaan');
});
