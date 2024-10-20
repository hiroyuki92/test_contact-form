<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
    $categories = Category::all();
    $contacts = Contact::with('category')->paginate(7);
    return view('admin', compact('categories', 'contacts'));
    }

    public function register(RegisterRequest $request)
    {
        // ユーザー登録処理
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
        }

        return back()->withErrors([
        'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)
        ->GenderSearch((int) $request->gender)
        ->CategorySearch($request->category_id)
        ->DateSearch($request->date)
        ->paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }
}