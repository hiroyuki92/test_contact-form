<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
}