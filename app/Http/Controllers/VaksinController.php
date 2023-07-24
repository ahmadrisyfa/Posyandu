<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaksin_anak;
use App\Models\Vaksin_ibu;

class VaksinController extends Controller
{
    public function vaksinanak_index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Vaksin_anak::where(function($query) use ($q){
            $query->where('id_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('nama_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.bayibalita.vaksin', $data);
    }
    public function vaksinanak_create()
    {
        return view('bidan.bayibalita.vaksin_form');
    }
    public function vaksinanak_store(Request $request)
    {
        $rules = [
            'nama_vaksin' => 'required|unique:vaksin_anak|max:50',
            'ket' => 'required|max:100',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);
        Vaksin_anak::create($request->all());
        return redirect('/vaksin_anak')->with('succes', 'Data berhasil disimpan');
    }
    public function vaksinanak_edit( Vaksin_anak $vaksin_anak){
        return view('bidan.bayibalita.vaksin_form', compact('vaksin_anak'));
    }
    public function vaksinanak_update (Vaksin_anak $vaksin_anak, Request $request){
        
        $rules = [
            'nama_vaksin' => 'required|max:50',
            'ket' => 'required|max:100',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $vaksin_anak->update($request->all());
        return redirect('/vaksin_anak')->with('success', 'Data berhasil diubah');
    }
 
    public function vaksinanak_destroy (Vaksin_anak $vaksin_anak, Request $request, ){
        $vaksin_anak->delete();
        return redirect('/vaksin_anak')->with('success', 'Data berhasil dihapus');
        
    }


    //vaksin ibu
    public function vaksinibu_index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Vaksin_ibu::where(function($query) use ($q){
            $query->where('id_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('nama_vaksin', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.ibuhamil.vaksin', $data);
    }
    public function vaksinibu_create()
    {
        return view('bidan.ibuhamil.vaksin_form');
    }
    public function vaksinibu_store(Request $request)
    {
        $rules = [
            'nama_vaksin' => 'required|unique:vaksin_ibu|max:50',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Vaksin_ibu::create([ 
            'nama_vaksin' =>$request->nama_vaksin,
            'ket' =>$request->ket,
        ]);
        return redirect('/vaksin_ibu')->with('succes', 'Data berhasil disimpan');
    }
    public function vaksinibu_edit( Vaksin_ibu $vaksin_ibu){
        return view('bidan.ibuhamil.vaksin_form', compact('vaksin_ibu'));
    }
    public function vaksinibu_update (Vaksin_ibu $vaksin_ibu, Request $request){
        
        $rules = [
            'nama_vaksin' => 'required|max:50',
            'ket' => 'required|max:100',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $vaksin_ibu->update($request->all());
        return redirect('/vaksin_ibu')->with('success', 'Data berhasil diubah');
    }
 
    public function vaksinibu_destroy (Vaksin_ibu $vaksin_ibu, Request $request, ){
        $vaksin_ibu->delete();
        return redirect('/vaksin_ibu')->with('success', 'Data berhasil dihapus');
        
    }
}
