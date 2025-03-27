<?php

namespace App\Http\Controllers;

use App\Models\Politicalnews;
use Illuminate\Http\Request;

class PoliticalnewsController extends Controller
{public function index()
    {
        $Political = Politicalnews::all();
        return view('Politicalnews.index', compact("Political"));
    }

    public function create()
    {
        return view('Politicalnews.create');
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

        Politicalnews::create([
            "title" => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'movie' => $moviePath
        ]);

        return redirect()->route('Politicalnews.index')->with('success', 'خبر با موفقیت اضافه شد.');
    }

    public function edit(Politicalnews $politicalnews)
    {
        return view("Politicalnews.edit", compact('politicalnews'));
    }

    public function update(Request $request, Politicalnews $politicalnews)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);


        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('images', 'public');
            $politicalnews->image = $imagePath;
        }


        if ($request->hasFile('movie')) {

            $moviePath = $request->file('movie')->store('movies', 'public');
            $politicalnews->movie = $moviePath;
        }


        $politicalnews->update([
            "title" => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('Politicalnews.index')->with('success', 'خبر با موفقیت ویرایش شد.');
    }

    public function destroy(Politicalnews $politicalnews)
    {
        $politicalnews->delete();
    return redirect()->route('Politicalnews.index')->with('danger', 'خبر با موفقیت حذف شد.');

    }

    public function show(Politicalnews $politicalnews)
    {
        return view('Politicalnews.show', compact('politicalnews'));
    }

}
