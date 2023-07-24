<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Obatmasuk;
use App\Models\Obatkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;
use PDF;

class ObatController extends Controller
{
    public function obat(Request $request)
    {   
        $q = $request->get('q');
        
        $data['result'] = Obat::where(function($query) use ($q){
            $query->where('id_obat', 'like', '%' . $q .'%');
            $query->orWhere('nama_obat', 'like', '%' . $q .'%');
            $query->orWhere('jenis_obat', 'like', '%' . $q .'%');
            $query->orWhere('sisa_obat', 'like', '%' . $q .'%');
            $query->orWhere('tgl_ed', 'like', '%' . $q .'%'); 
            $query->orWhere('status', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.obat.masterobat', $data);
    }
    public function pdf(Request $request)
    {
        
        $obat = Obat::all();
    	$pdf = PDF::loadview('bidan.obat.masterobat_pdf', ['obat'=>$obat]);
    	return $pdf->stream();
    }
    public function obat_index(Request $request)
    {    $q = $request->get('q');
        $data['result'] = Obat::where(function($query) use ($q){
            $query->where('id_obat', 'like', '%' . $q .'%');
            $query->orWhere('nama_obat', 'like', '%' . $q .'%');
            $query->orWhere('jenis_obat', 'like', '%' . $q .'%');
            $query->orWhere('sisa_obat', 'like', '%' . $q .'%');
            $query->orWhere('tgl_ed', 'like', '%' . $q .'%'); 
            $query->orWhere('status', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.obat.persediaanobat', $data);
    }
    public function stockopname(Request $request)
    {   
        $result = Obatmasuk::with('obatmasuk')
        ->orderBy('id_OM', 'ASC')->get();
        $obat = Obat::all();
        $q = $request->get('q');
        
        $data['result'] = Obatmasuk::where(function($query) use ($q){
            $query->where('id_obat', 'like', '%' . $q .'%');
            $query->orWhere('tgl_masuk', 'like', '%' . $q .'%');
            $query->orWhere('jumlah', 'like', '%' . $q .'%');
            $query->orWhere('tgl_ed', 'like', '%' . $q .'%'); 
        })->latest()->paginate(10); 
        return view('bidan.obat.stockopname', $data);
    }
    public function create()
    {   
        $obat = Obat::all();
        return view('bidan.obat.form', $obat);
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_obat' => 'required|max:50',
            'jenis_obat' => 'required|max:50',
            'sisa_obat' => 'required|numeric',
            'tgl_ed' => 'required',
            'status' => 'required'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Obat::create($request->all());
        return redirect('/obat')->with('succes', 'Data berhasil disimpan');
    }
    static function status($tgl_ed){
        $ed = new DateTime($tgl_ed);
        $today = new DateTime("today");
        if($ed < $today){
                return "ED";
        }else{
            return "Tersedia";
        }
    }
    public function edit(Obat $obat){
        return view('bidan.obat.formedit', compact('obat'));
    }
    public function update (Obat $obat, Request $request){
        
        $rules = [
            'nama_obat' => 'required|max:50',
            'jenis_obat' => 'required|max:50',
            'sisa_obat' => 'required|numeric',
            'tgl_ed' => 'required',
            'status' => 'required'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $obat->update($request->all());
        return redirect('/obat')->with('success', 'Data berhasil diubah');
    }
 
    public function destroy (Obat $obat, Request $request, ){
        $obat->delete();
        return redirect('/obat')->with('success', 'Data berhasil dihapus');
        
    }
    public function dataobat(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Obat::where(function($query) use ($q){
            $query->where('sisa_obat', '<', 10);
            $query->orWhere('status', '=', 'Habis');
            $query->orWhere('status', '=', 'Expired Date');
        })->latest()->paginate(); 
        
        $data['q'] = $q;
        return view('bidan.obat.dataobat', $data);
    }
    public function dataobat_pdf(Request $request)
    {
        $today = new DateTime("today");
        $obat = Obat::where('sisa_obat', '<', 10)->orWhere('status', '=', 'Habis')->orWhere('status', '=', 'Expired Date')->get();
    	$pdf = PDF::loadview('bidan.obat.dataobat_pdf', ['obat'=>$obat]);
    	return $pdf->stream();
    }

}
