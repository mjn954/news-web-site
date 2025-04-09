<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Culturalnews;
class CulturalController extends Controller
{
    public function index()
    {
        return view("Cultural.index");
    }

    public function show(Culturalnews $culturalnews ,$id)
    {
        $culturalnews = Culturalnews::findOrFail($id);
        return view('Cultural.news',compact("culturalnews"));
    }
}
