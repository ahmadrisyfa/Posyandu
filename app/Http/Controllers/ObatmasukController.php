<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obatmasuk;
use App\Models\Obat;

class ObatmasukController extends Controller
{
    public function index(Request $request)
    {   $result = Obatmasuk::with('obatmasuk')
        ->orderBy('id_OM', 'ASC')->get();
        $obat = Obat::all();
        $q = $request->get('q');
        
        $data['result'] = Obatmasuk::where(function($query) use ($q){
            $query->where('id_obat', 'like', '%' . $q .'%');
            $query->orWhere('tgl_masuk', 'like', '%' . $q .'%');
            $query->orWhere('jumlah', 'like', '%' . $q .'%');
            $query->orWhere('tgl_ed', 'like', '%' . $q .'%'); 
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.obat.obatmasuk', $data);
    }
    public function create()
    {
        $obat = Obat::all();
        return view('bidan.obat.obatmasuk_form', compact('obat'));
    }
    public function store(Request $request)
    {
        $rules = [
            'id_obat' => 'required',
            'tgl_masuk' => 'required',
            'jumlah' => 'required',
            'tgl_ed' => 'required'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Obatmasuk::create($request->all());
        return redirect('/obatmasuk')->with('succes', 'Data berhasil disimpan');
    }
    public function edit(Obatmasuk $obatmasuk){
        $obat = Obat::all();
        return view('bidan.obat.obatmasuk_formedit', compact('obatmasuk', 'obat'));
    }
    public function update (Obatmasuk $obatmasuk, Request $request){
        
        $rules = [
            'id_obat' => 'required',
            'tgl_masuk' => 'required',
            'jumlah' => 'required',
            'tgl_ed' => 'required'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $obatmasuk->update($request->all());
        return redirect('/obatmasuk')->with('success', 'Data berhasil diubah');
    }
 
    public function destroy (Obatmasuk $obatmasuk, Request $request, ){
        $obatmasuk->delete();
        return redirect('/obatmasuk')->with('success', 'Data berhasil dihapus');
        
    }
}
