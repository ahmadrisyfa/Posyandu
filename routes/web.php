<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ObatmasukController;
use App\Http\Controllers\ObatkeluarController;
use App\Http\Controllers\BayibalitaController;
use App\Http\Controllers\IbuhamilController;
use App\Http\Controllers\DaftarhadirController;
use App\Http\Controllers\DaftarhadiribuController;
use App\Http\Controllers\Pemeriksaan_ibuController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\VaksinController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PDF;
use App\Models\BayiBalita;
use App\Models\Daftar_hadirbayi;
use App\Models\Daftar_hadiribu;
use App\Models\Ibuhamil;
use App\Models\Pemeriksaan_ibu;
use App\Models\Penimbangan_anak;
use App\Models\Vaksin_anak;
use App\Models\Vaksin_ibu;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
}); //  jika user belum login

Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
}); // untuk bidan dan kader

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/user', [AuthController::class, 'user_index'])->name('user.index');
    Route::get('/obat/master', [ObatController::class, 'obat'])->name('obat.master');
    Route::get('/obat', [App\Http\Controllers\ObatController::class, 'obat_index'])->name('obat.index');
    Route::get('/bidan/pemeriksaan', [App\Http\Controllers\Pemeriksaan_ibuController::class, 'pemeriksaan_index'])->name('bidan.pemeriksaan');
    Route::get('/vaksin_anak', [VaksinController::class, 'vaksinanak_index'])->name('vaksinanak.index');
    Route::get('/vaksin_ibu', [VaksinController::class, 'vaksinibu_index'])->name('vaksinibu.index');
    Route::get('/obat', [ObatController::class, 'obat_index'])->name('obat.index');
    Route::get('/obat/dataobat', [ObatController::class, 'dataobat'])->name('obat.dataobat');
});
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/bayibalita/penimbangan', [PenimbanganController::class, 'index'])->name('bidan.penimbangan');
});
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {

    Route::get('/bayibalita/daftarhadir', [DaftarhadirController::class, 'index'])->name('bidan.daftarhadir');
    Route::get('/ibuhamil/daftar_hadiribu', [DaftarhadiribuController::class, 'daftarhadir_index'])->name('daftar_hadiribu.indexbidan');
});
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::get('/bidan', [BidanController::class, 'index'])->name('bidan.index');
    Route::get('/bayibalita/daftarhadir', [DaftarhadirController::class, 'index'])->name('bidan.daftarhadir');
    Route::get('/ibuhamil/daftar_hadiribu', [DaftarhadiribuController::class, 'daftarhadir_index'])->name('daftar_hadiribu.indexbidan');
});
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::get('/bidan', [BidanController::class, 'index'])->name('bidan.index');
    Route::get('/bayibalita/daftarhadir', [DaftarhadirController::class, 'index'])->name('bidan.daftarhadir');
    Route::get('/ibuhamil/daftar_hadiribu', [DaftarhadiribuController::class, 'daftarhadir_index'])->name('daftar_hadiribu.indexbidan');
}); // untuk kader

//User
Route::get('/user', [AuthController::class, 'user_index'])->name('user.index');
Route::get('/user/create', [AuthController::class, 'user_create']);
Route::post('/user/create', [AuthController::class, 'user_store']);
Route::get('/user/{user}/edit', [AuthController::class, 'user_edit'])->name('user.edit');
Route::PATCH('/user/{user}', [AuthController::class, 'user_update'])->name('user_update');
Route::delete('/user/{user}', [AuthController::class, 'user_destroy'])->name('user.destroy');

