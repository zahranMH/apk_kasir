<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.profile.editPF', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.profile.edit', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255|email',
            'detail_user' => 'required'
        ]);

        User::find($id)->update($validatedData);

        return redirect('/profile')->with('berhasil', 'Berhasil update profil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePF(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'pf_user' => 'required|file'
        ]);

        $disk = Storage::disk('public');

        if($request->hasFile('pf_user')) {

            if($request->pf_user_lama) {
                $disk->delete($request->pf_user_lama);
            }

            $validatedData = $request->file('pf_user')->store('pf_users', 'public');
        }

        User::find($id)->update([
            'img_user' => $validatedData
        ]);

        return redirect('/profile')->with('berhasil', 'Berhasil foto update profil');
    }
}
