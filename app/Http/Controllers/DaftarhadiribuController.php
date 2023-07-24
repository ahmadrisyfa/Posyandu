<?php

namespace App\Http\Controllers;

use App\Models\Ibuhamil;
use App\Models\Daftar_hadiribu;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use PDF;
use DB;

class DaftarhadiribuController extends Controller
{
    public function daftarhadir_index(Request $request)
    {
        $q = $request->get('q');

        $data['result'] = Daftar_hadiribu::where(function ($query) use ($q) {
            $query->where('id_dhi', 'like', '%' . $q . '%');
            $query->orWhere('id_ibu', 'like', '%' . $q . '%');
            $query->orWhere('status', 'like', '%' . $q . '%');
            $query->orWhere('id_jadwal', 'like', '%' . $q . '%');
            $query->orWhere('ket', 'like', '%' . $q . '%');
        })->latest()->paginate(10);

        $data['q'] = $q;
        $result = Daftar_hadiribu::with('ibu', 'jadwal');
        $jadwal = Jadwal::all();
        return view('bidan.ibuhamil.daftar_hadir', $data, compact('result', 'jadwal'));
    }
    public function daftarhadir_create()
    {
        $ibuhamil = Ibuhamil::all();
        $jadwal = Jadwal::all();
        return view('bidan.ibuhamil.daftar_hadirform', compact('ibuhamil', 'jadwal'));
    }
    public function daftarhadir_store(Request $request)
    {
        $rules = [
            'id_jadwal' => 'required',
            'id_ibu' => 'required',
            'status' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors = [
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => 'ID atau Nama telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Daftar_hadiribu::create([
            'id_jadwal' => $request->id_jadwal,
            'id_ibu' => $request->id_ibu,
            'status' => $request->status,
            'ket' => $request->ket,
        ]);

        return redirect('/ibuhamil/daftar_hadiribu')->with('succes', 'Data berhasil disimpan');
    }
    public function daftarhadir_edit(Daftar_hadiribu $daftar_hadiribu)
    {
        $ibuhamil = Ibuhamil::all();
        $jadwal = Jadwal::all();
        return view('bidan.ibuhamil.daftar_hadiredit', compact('daftar_hadiribu', 'ibuhamil', 'jadwal'));
    }
    public function daftarhadir_update(Daftar_hadiribu $daftar_hadiribu, Request $request)
    {

        $rules = [
            'id_jadwal' => 'required',
            'id_ibu' => 'required|max:11',
            'status' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors = [
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $daftar_hadiribu->update($request->all());
        return redirect('/ibuhamil/daftar_hadiribu')->with('success', 'Data berhasil diubah');
    }

    public function daftarhadir_destroy(Daftar_hadiribu $daftar_hadiribu, Request $request)
    {

        $daftar_hadiribu->delete();
        return redirect('/ibuhamil/daftar_hadiribu')->with('success', 'Data berhasil dihapus');
    }
    public function daftarhadir_ibu_pdf(Daftar_hadiribu $daftar_hadiribu)
    {

        $daftar_hadiribu = Daftar_hadiribu::all();
        $pdf = PDF::loadview('bidan.ibuhamil.daftarhadir_Ibu_pdf', ['daftar_hadiribu' => $daftar_hadiribu]);
        return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function cetakdaftarhadir(Request $request)
    {
        $selectedValue = $request->input('tanggal_posyandu_ibuhamil');

        $daftar_hadiribu = Daftar_hadiribu::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->where('tanggal_posyandu_ibuhamil', $selectedValue);
        })->get();


        return view('bidan.ibuhamil.daftarhadir_Ibu_pdf', compact('daftar_hadiribu'));
    }
    public function cetakdaftarhadirtahun(Request $request)
    {
        $selectedValue = $request->input('tahun');

        $daftar_hadiribu = Daftar_hadiribu::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->whereYear('tanggal_posyandu_ibuhamil', $selectedValue);
        })->get();


        return view('bidan.ibuhamil.daftarhadir_Ibu_pdf', compact('daftar_hadiribu'));
    }
    public function cetakdaftarhadirbulan(Request $request)
    {
        $selectedValue = $request->input('bulan');

        $daftar_hadiribu = Daftar_hadiribu::whereHas('jadwal', function ($query) use ($selectedValue) {
            $query->whereMonth('tanggal_posyandu_ibuhamil', $selectedValue);
        })->get();


        return view('bidan.ibuhamil.daftarhadir_Ibu_pdf', compact('daftar_hadiribu'));
    }
}

