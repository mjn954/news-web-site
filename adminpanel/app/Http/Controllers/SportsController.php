<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
    {
        $Sports = Sports::all();
        return view("Sportsslider.index", compact('Sports'));
    }

    public function create()
    {
        return view('Sportsslider.create');
    }

    public function edit(Sports $Sport)
    {
        return view('Sportsslider.edit', compact('Sport'));
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

        $imagePath = $request->file('image')->store('sliders', 'public');

        Sports::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $imagePath
        ]);

        return redirect()->route('Sportsslider.index')->with('success', 'اسلایدر با موفقیت اضافه شد.');
    }

    public function update(Request $request, Sports $Sport)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'nullable|file'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            $Sport->image = $imagePath;
        }

        $Sport->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
        ]);

        return redirect()->route('Sportsslider.index')->with('info', 'اسلایدر با موفقیت بروزرسانی شد.');
    }

    public function destroy(Sports $Sport)
    {
        $Sport->delete();

        return redirect()->route('Sportsslider.index')->with('warning', 'اسلایدر با موفقیت حذف شد.');
    }

    public function show(Sports $Sport)
    {
        return view('Sportsslider.show', compact('Sport'));
    }
}
