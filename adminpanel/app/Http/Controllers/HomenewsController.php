<?php

namespace App\Http\Controllers;

use App\Models\homenews;
use Illuminate\Http\Request;

class HomenewsController extends Controller
{
    public function index()
    {
        $home = homenews::all();
        return view('homenews.index', compact("home"));
    }

    public function create()
    {
        return view('homenews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file|image',
            'movie' => 'required|file|mimes:mp4,mkv,avi'
        ]);


        $imagePath = $request->file('image')->store('images', 'public');

        $moviePath = $request->file('movie')->store('movies', 'public');

        homenews::create([
            "title" => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'movie' => $moviePath
        ]);

        return redirect()->route('homenews.index')->with('success', 'خبر با موفقیت اضافه شد.');
    }

    public function edit(homenews $homenews)
    {
        return view("homenews.edit", compact('homenews'));
    }

    public function update(Request $request, homenews $homenews)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);


        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('images', 'public');
            $homenews->image = $imagePath;
        }


        if ($request->hasFile('movie')) {

            $moviePath = $request->file('movie')->store('movies', 'public');
            $homenews->movie = $moviePath;
        }


        $homenews->update([
            "title" => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('homenews.index')->with('success', 'خبر با موفقیت ویرایش شد.');
    }

    public function destroy(homenews $homenews)
    {
        $homenews->delete();
        return redirect()->route('homenews.index')->with('danger', 'خبر با موفقیت حذف شد.');
    }

    public function show(homenews $homenews)
    {
        return view('homenews.show', compact('homenews'));
    }
}
