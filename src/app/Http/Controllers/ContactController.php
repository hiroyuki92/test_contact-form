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
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building','category_id', 'detail']);
        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');
        $tel = $tel1 . $tel2 . $tel3;
        $contacts['tel'] = $tel;
        return view('confirm', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building','category_id', 'detail']);
        Contact::create($contact);
        return view('index');
    }
}
