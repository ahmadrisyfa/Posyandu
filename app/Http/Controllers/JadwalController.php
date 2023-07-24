<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JadwalController extends Controller
{
    public function index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Jadwal::where(function($query) use ($q){
            $query->where('id_jadwal', 'like', '%' . $q .'%');
            $query->orWhere('tanggal_posyandu_bayibalita', 'like', '%' . $q .'%');
            $query->orWhere('tanggal_posyandu_ibuhamil', 'like', '%' . $q .'%');
            $query->orWhere('bulan', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.jadwal.jadwal', $data);
    }
    public function create()
    {
        return view('bidan.jadwal.jadwal_form');
    }
    public function store(Request $request)
    {
        $config = [
            'table' => 'jadwal',
            'length' => 6,
            'prefix' => date('y')
        ];
        
        // now use it
        //$id = IdGenerator::generate($config);
        // output: 160001
        //$id = IdGenerator::generate(['table' => 'jadwal', 'length' => 10, 'prefix' =>date('y')]);
        $rules = [
            'tanggal_posyandu_bayibalita' => 'required',
            'tanggal_posyandu_ibuhamil' => 'required',
            'bulan' => 'required',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);
        Jadwal::create($request->all());
        return redirect('/jadwal')->with('succes', 'Data berhasil disimpan');
    }
    public function edit( Jadwal $jadwal){
        return view('bidan.jadwal.jadwal_form', compact('jadwal'));
    }
    public function update (Jadwal $jadwal, Request $request){
        
        $rules = [
            'tanggal_posyandu_bayibalita' => 'required',
            'tanggal_posyandu_ibuhamil' => 'required',
            'bulan' => 'required',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $jadwal->update($request->all());
        return redirect('/jadwal')->with('success', 'Data berhasil diubah');
    }
 
    public function destroy (Jadwal $jadwal, Request $request, ){
        $jadwal->delete();
        return redirect('/jadwal')->with('success', 'Data berhasil dihapus');
        
    }
}
