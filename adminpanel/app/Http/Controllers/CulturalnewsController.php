<?php

namespace App\Http\Controllers;

use App\Models\Culturalnews;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CulturalnewsController extends Controller
{
    public function index()
    {
        $culturalnews = Culturalnews::all();
        return view('culturalnews.index', compact('culturalnews'));
    }

    public function create()
    {
        return view('Culturalnews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|file|image',
            'movie' => 'required|file|mimes:mp4,mkv,avi'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $moviePath = $request->file('movie')->store('movies', 'public');

        Culturalnews::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'movie' => $moviePath
        ]);

        return redirect()->route('Culturalnews.index')->with('success', 'خبر با موفقیت اضافه شد.');
    }


    public function edit(Culturalnews $Culturalnews)
    {
        return view('Culturalnews.edit', compact('Culturalnews'));
    }

    public function update(Request $request, Culturalnews $CulturalnewS)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|file|image',
            'movie' => 'nullable|file|mimes:mp4,mkv,avi'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $CulturalnewS->image = $imagePath;
        }

        if ($request->hasFile('movie')) {
            $moviePath = $request->file('movie')->store('movies', 'public');
            $CulturalnewS->movie = $moviePath;
        }

        $CulturalnewS->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('Culturalnews.index')->with('success', 'خبر با موفقیت ویرایش شد.');
    }

    public function destroy(Culturalnews $culturalnews)

    {

        // dd($culturalnews->all());
        if ($culturalnews->image) {
            Storage::disk('public')->delete($culturalnews->image);
        }

        if ($culturalnews->movie) {
            Storage::disk('public')->delete($culturalnews->movie);
        }

        $culturalnews->delete();

        return redirect()->route('Culturalnews.index')->with('danger', 'خبر فرهنگی با موفقیت حذف شد.');
    }




    public function show(Culturalnews $Culturalnews)
    {
        return view('Culturalnews.show', compact('Culturalnews'));
    }
}
