<?php

namespace App\Http\Controllers;

use App\Models\Bayibalita;
use App\Models\Daftar_hadirbayi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;
use PDF;

class BayibalitaController extends Controller
{
    
    public function bidan_bayibalita_index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Bayibalita::where(function($query) use ($q){
            $query->where('id_anak', 'like', '%' . $q .'%');
            $query->orWhere('nik_anak', 'like', '%' . $q .'%');
            $query->orWhere('no_kk', 'like', '%' . $q .'%');
            $query->orWhere('nama_anak', 'like', '%' . $q .'%');
            $query->orWhere('jk', 'like', '%' . $q .'%'); 
            $query->orWhere('tgl_lahir', 'like', '%' . $q .'%');
            $query->orWhere('nama_ayah', 'like', '%' . $q .'%');
            $query->orWhere('nama_ibu', 'like', '%' . $q .'%');
            $query->orWhere('alamat', 'like', '%' . $q .'%'); 
            $query->orWhere('kia', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
         
        return view('bidan.bayibalita.identitas', $data);
    }
    public function bidan_bayibalita_create()
    {
        return view('bidan.bayibalita.formidentitas');
    }
    public function bidan_bayibalita_store(Request $request)
    {
        $rules = [
            'id_anak' => 'required|unique:bayibalita|max:11',
            'nik_anak' => 'required|max:16|min:15',
            'no_kk' => 'required|max:16|min:15',
            'nama_anak' => 'required|max:50',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'nama_ayah' => 'required|max:50',
            'nama_ibu' => 'required|max:50',
            'alamat' => 'required|max:50',
            'kia' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, $rules, $errors);

        Bayibalita::create([ 
            'id_anak' =>$request->id_anak,
            'nik_anak' =>$request->nik_anak,
            'nama_anak' =>$request->nama_anak,
            'no_kk' =>$request->no_kk,
            'jk' =>$request->jk,
            'tgl_lahir' =>$request->tgl_lahir,
            'nama_ayah' =>$request->nama_ayah,
            'nama_ibu' =>$request->nama_ibu,
            'alamat' =>$request->alamat,
            'kia' =>$request->kia,
            'ket' =>$request->ket,
        ]);
        return redirect('/bayibalita')->with('succes', 'Data berhasil disimpan');
    }
    
    static function hitung_umur($tgl_lahir){
        $birthDate = new DateTime($tgl_lahir);
        $today = new DateTime("today");
        
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        if($y > 0){
            if($m == 0 && $d ==0){
                return $y." tahun";
            }else if($m == 0){
                return $y." tahun ".$d." hari";
            }else if($d == 0){
                return $y." tahun ".$m." bulan";
            }else{
                return $y." tahun ".$m." bulan ".$d." hari";
            }
        }else if($m > 0){
            if($y == 0 && $d ==0){
                return $m." bulan";
            }else if($y == 0){
                return $m." bulan ".$d." hari";
            }else if($d == 0){
                return $y." tahun ".$m." bulan";
            }else{
                return $y." tahun ".$m." bulan ".$d." hari";
            }
        }else{
            return $d." hari";
        }
    }
    static function umur_bulan($tgl_lahir){
        $birthDate = new DateTime($tgl_lahir);
        $today = new DateTime("today");
        
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        $umur_bulan = (($y*12) +$m);
        
        echo $umur_bulan . ' bulan';
        
    }
    static function rentang_umur($tgl_lahir){
        $birthDate = new DateTime($tgl_lahir);
        $today = new DateTime("today");
        
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        $umur_bulan = (($y*12) +$m);
        if($umur_bulan <= 5){
            echo "Umur 0-5 Bulan";
        }elseif($umur_bulan >=5 && $umur_bulan <=11){
            echo "Umur 6-11 Bulan" ; 
        }elseif($umur_bulan >=12 && $umur_bulan <=23){
            echo "Umur 12-23 Bulan";  
        }elseif($umur_bulan >=24 && $umur_bulan <= 59){
            echo "Umur 24-59 Bulan";
        }else{
            echo "Lulus";
        }
        
    }
    public function bidan_bayibalita_edit(Bayibalita $bayibalita){
        return view('bidan.bayibalita.formidentitas', compact('bayibalita'));
    }
    public function bidan_bayibalita_update (Bayibalita $bayibalita, Request $request){
        
        $rules = [
            'id_anak' => 'required|max:11',
            'nik_anak' => 'required||min:15|max:16',
            'no_kk' => 'required|max:16|min:15',
            'nama_anak' => 'required|max:50|',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'nama_ayah' => 'required|max:50',
            'nama_ibu' => 'required|max:50',
            'alamat' => 'required|max:50',
            'kia' => 'required',
            'ket' => 'required|max:100'
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $bayibalita->update($request->all());
        return redirect('/bayibalita')->with('success', 'Data berhasil diubah');  
    }
    public function bidan_bayibalita_detail(Bayibalita $bayibalita){
        return view('bidan.bayibalita.identitas_detail', compact('bayibalita'));
    }
    public function identitas_pdf(Request $request)
    {
        
        $bayibalita = Bayibalita::all();
    	$pdf = PDF::loadview('bidan.bayibalita.identitas_pdf', ['bayibalita'=>$bayibalita], compact('bayibalita'));
    	return $pdf->setPaper('a4', 'landscape')->stream();
    }
    
}
