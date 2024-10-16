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
        $contacts = $request->validated();
        $contacts['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $category = Category::find($contacts['category_id']);
        $contacts['category_content'] = $category->content;
        return view('confirm', compact('contacts'))->withInput($request->all());
    }

    public function store(ContactRequest $request)
    {
        $contacts = $request->validated();
        $contacts['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $category = Category::find($contacts['category_id']);
        $contacts['category_content'] = $category->content;
        Contact::create($contacts);
        return redirect()->route('thanks');
    }
}
