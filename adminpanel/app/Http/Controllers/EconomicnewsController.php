<?php

namespace App\Http\Controllers;

use App\Models\Economicnews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EconomicnewsController extends Controller
{
    public function index()
    {
        $Economicnews = Economicnews::all();
        return view('Economicnews.index', compact("Economicnews"));
    }

    public function create()
    {
        return view('Economicnews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $moviePath = $request->hasFile('movie') ? $request->file('movie')->store('movies', 'public') : null;

        Economicnews::create([
            "title" => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'movie' => $moviePath
        ]);

        return redirect()->route('Economicnews.index')->with('success', 'خبر اقتصادی با موفقیت اضافه شد.');
    }

    public function edit(Economicnews $Economicnews)
    {
        return view("Economicnews.edit", compact('Economicnews'));
    }

    public function update(Request $request, Economicnews $Economicnews)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($Economicnews->image);
            $imagePath = $request->file('image')->store('images', 'public');
            $Economicnews->image = $imagePath;
        }

        if ($request->hasFile('movie')) {
            Storage::disk('public')->delete($Economicnews->movie);
            $moviePath = $request->file('movie')->store('movies', 'public');
            $Economicnews->movie = $moviePath;
        }

        $Economicnews->update([
            "title" => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('Economicnews.index')->with('success', 'خبر اقتصادی با موفقیت ویرایش شد.');
    }

    public function destroy(Economicnews $Economicnews)
    {
        $Economicnews->delete();
        return redirect()->route('Economicnews.index')->with('danger', 'خبر اقتصادی با موفقیت حذف شد.');
    }

    public function show(Economicnews $Economicnews)
    {
        return view('Economicnews.show', compact('Economicnews'));
    }
}
