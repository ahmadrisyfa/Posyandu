<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan_ibu;
use App\Models\Daftar_hadiribu;
use App\Models\Ibuhamil;
use App\Models\Vaksin_ibu;
use App\Models\Jadwal;
use App\Models\Obat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Pemeriksaan_ibuController extends Controller
{
    public function pemeriksaan_index(Request $request)
    {
        $q = $request->get('q');
        $data['result'] = Pemeriksaan_ibu::where(function($query) use ($q){
            $query->where('id_periksa', 'like', '%' . $q .'%');
            $query->orWhere('id_dhi', 'like', '%' . $q .'%');
            $query->orWhere('id_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('id_jadwal', 'like', '%' . $q .'%');
            $query->orWhere('tanggal_posyandu_ibuhamil', 'like', '%' . $q .'%');
            $query->orWhere('tinggi_badan', 'like', '%' . $q .'%'); 
            $query->orWhere('lila_imt', 'like', '%' . $q .'%'); 
            $query->orWhere('hb_goldarah', 'like', '%' . $q .'%'); 
            $query->orWhere('tensi', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10);
        $data['q'] = $q;
        $result = Pemeriksaan_ibu::with('daftarhadiribu', 'ibuhamil', 'vaksin', 'jadwal', 'obat');
        return view('bidan.ibuhamil.pemeriksaan',  $data);
    }   
     public function create()
    {
        
        $daftar_hadiribu = Daftar_hadiribu::all();
        $ibuhamil = Ibuhamil::all();
        $vaksin_ibu = Vaksin_ibu::all();
        $jadwal = Jadwal::all();
        $obat = Obat::all();
        $pemeriksaan_ibu = Pemeriksaan_ibu::all();
        return view('bidan.ibuhamil.pemeriksaanform' , compact('daftar_hadiribu', 'ibuhamil', 'vaksin_ibu', 'jadwal', 'obat'));
    }
    public function store(Request $request)
    {   $rules = [
            'id_dhi' => 'required|unique:pemeriksaan_ibu',
            'id_ibu' => 'required',
            'id_vaksin' => 'required',
            'id_jadwal' => 'required',
            'tanggal_posyandu_ibuhamil' => 'required',
            'berat_badan' => 'required|max:5',
            'tinggi_badan' => 'required|max:5',
            'lila_imt' => 'required|max:10',
            'hb_goldarah' => 'required|max:10',
            'tensi' => 'required|max:7',
            'id_obat' => 'required',
            'jumlah' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => 'Nama telah digunakan',
        ];
        $this->validate($request, $rules, $errors);
        Pemeriksaan_ibu::create([
            'id_dhi' =>$request->id_dhi,
            'id_ibu' =>$request->id_ibu,
            'id_vaksin' =>$request->id_vaksin,
            'id_jadwal' =>$request->id_jadwal,
            'tanggal_posyandu_ibuhamil' => $request->tanggal_posyandu_ibuhamil,
            'berat_badan' =>$request->berat_badan,
            'tinggi_badan' =>$request->tinggi_badan,
            'lila_imt' =>$request->lila_imt,
            'hb_goldarah' =>$request->hb_goldarah,
            'tensi' =>$request->tensi,
            'id_obat' =>$request->id_obat,
            'jumlah' =>$request->jumlah,
            'ket' =>$request->ket,
            'umur_kehamilan' =>$request->umur_kehamilan,
        ]);
        return redirect('/ibuhamil/pemeriksaan')->with('succes', 'Data berhasil disimpan');
    }
    public function edit(Pemeriksaan_ibu $pemeriksaan_ibu){
        $daftar_hadiribu = Daftar_hadiribu::all();
        $ibuhamil = Ibuhamil::all();
        $vaksin_ibu = Vaksin_ibu::all();
        $jadwal = Jadwal::all();
        $obat = Obat::all();
        return view('bidan.ibuhamil.pemeriksaanform_edit', compact('pemeriksaan_ibu', 'daftar_hadiribu', 'ibuhamil', 'vaksin_ibu', 'jadwal', 'obat'));
    }
    public function update ( Pemeriksaan_ibu $pemeriksaan_ibu, Request $request){
        $rules = [
            'id_dhi' => 'required',
            'id_ibu' => 'required',
            'id_vaksin' => 'required',
            'id_jadwal' => 'required',
            'tanggal_posyandu_ibuhamil' => 'required',
            'berat_badan' => 'required|max:5',
            'tinggi_badan' => 'required|max:5',
            'lila_imt' => 'required|max:10',
            'hb_goldarah' => 'required|max:10',
            'tensi' => 'required|max:7',
            'id_obat' => 'required',
            'jumlah' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $pemeriksaan_ibu->update($request->all());
        return redirect('/ibuhamil/pemeriksaan')->with('success', 'Data berhasil diubah');
    }

    public function destroy ( Pemeriksaan_ibu $pemeriksaan_ibu ,Request $request){

        $pemeriksaan_ibu->delete();
        return redirect('/ibuhamil/pemeriksaan')->with('success', 'Data berhasil dihapus');
        
    }

    public function detail(Pemeriksaan_ibu $pemeriksaan_ibu){
        return view('bidan.ibuhamil.pemeriksaan_detail', compact('pemeriksaan_ibu'));
    }
}