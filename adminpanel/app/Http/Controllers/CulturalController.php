<?php

namespace App\Http\Controllers;

use App\Models\Cultural;
use Illuminate\Http\Request;

class CulturalController extends Controller
{
    public function index()
    {
        $Culturals = Cultural::all();
        return view("Culturalslider.index", compact('Culturals'));
    }

    public function create()
    {
        return view('Culturalslider.create');
    }

    public function edit(Cultural $Cultural)
    {
        return view('Culturalslider.edit', compact('Cultural'));
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

        Cultural::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $imagePath
        ]);

        return redirect()->route('Culturalslider.index')->with('success', 'اسلایدر با موفقیت اضافه شد.');
    }

    public function update(Request $request, Cultural $Cultural)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'nullable|file'
        ]);


        $imagePath = $Cultural->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
        }

        $Cultural->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $imagePath
        ]);

        return redirect()->route('Culturalslider.index')->with('info', 'اسلایدر با موفقیت بروزرسانی شد.');
    }

    public function destroy(Cultural $Cultural)
    {
        $Cultural->delete();

        return redirect()->route('Culturalslider.index')->with('warning', 'اسلایدر با موفقیت حذف شد.');
    }

    public function show(Cultural $Cultural)
    {
        return view('Culturalslider.show', compact("Cultural"));
    }
}
