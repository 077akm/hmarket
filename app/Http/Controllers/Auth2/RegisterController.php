<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|numeric|confirmed',
            'avatar' => 'image|mimes:jpg,png,PNG,jpeg,gif,svg,webp'
        ]);

        $fileName = 'default_avatar.png'; // Имя файла по умолчанию
        $image_path = 'avatars/default_avatar.png';

        if ($request->hasFile('avatar')) {
            $fileName = time() . $request->file('avatar')->getClientOriginalName();
            $image_path = $request->file('avatar')->storeAs('avatars', $fileName, 'public');
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::where('name', 'Klient')->first()->id,
            'avatar' => $fileName ? '/storage/' . $image_path : '/storage/' . $fileName,
            'gender' => $request->input('gender'), // Добавляем пол в базу данных
        ]);

        Auth::login($user);

        return redirect()->route('documents.index')->with('message', __('error.tirkeldi'));
    }




}
