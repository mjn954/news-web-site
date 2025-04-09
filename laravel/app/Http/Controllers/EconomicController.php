<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Economicnews;
class EconomicController extends Controller
{
    public function index()
    {
        return view('Economic.index');
    }


    public function show(Economicnews $economicnews ,$id)
    {
        $economicnews = Economicnews::findOrFail($id);
        return view('Economic.news',compact('economicnews'));
    }
}
