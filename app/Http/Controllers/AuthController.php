<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

                return redirect()->intended('/bidan');
            
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function user_index(Request $request)
    {   $q = $request->get('q');
        
        $data['result'] = User::where(function($query) use ($q){
            $query->where('id', 'like', '%' . $q .'%');
            $query->orWhere('name', 'like', '%' . $q .'%');
            $query->orWhere('email', 'like', '%' . $q .'%');
            $query->orWhere('password', 'like', '%' . $q .'%');
            $query->orWhere('role_id', 'like', '%' . $q .'%');
        })->latest()->paginate(10); 
        
        $data['q'] = $q;
        return view('auth.user', $data);
    }
    public function user_create()
    {
        return view('auth.user_form');
    }
    public function user_store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',

        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);
        User::create($request->all());
        return redirect('/user')->with('succes', 'Data berhasil disimpan');
    }
    public function user_edit( User $user){
        return view('auth.user_form', compact('user'));
    }
    public function user_update (User $user, Request $request){
        
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ];
        $errors =[
            'required' => 'Kolom harus diisi',
            'min' => 'Kolom :attribute diisi tidak kurang dari :min karakter',
            'max' => 'Kolom :attribute diisi tidak lebih dari :max karakter',
        ];
        $this->validate($request, $rules, $errors);

        $user->update($request->all());
        return redirect('/user')->with('success', 'Data berhasil diubah');
    }
 
    public function user_destroy (User $user, Request $request, ){
        $user->delete();
        return redirect('/user')->with('success', 'Data berhasil dihapus');
        
    }
}
