<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\NewOrderNotification;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'no_kamar' => 'required',
            'no_hp' => 'required|max:13|min:11',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $attributes['auth'] = 'customer';
        User::create($attributes);
        //auth()->login($user);
        
        $user = auth()->user();
        $title = 'Penghuni Baru';
        $message = 'Ada penghuni baru bernama' . $attributes['username'] . 'dengan kamar' . $attributes['no_kamar'];
        $url = '/dashboard/admin/kelolaDataCustomer'; // Set the URL

        $admins = User::where('auth', 'admin')->get();
        

        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($title, $message, $url));
        }
        return redirect("/login");
    }
}
