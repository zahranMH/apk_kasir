<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LupaPassword
{
    public function showCheck()
    {
        return view('lupaPassword.checkEMail');
    }

    public function checkEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|min:3|email'
        ]);

        // cek jika user ada
        if(User::where('email', $validatedData)->first() != null) {

            $user = User::where('email', $validatedData)->first();

            $id_user = $user->id;

            session()->put('id_user', $id_user);

            return redirect('/resetPassword')->with('berhasil', 'Pengguna ketemu silakan ganti password anda');

        } else {

            return back()->with('gagal', 'Pengguna ketemu silakan ganti password anda');

        }

    }

    public function showReset()
    {
        return view('lupaPassword.resetPassword');
    }

    public function resetPw(Request $request)
    {
        $id_user = $request->id_user;
        
        if($request->password == $request->Kpassword) {


            User::find($id_user)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect('/')->with('berhasil', 'Berhasil mengganti password silakan login');

        } else {

            session()->put('id_user', $id_user);

            return back()->with('gagal', 'Password dan konfimasi password harus sama');

        }
    }

}
