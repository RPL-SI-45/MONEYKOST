<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        
      
            $user = auth()->user();
           
            return view('pages.profile',[
                'user' => $user
            ]);
       
    }


    public function update($id, Request $request) {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_kamar' => 'required',
            'no_hp' => 'required',
            'gambar_profile' => 'sometimes|image|mimes:jpeg,jpg,png,gif',
        ]);
    
        $user = User::find($id);
    
        if ($request->hasFile('gambar_profile')) {
            $file = $request->file('gambar_profile');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public', $fileName);
    
            $user->update([
                "name" => $attributes['name'],
                "email" => $attributes['email'],
                "no_kamar" => $attributes['no_kamar'],
                "no_hp" => $attributes['no_hp'],
                "gambar_profile" => $fileName,
            ]);
        } else {
            $user->update($request->except(['_token', 'gambar_profile']));
        }
    
        return redirect()->route('profile');
    }
    



        // // Memeriksa apakah input form diisi sebelum memperbarui data
        // if ($request->filled('name')) {
        //     $user->name = $request->name;
        // }
        
        // if ($request->filled('email')) {
        //     $user->email = $request->email;
        // }
        
        // if ($request->filled('no_kamar')) {
        //     $user->no_kamar = $request->no_kamar;
        // }
        
        // if ($request->filled('no_hp')) {
        //     $user->no_hp = $request->no_hp;
        // }

        // if ($request->hasFile('gambar_profile')) {
        //     $file = $request->file('gambar_profile');
        //     $fileName = $file->getClientOriginalName();
        //     $filePath = $file->storeAs('public', $fileName);
        //     $user->gambar_profile = $fileName;
        // }

        // // Simpan perubahan hanya jika ada data yang diperbarui
        // if ($user->isDirty()) {
        //     $user->save();
        // }
        
        // $user->save();

        
    }

