<?php

namespace App\Http\Controllers;

use App\Models\Ibuhamil;
use App\Models\Daftar_hadiribu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;
use PDF;

class IbuhamilController extends Controller
{
    public function bidan_index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = Ibuhamil::where(function($query) use ($q){
            $query->where('id_ibu', 'like', '%' . $q .'%');
            $query->orWhere('nik_ibu', 'like', '%' . $q .'%');
            $query->orWhere('no_kk', 'like', '%' . $q .'%');
            $query->orWhere('nama_ibu', 'like', '%' . $q .'%');
            $query->orWhere('tgl_lahir', 'like', '%' . $q .'%');
            $query->orWhere('hamil_ke', 'like', '%' . $q .'%');
            $query->orWhere('hpht', 'like', '%' . $q .'%');
            $query->orWhere('nama_suami', 'like', '%' . $q .'%');
            $query->orWhere('alamat', 'like', '%' . $q .'%');
            $query->orWhere('kia', 'like', '%' . $q .'%');
            $query->orWhere('ket', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('bidan.ibuhamil.identitasibu', $data);
    }
    public function bidan_create()
    {
        return view('bidan.ibuhamil.formidentitas_ibu');
    }
    public function bidan_store(Request $request)
    {
        $rules = [
            'nik_ibu' => 'required|min:15|max:16',
            'no_kk' => 'required|min:15|max:16',
            'nama_ibu' => 'required|max:50',
            'tgl_lahir' => 'required',
            'hamil_ke' => 'required|max:10',
            'hpht' => 'required',
            'nama_suami' => 'required|max:50',
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

        Ibuhamil::create($request->all());
        return redirect('/ibuhamil')->with('succes', 'Data berhasil disimpan');
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
    static function hitung_usiakehamilan($hpht){
        $birthDate = new DateTime($hpht);
        $today = new DateTime("today");
        
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        
        $umur_minggu = (($y*12) + ($m*4));
        echo $umur_minggu . ' Minggu';
    }
    static function rentang_kehamilan($hpht){
        $birthDate = new DateTime($hpht);
        $today = new DateTime("today");
        
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        
        $umur_minggu = (($y*52) + ($m*4));
        if($umur_minggu <= 12 ){
            echo "Umur 0-12 Minggu";
        }elseif($umur_minggu >=13 && $umur_minggu <=24){
            echo "Umur 13-24 Minggu" ; 
        }else{
            echo "Umur >24 Minggu";
        }
    }
    public function bidan_edit(Ibuhamil $ibuhamil){
        return view('bidan.ibuhamil.formidentitas_ibu', compact('ibuhamil'));
    }
    public function bidan_update (Ibuhamil $ibuhamil, Request $request){
        
        $rules = [
            'nik_ibu' => 'required|min:15|max:16',
            'no_kk' => 'required|min:15|max:16',
            'nama_ibu' => 'required|max:50',
            'tgl_lahir' => 'required',
            'hamil_ke' => 'required|max:10',
            'hpht' => 'required',
            'nama_suami' => 'required|max:50',
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

        $ibuhamil->update($request->all());
        return redirect('/ibuhamil')->with('success', 'Data berhasil diubah');
    }
    public function bidan_detail(Ibuhamil $ibuhamil){
        return view('bidan.ibuhamil.identitas_detail', compact('ibuhamil'));
    }
    public function identitasibu_pdf(Request $request)
    {
        
        $ibuhamil = Ibuhamil::all();
    	$pdf = PDF::loadview('bidan.ibuhamil.identitas_pdf', ['ibuhamil'=>$ibuhamil], compact('ibuhamil'));
    	return $pdf->setPaper('a4', 'landscape')->stream();
    }

    
}
