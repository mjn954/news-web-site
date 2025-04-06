<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\homenews;
class HomeController extends Controller
{
    public function index()
    {
        return view('master.home');
    }
    public function show(Homenews $homenews)
    {
        return view('master.show', compact('homenews'));
    }



}
