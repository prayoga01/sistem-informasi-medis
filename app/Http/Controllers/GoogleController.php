<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->stateless()->user();       
        } catch (\Throwable $th) 
        {
            return redirect('/login');
        }

        // dd($user);
        $userbaru = User::where('google_id', $user->id)->first();
        if ($userbaru) {
            Auth::login($userbaru, true);
        }
        else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make(Str::random(8))

            ]);

            Auth::login($newUser, true);
        }
        return redirect()->intended('/dashboard');
    }
}