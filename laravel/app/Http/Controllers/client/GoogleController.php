<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{

    /// Đăng nhập
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $existingUser = User::where('google_id', $user->id)->first();

            if ($existingUser) {
                Auth::login($existingUser, true);
                return redirect()->intended('dashboard');
            } else {
                // Chuyển hướng người dùng đến trang đăng ký, truyền thông tin cần thiết
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('123456')
                ]);
                Auth::login($newUser, true);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Lỗi xác thực Google']);
        }
    }


}
