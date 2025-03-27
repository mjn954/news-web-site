<?php

namespace App\Http\Controllers;

use App\Models\Economic;
use Illuminate\Http\Request;

class EconomicController extends Controller
{
    public function index()
    {
        $Economic = Economic::all();
        return view("Economicslider.index", compact('Economic'));
    }

    public function create()
    {
        return view('Economicslider.create');
    }

    public function edit(Economic $Economic)
    {
        return view('Economicslider.edit', compact('Economic'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'required|file'
        ]);

        Economic::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image')->store('sliders', 'public')
        ]);

        return redirect()->route('Economicslider.index')->with('success', 'اسلایدر با موفقیت اضافه شد.');
    }


    public function update(Request $request, Economic $Economic)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'nullable|file'
        ]);

        $Economic->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image') ? $request->file('image')->store('sliders', 'public') : $Economic->image
        ]);

        return redirect()->route('Economicslider.index')->with('info', 'اسلایدر با موفقیت بروزرسانی شد.');
    }

    public function destroy(Economic $Economic)
    {
        $Economic->delete();

        return redirect()->route('Economicslider.index')->with('warning', 'اسلایدر با موفقیت حذف شد.');
    }

    public function show(Economic $Economic)
    {
        return view('Economicslider.show', compact('Economic'));
    }
}
