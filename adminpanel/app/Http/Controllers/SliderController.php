<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    public function index()
    {

        $sliders = Slider::all();
        return view("slider.index", compact('sliders'));
    }


    public function create()
    {
        return view('slider.create');
    }

    public function edit(Slider $slider)
     {
        return view('slider.edit', compact('slider'));

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


        Slider::create([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image')->store('sliders', 'public')
        ]);
        // میدونی خط بعدی هم همین کارو می کنه ولی من  همون حالت قدیمی راحت ترم
        // Slider::create($request->all());

        return redirect()->route('slider.index')->with('success', 'اسلایدر با موفقیت اضافه شد.');
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link_title' => 'required|string',
            'link_adress' => 'required|string',
            'image' => 'required|file'
        ]);


        $slider->update([
            'title' => $request->title,
            'body' => $request->body,
            'link_title' => $request->link_title,
            'link_adress' => $request->link_adress,
            'image' => $request->file('image')->store('sliders', 'public')
        ]);
        // میدونی خط بعدی هم همین کارو می کنه ولی من  همون حالت قدیمی راحت ترم
        // $slider->update($request->all());

        return redirect()->route('slider.index')->with('info', 'اسلایدر با موفقیت بروزرسانی شد.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('slider.index')->with('warning', 'اسلایدر با موفقیت  حذف شد.');
    }

    public function show(Slider $slider)
    {
        return view('slider.show', compact("slider"));

    }
}
