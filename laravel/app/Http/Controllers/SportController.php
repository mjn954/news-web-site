<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sportnews;
class SportController extends Controller
{
    public function index()
    {
        return view("Sport.index");
    }

    public function show(Sportnews $sportnews,$id)
    {
        $sportnews = Sportnews::findOrFail($id);
        return view("Sport.news",compact('sportnews'));
    }
}
