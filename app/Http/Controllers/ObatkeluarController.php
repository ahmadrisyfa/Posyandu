<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obatkeluar;
use App\Models\Obat;

class ObatkeluarController extends Controller
{
    public function index_keluar(Request $request)
    {   $result = Obatkeluar::with('obatkeluar')
        ->orderBy('id_OK', 'ASC')->get();
        $obat = Obat::all();
        $q = $request->get('q');
        
        $data['result'] = Obatkeluar::where(function($query) use ($q){
            $query->where('id_obat', 'like', '%' . $q .'%');
            $query->orWhere('tgl_keluar', 'like', '%' . $q .'%');
            $query->orWhere('jumlah', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.obat.obatkeluar', $data,);
    }
    public function create()
    {
        $obat = Obat::all();
        return view('bidan.obat.obatkeluar_form', compact('obat'));
    }
    public function store(Request $request)
    {
        $rules = [
            'id_obat' => 'required',
            'tgl_keluar' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Obatkeluar::create($request->all());
        return redirect('/obatkeluar')->with('succes', 'Data berhasil disimpan');
    }
    public function edit(Obatkeluar $obatkeluar){
        $obat = Obat::all();
        return view('bidan.obat.obatkeluar_formedit', compact('obatkeluar', 'obat'));
    }
    public function update (Obatkeluar $obatkeluar, Request $request){
        
        $rules = [
            'id_obat' => 'required',
            'tgl_keluar' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $obatkeluar->update($request->all());
        return redirect('/obatkeluar')->with('success', 'Data berhasil diubah');
    }
 
    public function destroy (Obatkeluar $obatkeluar, Request $request, ){
        $obatkeluar->delete();
        return redirect('/obatkeluar')->with('success', 'Data berhasil dihapus');
        
    }
}
