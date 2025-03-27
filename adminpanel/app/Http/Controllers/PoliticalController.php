<?php

namespace App\Http\Controllers;

use App\Models\Political;
use Illuminate\Http\Request;

class PoliticalController extends Controller
{
    public function index()
    {
        $Politicals = Political::all();
        return view("Politicalslider.index", compact('Politicals'));
    }

    public function create()
    {
        return view('Politicalslider.create');
    }

    public function edit(Political $Political)
    {
        return view('Politicalslider.edit', compact('Political'));
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

        Political::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image')->store('sliders', 'public')
        ]);

        return redirect()->route('Politicalslider.index')->with('success', 'اسلایدر با موفقیت اضافه شد.');
    }

    public function update(Request $request, Political $Political)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'nullable|file'
        ]);

        $Political->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image') ? $request->file('image')->store('sliders', 'public') : $Political->image
        ]);

        return redirect()->route('Politicalslider.index')->with('info', 'اسلایدر با موفقیت بروزرسانی شد.');
    }

    public function destroy(Political $Political)
    {
        $Political->delete();

        return redirect()->route('Politicalslider.index')->with('warning', 'اسلایدر با موفقیت حذف شد.');
    }

    public function show(Political $Political)
    {
        return view('Politicalslider.show', compact('Political'));
    }
}
