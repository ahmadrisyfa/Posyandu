<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar_hadirbayi;
use App\Models\Bayibalita;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;

class DaftarhadirController extends Controller
{
    public function index(Request $request)
    {
        $result = Daftar_hadirbayi::with('bayi', 'jadwal')->get();
        $bayibalita = Bayibalita::all();
        $jadwal = Jadwal::all();
        $q = $request->get('q');
        $data['result'] = Daftar_hadirbayi::where(function ($query) use ($q) {
            $query->where('id_dha', 'like', '%' . $q . '%');
            $query->orWhere('id_anak', 'like', '%' . $q . '%');
            $query->orWhere('status', 'like', '%' . $q . '%');
            $query->orWhere('ket', 'like', '%' . $q . '%');
        })->latest()->paginate(10);
        $data['q'] = $q;
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.daftarhadir',  $data, compact('result', 'jadwal'));
    }
    public function create()
    {

        $bayibalita = Bayibalita::all();
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.formdaftar_hadir', compact('bayibalita', 'jadwal'));
    }
    public function store(Request $request)
    {
        $errors = [
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => 'ID atau nama telah digunakan',
        ];
        $this->validate($request, [
            'id_anak' => 'required',
            'status' => 'required',
            'id_jadwal' => 'required',
            'ket' => 'required|max:100'
        ], $errors);
        Daftar_hadirbayi::create([
            'id_jadwal' => $request->id_jadwal,
            'id_anak' => $request->id_anak,
            'status' => $request->status,
            'ket' => $request->ket,
        ]);
        return redirect('/bayibalita/daftarhadir')->with('succes', 'Data berhasil disimpan');
    }
    public function edit(Daftar_hadirbayi $daftar_hadirbayi)
    {
        $bayibalita = Bayibalita::all();
        $jadwal = Jadwal::all();
        //$daftar_hadirbayi = Daftar_hadirbayi::with('bayi')->get();
        return view('bidan.bayibalita.formeditdaftar_hadir', compact('daftar_hadirbayi', 'bayibalita', 'jadwal'));
    }
    public function update(Daftar_hadirbayi $daftar_hadirbayi, Request $request)
    {
        $rules = [
            'id_anak' => 'required',
            'id_jadwal' => 'required',
            'status' => 'required',
            'ket' => 'required|max:100'
        ];

        $errors = [
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => 'ID atau nama telah digunakan',
        ];
        $this->validate($request, $rules, $errors);
        $daftar_hadirbayi->update($request->all());
        return redirect('/bayibalita/daftarhadir')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Daftar_hadirbayi $daftar_hadirbayi, Request $request)
    {

        $daftar_hadirbayi->delete();
        return redirect('/bayibalita/daftarhadir')->with('success', 'Data berhasil dihapus');
    }
    public function daftarhadir_pdf(Daftar_hadirbayi $daftar_hadirbayi, Request $request)
    {

        $daftar_hadirbayi = Daftar_hadirbayi::all();
        $pdf = PDF::loadview('bidan.bayibalita.daftarhadir_pdf', ['daftar_hadirbayi' => $daftar_hadirbayi], compact('daftar_hadirbayi'));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }
    public function cetakdaftarhadir(Request $request)
    {
        $selectedValue = $request->input('tanggal_posyandu_bayibalita');

        $daftar_hadirbayi = Daftar_hadirbayi::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->where('tanggal_posyandu_bayibalita', $selectedValue);
        })->get();


        return view('bidan.bayibalita.daftarhadir_pdf', compact('daftar_hadirbayi'));
    }
    public function cetakdaftarhadirtahun(Request $request)
    {
        $selectedValue = $request->input('tahun');

        $daftar_hadirbayi = Daftar_hadirbayi::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->whereYear('tanggal_posyandu_bayibalita', $selectedValue);
        })->get();


        return view('bidan.bayibalita.daftarhadir_pdf', compact('daftar_hadirbayi'));
    }
    public function cetakdaftarhadirbulan(Request $request)
    {
        $selectedValue = $request->input('bulan');

        $daftar_hadirbayi = Daftar_hadirbayi::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->whereMonth('tanggal_posyandu_bayibalita', $selectedValue);
        })->get();


        return view('bidan.bayibalita.daftarhadir_pdf', compact('daftar_hadirbayi'));
    }
}
