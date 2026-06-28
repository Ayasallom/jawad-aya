<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        return view('block5.dashboard');
    }

    public function create()
    {
        return view('block5.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image'
        ]);

        return back()->with('success', 'تم إدخال المنتج بنجاح (تجريبي)');
    }
}