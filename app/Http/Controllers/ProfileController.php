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


    public function update(Request $request){
       

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        // Memeriksa apakah input form diisi sebelum memperbarui data
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        
        if ($request->filled('no_kamar')) {
            $user->no_kamar = $request->no_kamar;
        }
        
        if ($request->filled('no_hp')) {
            $user->no_hp = $request->no_hp;
        }
        
        // Simpan perubahan hanya jika ada data yang diperbarui
        if ($user->isDirty()) {
            $user->save();
        }
        
       
        $user->save();

        

        return redirect()->route('profile');
    }
}