//OBAT
Route::get('/obat/master', [ObatController::class, 'obat'])->name('obat.master');
Route::get('/obat/pdf', [ObatController::class, 'pdf'])->name('obat.pdf');
Route::get('/obat', [ObatController::class, 'obat_index'])->name('obat.index');
Route::get('/stockopname', [ObatController::class, 'stockopname'])->name('obat.stockopname');
Route::get('/obat/create', [ObatController::class, 'create']);
Route::post('/obat/create', [ObatController::class, 'store']);
Route::get('/obat/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::PATCH('/obat/{obat}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{obat}', [ObatController::class, 'destroy'])->name('obat.destroy');
Route::get('/obat/dataobat', [ObatController::class, 'dataobat'])->name('obat.dataobat');
Route::get('/obat/dataobat_pdf', [ObatController::class, 'dataobat_pdf'])->name('obat.dataobat_pdf');

Route::get('/obatmasuk', [ObatmasukController::class, 'index'])->name('obatmasuk.index');
Route::get('/obatmasuk/create', [ObatmasukController::class, 'create']);
Route::post('/obatmasuk/create', [ObatmasukController::class, 'store']);
Route::get('/obatmasuk/{obatmasuk}/edit', [ObatmasukController::class, 'edit'])->name('obatmasuk.edit');
Route::PATCH('/obatmasuk/{obatmasuk}', [ObatmasukController::class, 'update'])->name('obatmasuk.update');
Route::delete('/obatmasuk/{obatmasuk}', [ObatmasukController::class, 'destroy'])->name('obatmasuk.destroy');

Route::get('/obatkeluar', [ObatkeluarController::class, 'index_keluar'])->name('obatkeluar.index');
Route::get('/obatkeluar/create', [ObatkeluarController::class, 'create']);
Route::post('/obatkeluar/create', [ObatkeluarController::class, 'store']);
Route::get('/obatkeluar/{obatkeluar}/edit', [ObatkeluarController::class, 'edit'])->name('obatkeluar.edit');
Route::PATCH('/obatkeluar/{obatkeluar}', [ObatkeluarController::class, 'update'])->name('obatkeluar.update');
Route::delete('/obatkeluar/{obatkeluar}', [ObatkeluarController::class, 'destroy'])->name('obatkeluar.destroy');


//jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/create', [JadwalController::class, 'create']);
Route::post('/jadwal/create', [JadwalController::class, 'store']);
Route::get('/jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::PATCH('/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');


//Bayibalita
Route::get('/bayibalita', [BayibalitaController::class, 'bidan_bayibalita_index'])->name('bayibalita.indexbidan');
Route::get('/bayibalita/create', [BayibalitaController::class, 'bidan_bayibalita_create']);
Route::post('/bayibalita/create', [BayibalitaController::class, 'bidan_bayibalita_store']);
Route::get('/bayibalita/{bayibalita}/edit', [BayibalitaController::class, 'bidan_bayibalita_edit'])->name('bidanbayibalita.edit');
Route::PATCH('/bayibalita/{bayibalita}', [BayibalitaController::class, 'bidan_bayibalita_update'])->name('bidanbayibalita.update');
Route::get('/bayibalita/{bayibalita}/detail', [BayibalitaController::class, 'bidan_bayibalita_detail'])->name('bidanbayibalita.detail');
Route::get('/bayibalita/identitas', [BayibalitaController::class, 'identitas_pdf'])->name('identitasanak_pdf');

//cetak daftarhadir bayibaliata
Route::post('bayibalita/cetak-data-daftarhadir', [DaftarhadirController::class, 'cetakdaftarhadir']);
Route::post('bayibalita/cetak-data-daftarhadir-tahun', [DaftarhadirController::class, 'cetakdaftarhadirtahun']);
Route::post('bayibalita/cetak-data-daftarhadir-bulan', [DaftarhadirController::class, 'cetakdaftarhadirbulan']);

//daftarhadir bayibaliata
Route::get('/bayibalita/daftarhadir', [DaftarhadirController::class, 'index'])->name('bidan.daftarhadir');
Route::get('/bayibalita/daftarhadir/create', [DaftarhadirController::class, 'create'])->name('bidan.daftarhadir_create');
Route::post('/bayibalita/daftarhadir/create', [DaftarhadirController::class, 'store']);
Route::get('/bayibalita/daftarhadir/{daftar_hadirbayi}/edit', [DaftarhadirController::class, 'edit'])->name('bidan.daftarhadir_edit');
Route::PATCH('/bayibalita/daftarhadir/{daftar_hadirbayi}', [DaftarhadirController::class, 'update'])->name('bidan.daftarhadir_update');
Route::delete('/bayibalita/daftarhadir/{daftar_hadirbayi}', [DaftarhadirController::class, 'destroy'])->name('bidan.daftarhadir_destroy');
Route::get('/bayibalita/daftar_hadir', [DaftarhadirController::class, 'daftarhadir_pdf'])->name('daftarhadiranak_pdf');


//penimbangan
Route::get('/bayibalita/penimbangan', [PenimbanganController::class, 'index'])->name('bidan.penimbangan');
Route::get('/bayibalita/penimbangan_index', [PenimbanganController::class, 'penimbangan'])->name('bidan.penimbangan_index');
Route::get('/bayibalita/penimbangan/create', [PenimbanganController::class, 'create'])->name('bidan.penimbangan_create');
Route::post('/bayibalita/penimbangan/create', [PenimbanganController::class, 'store']);
Route::get('/bayibalita/penimbangan/{penimbangan_anak}/edit', [PenimbanganController::class, 'edit'])->name('bidan.penimbangan_edit');
Route::PATCH('/bayibalita/penimbangan/{penimbangan_anak}', [PenimbanganController::class, 'update'])->name('bidan.penimbangan_update');
Route::delete('/bayibalita/penimbangan/{penimbangan_anak}', [PenimbanganController::class, 'destroy'])->name('bidan.penimbangan_destroy');
Route::get('/bayibalita/penimbangan/{penimbangan_anak}/detail', [PenimbanganController::class, 'detail'])->name('bidan.penimbangan_detail');
Route::get('/get-tgl-lahir/{id_anak}', function ($id_anak) {
    $bayiBalita = BayiBalita::find($id_anak);

    if ($bayiBalita) {
        return response()->json([
            'tgl_lahir' => $bayiBalita->tgl_lahir
        ]);
    } else {
        return response()->json([
            'error' => 'Data anak tidak ditemukan'
        ], 404);
    }
});
Route::get('/get-berat-badan/{id_anak}', function ($id_anak) {
    $anak = BayiBalita::find($id_anak);

    if ($anak) {
        $penimbangan = Penimbangan_anak::where('id_anak', $id_anak)->latest()->first();

        if ($penimbangan) {
            $berat_badan = $penimbangan->berat_badan;
            $id_vaksin = $penimbangan->id_vaksin;

            $vaksin = Vaksin_anak::find($id_vaksin);
            $nama_vaksin = ($vaksin) ? $vaksin->nama_vaksin : '';

            return response()->json(['berat_badan' => $berat_badan, 'id_vaksin' => $id_vaksin, 'nama_vaksin' => $nama_vaksin]);
        }
    }

    return response()->json(['error' => 'Anak not found.'], 404);
});
Route::get('/get-daftar-hadir-bayi/{id_dha}', function ($id_adha) {
    $anak = Daftar_hadirbayi::find($id_adha);

    if ($anak) {
        $data['anak'] = BayiBalita::find($anak->id_anak);
        $penimbangan = Penimbangan_anak::where('id_anak', $anak->id_anak)->latest()->first();
        if ($penimbangan) {

            $id_vaksin = $penimbangan->id_vaksin;
            $data['vaksin'] = Vaksin_anak::find($id_vaksin);
        }
        $data['penimbangan'] = $penimbangan;
        return response()->json(['data' => $data]);
    }

    return response()->json(['status' => '200'], 404);
});
Route::get('/get-daftar-hadir-ibu/{id_dhi}', function ($id_adhi) {
    $ibu = Daftar_hadiribu::find($id_adhi);

    if ($ibu) {
        $data['ibu'] = Ibuhamil::find($ibu->id_ibu);
        $pemeriksaan = Pemeriksaan_ibu::where('id_ibu', $ibu->id_ibu)->latest()->first();
        if ($pemeriksaan) {

            $id_vaksin = $pemeriksaan->id_vaksin;
            $data['vaksin'] = Vaksin_ibu::find($id_vaksin);
        }
        $data['pemeriksaan'] = $pemeriksaan;
        return response()->json(['data' => $data]);
    }

    return response()->json(['status' => '200'], 404);
});

Route::get('/vaksin_anak', [VaksinController::class, 'vaksinanak_index'])->name('vaksinanak.index');
Route::get('/vaksin_anak/create', [VaksinController::class, 'vaksinanak_create']);
Route::post('/vaksin_anak/create', [VaksinController::class, 'vaksinanak_store']);
Route::get('/vaksin_anak/{vaksin_anak}/edit', [VaksinController::class, 'vaksinanak_edit'])->name('vaksinanak.edit');
Route::PATCH('/vaksin_anak/{vaksin_anak}', [VaksinController::class, 'vaksinanak_update'])->name('vaksinanak.update');
Route::delete('/vaksin_anak/{vaksin_anak}', [VaksinController::class, 'vaksinanak_destroy'])->name('vaksinanak.destroy');

//IBU HAMIL
//Ibuhamil -> identitas
Route::get('/ibuhamil', [IbuhamilController::class, 'bidan_index'])->name('ibuhamil.indexbidan');
Route::get('/ibuhamil/create', [IbuhamilController::class, 'bidan_create']);
Route::post('/ibuhamil/create', [IbuhamilController::class, 'bidan_store']);
Route::get('/ibuhamil/{ibuhamil}/edit', [IbuhamilController::class, 'bidan_edit'])->name('bidanibuhamil.edit');
Route::PATCH('/ibuhamil/{ibuhamil}', [IbuhamilController::class, 'bidan_update'])->name('bidanibuhamil.update');
Route::get('/ibuhamil/{ibuhamil}/detail', [IbuhamilController::class, 'bidan_detail'])->name('bidanibuhamil.detail');
Route::get('/ibuhamil/identitas', [IbuhamilController::class, 'identitasibu_pdf'])->name('identitasibu_pdf');

//cetak daftarhadir ibu hamil
Route::post('ibuhamil/cetak-data-daftar_hadiribu', [DaftarhadiribuController::class, 'cetakdaftarhadir']);
Route::post('ibuhamil/cetak-data-daftar_hadiribu-tahun', [DaftarhadiribuController::class, 'cetakdaftarhadirtahun']);
Route::post('ibuhamil/cetak-data-daftar_hadiribu-bulan', [DaftarhadiribuController::class, 'cetakdaftarhadirbulan']);

//daftarhadir ibu hamil
Route::get('/ibuhamil/daftar_hadiribu', [DaftarhadiribuController::class, 'daftarhadir_index'])->name('daftar_hadiribu.indexbidan');
Route::get('/ibuhamil/daftar_hadiribu/create', [DaftarhadiribuController::class, 'daftarhadir_create']);
Route::post('/ibuhamil/daftar_hadiribu/create', [DaftarhadiribuController::class, 'daftarhadir_store']);
Route::get('/ibuhamil/daftar_hadiribu/{daftar_hadiribu}/edit', [DaftarhadiribuController::class, 'daftarhadir_edit'])->name('daftar_hadiribu.edit');
Route::PATCH('/ibuhamil/daftar_hadiribu/{daftar_hadiribu}', [DaftarhadiribuController::class, 'daftarhadir_update'])->name('daftar_hadiribu.update');
Route::delete('/ibuhamil/daftar_hadiribu/{daftar_hadiribu}', [DaftarhadiribuController::class, 'daftarhadir_destroy'])->name('daftar_hadiribu.destroy');
Route::get('/ibuhamil/daftar_hadiribu_pdf', [DaftarhadiribuController::class, 'daftarhadir_ibu_pdf'])->name('daftarhadir_pdf');

//pemeriksaan ibu hamil 
Route::get('/ibuhamil/pemeriksaan', [Pemeriksaan_ibuController::class, 'pemeriksaan_index'])->name('bidan.pemeriksaan');
Route::get('/ibuhamil/pemeriksaan/create', [Pemeriksaan_ibuController::class, 'create'])->name('bidan.pemeriksaan_create');
Route::post('/ibuhamil/pemeriksaan/create', [Pemeriksaan_ibuController::class, 'store']);
Route::get('/ibuhamil/pemeriksaan/{pemeriksaan_ibu}/edit', [Pemeriksaan_ibuController::class, 'edit'])->name('bidan.pemeriksaan_edit');
Route::PATCH('/ibuhamil/pemeriksaan/{pemeriksaan_ibu}', [Pemeriksaan_ibuController::class, 'update'])->name('bidan.pemeriksaan_update');
Route::delete('/ibuhamil/pemeriksaan/{pemeriksaan_ibu}', [Pemeriksaan_ibuController::class, 'destroy'])->name('bidan.pemeriksaan_destroy');
Route::get('/ibuhamil/pemeriksaan/{pemeriksaan_ibu}/detail', [Pemeriksaan_ibuController::class, 'detail'])->name('bidan.pemeriksaan_detail');

Route::get('/vaksin_ibu', [VaksinController::class, 'vaksinibu_index'])->name('vaksinibu.index');
Route::get('/vaksin_ibu/create', [VaksinController::class, 'vaksinibu_create']);
Route::post('/vaksin_ibu/create', [VaksinController::class, 'vaksinibu_store']);
Route::get('/vaksin_ibu/{vaksin_ibu}/edit', [VaksinController::class, 'vaksinibu_edit'])->name('vaksinibu.edit');
Route::PATCH('/vaksin_ibu/{vaksin_ibu}', [VaksinController::class, 'vaksinibu_update'])->name('vaksinibu.update');
Route::delete('/vaksin_ibu/{vaksin_ibu}', [VaksinController::class, 'vaksinibu_destroy'])->name('vaksinibu.destroy');




//daftarhadirsatu bukan
Route::prefix('kader/daftarhadir')->group(function () {
    Route::get('/', [App\Http\Controllers\DaftarhadirController::class, 'daftarhadir'])->name('kader.daftarhadir');
    Route::get('delete/{daftarhadir}', [App\Http\Controllers\DaftarhadirControllerController::class, 'delete_daftarhadir'])->name('kader.delete_daftarhadir');
    Route::post('create', [App\Http\Controllers\DaftarhadirControllerController::class, 'create_daftarhadir'])->name('kader.create_daftarhadir');
    Route::post('update', [App\Http\Controllers\DaftarhadirControllerController::class, 'update_daftarhadir'])->name('kader.update_daftarhadir');
});
//
//Route::resource('/daftarhadir', App\Http\Controllers\DaftarhadirController::class);

Route::get('/bidan/daftar_hadir', [App\Http\Controllers\DaftarhadirController::class, 'bidan_daftarhadir_index'])->name('bidan.daftar_hadir');
Route::get('/bidan/daftar_hadirbayi/{daftar_hadirbayi}/edit', [DaftarhadirController::class, 'bidan_daftarhadir_edit'])->name('daftar_hadirbayi.edit');
Route::PATCH('/bidan/daftar_hadirbayi/{daftar_hadirbayi}', [DaftarhadirController::class, 'bidan_daftarhadir_update'])->name('daftar_hadirbayi.update');
Route::delete('/bidan/daftar_hadirbayi/{daftar_hadirbayi}', [DaftarhadirController::class, 'bidan_daftarhadir_destroy'])->name('daftar_hadirbayi.destroy');
