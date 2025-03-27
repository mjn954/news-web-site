<?php

namespace App\Http\Controllers;

use App\Models\Sportsnews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsnewsController extends Controller
{
    public function index()
    {
        $sportsnews = Sportsnews::all();
        return view('sportsnews.index', compact("sportsnews"));
    }

    public function create()
    {
        return view('Sportsnews.create');
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

        Sportsnews::create([
            "title" => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'movie' => $moviePath
        ]);

        return redirect()->route('Sportsnews.index')->with('success', 'خبر ورزشی با موفقیت اضافه شد.');
    }

    public function edit(Sportsnews $sportsnews)
    {
        return view("Sportsnews.edit", compact('sportsnews'));
    }

    public function update(Request $request, Sportsnews $sportsnews)
    {
        $request->validate([
            "title" => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($sportsnews->image);
            $imagePath = $request->file('image')->store('images', 'public');
            $sportsnews->image = $imagePath;
        }

        if ($request->hasFile('movie')) {
            Storage::disk('public')->delete($sportsnews->movie);
            $moviePath = $request->file('movie')->store('movies', 'public');
            $sportsnews->movie = $moviePath;
        }

        $sportsnews->update([
            "title" => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('Sportsnews.index')->with('success', 'خبر ورزشی با موفقیت ویرایش شد.');
    }


    public function destroy(Sportsnews $sportsnews)
    {
        // حذف فایل تصویر اگر وجود داشته باشد
        if ($sportsnews->image) {
            Storage::disk('public')->delete($sportsnews->image);
        }

        // حذف فایل ویدئو اگر وجود داشته باشد
        if ($sportsnews->movie) {
            Storage::disk('public')->delete($sportsnews->movie);
        }

        // حذف رکورد از دیتابیس
        $sportsnews->delete();

        return redirect()->route('Sportsnews.index')->with('danger', 'خبر ورزشی با موفقیت حذف شد.');
    }




    public function show(Sportsnews $sportsnews)
    {
        return view('Sportsnews.show', compact('sportsnews'));
    }
}
