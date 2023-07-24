<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penimbangan_anak;
use App\Models\Daftar_hadirbayi;
use App\Models\Bayibalita;
use App\Models\Vaksin_anak;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PenimbanganController extends Controller
{
    public function penimbangan(Request $request)
    {
        $result = Daftar_hadirbayi::with('bayi', 'jadwal')->get();
        $bayibalita = Bayibalita::all();
        $jadwal = Jadwal::all();
        $q = $request->get('q');
        $data['result'] = Daftar_hadirbayi::where(function($query) use ($q){
            $query->where('id_dha', 'like', '%' . $q .'%');
            $query->orWhere('id_anak', 'like', '%' . $q .'%');
            $query->orWhere('status', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%'); 
        })->latest()->paginate(10);
        $data['q'] = $q;
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.penimbangan_index',  $data);
    }
    
    public function tambah(Penimbangan_anak $penimbangan_anak){
        $daftar_hadirbayi = Daftar_hadirbayi::all();
        $bayibalita = Bayibalita::all();
        $vaksin_anak = Vaksin_anak::all();
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.penimbanganform_tambah' , compact('penimbangan_anak' ,'daftar_hadirbayi', 'bayibalita', 'vaksin_anak', 'jadwal'));
    }
    public function index(Request $request)
    {
        $q = $request->get('q');
        $data['result'] = Penimbangan_anak::where(function($query) use ($q){
            $query->where('id_timbang', 'like', '%' . $q .'%');
            $query->orWhere('id_dha', 'like', '%' . $q .'%');
            $query->orWhere('id_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('id_anak', 'like', '%' . $q .'%');
            $query->orWhere('tanggal_posyandu_bayibalita', 'like', '%' . $q .'%');
            $query->orWhere('jk', 'like', '%' . $q .'%'); 
            $query->orWhere('id_jadwal', 'like', '%' . $q .'%');
            $query->orWhere('jk', 'like', '%' . $q .'%'); 
            $query->orWhere('berat_badan', 'like', '%' . $q .'%'); 
            $query->orWhere('st', 'like', '%' . $q .'%'); 
        })->latest()->paginate(10);
        $data['q'] = $q;
        $result = Penimbangan_anak::with('daftarhadir', 'bayibalita', 'vaksin', 'jadwal');
        return view('bidan.bayibalita.penimbangan',  $data);
    }   

     public function create()
    {
        $penimbangan_anak = Penimbangan_anak::all();
        $daftar_hadirbayi = Daftar_hadirbayi::all();
        $bayibalita = Bayibalita::all();
        $vaksin_anak = Vaksin_anak::all();
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.penimbanganform', compact('daftar_hadirbayi', 'bayibalita','vaksin_anak', 'jadwal'));
    }
    public function store(Request $request)
    {   $rules = [
            'id_dha' => 'required|unique:penimbangan_anak',
            'id_anak' => 'required',
            'id_vaksin' => 'required',
            'tanggal_posyandu_bayibalita' => 'required',
            'id_jadwal' => 'required',
            'jk' => 'required',
            'berat_badan' => 'required|max:5',
            'st' => 'required|max:5',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => 'ID atau Nama telah digunakan',
        ];
        $this->validate($request, $rules, $errors);
        Penimbangan_anak::create([
            'id_dha' =>$request->id_dha,
            'id_anak' =>$request->id_anak,
            'id_vaksin' =>$request->id_vaksin,
            'tanggal_posyandu_bayibalita' =>$request->tanggal_posyandu_bayibalita,
            'id_jadwal' =>$request->id_jadwal,
            'jk' =>$request->jk,
            'berat_badan' =>$request->berat_badan,
            'st' =>$request->st,
            'ket' =>$request->ket,
            'umur' =>$request->umur,
        ]);
        return redirect('/bayibalita/penimbangan')->with('succes', 'Data berhasil disimpan');
    }
    public function edit( Penimbangan_anak $penimbangan_anak ){
        $daftar_hadirbayi = Daftar_hadirbayi::all();
        $bayibalita = Bayibalita::all();
        $vaksin_anak = Vaksin_anak::all();
        $jadwal = Jadwal::all();
        return view('bidan.bayibalita.penimbanganform_edit' , compact('penimbangan_anak' ,'daftar_hadirbayi', 'bayibalita', 'vaksin_anak', 'jadwal'));
    }
    public function update ( Penimbangan_anak $penimbangan_anak, Request $request){
        $rules = [
            'id_dha' => 'required',
            'id_anak' => 'required',
            'id_vaksin' => 'required',
            'tanggal_posyandu_bayibalita' => 'required',
            'id_jadwal' => 'required',
            'jk' => 'required',
            'berat_badan' => 'required|max:5',
            'st' => 'required|max:5',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);
        $penimbangan_anak->update($request->all());
        return redirect('/bayibalita/penimbangan')->with('success', 'Data berhasil diubah');
    }

    public function destroy (Penimbangan_anak $penimbangan_anak, Request $request){

        $penimbangan_anak->delete();
        return redirect('/bayibalita/penimbangan')->with('success', 'Data berhasil dihapus');
        
    }
    public function detail(Penimbangan_anak $penimbangan_anak){
        return view('bidan.bayibalita.penimbangan_detail', compact('penimbangan_anak'));
    }
}