<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->get();
        $contacts = $request->all();
        return view('index', compact('categories','contacts'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $contacts['tel1'] = $request->input('tel1', '');
        $contacts['tel2'] = $request->input('tel2', '');
        $contacts['tel3'] = $request->input('tel3', '');
        $contacts['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $category = Category::find($contacts['category_id']);
        if (!$category) {
        return back()->withErrors(['category_id' => '無効なカテゴリが選択されました。'])->withInput();
    }
        $contacts['category_content'] = $category->content;
        return view('confirm', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $contacts = $request->all();
        $contacts['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $category = Category::find($contacts['category_id']);
        $contacts['category_content'] = $category->content;
        Contact::create([
        'last_name' => $contacts['last_name'],
        'first_name' => $contacts['first_name'],
        'gender' => (int) $contacts['gender'],
        'email' => $contacts['email'],
        'tel' => $contacts['tel'],
        'address' => $contacts['address'],
        'building' => $contacts['building'],
        'category_id' => $contacts['category_id'],
        'detail' => $contacts['detail'],
        ]);
        return redirect()->route('thanks');
    }

}

