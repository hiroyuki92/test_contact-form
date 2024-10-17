<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class LoginUser
{
    public function login(Request $request)
    {
        $validated = app(LoginRequest::class)->validate($request->all());

        // 認証試行
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'メールアドレスまたはパスワードが正しくありません。',
            ]);
        }

        // セッションの再生成
        $request->session()->regenerate();

        return Auth::user();
    }
}
