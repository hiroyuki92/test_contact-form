<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->get();
        return view('index', compact('categories','contacts'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $contacts['tel'] = $tel;
        $category = Category::find($contacts['category_id']);
        $contacts['category_content'] = $category->content;
        return view('confirm', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $contacts = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building','category_id', 'detail']);
        Contact::create($contacts);
        return  redirect()->route('index')->with('message', 'お問い合わせが正常に保存されました');
    }
}
