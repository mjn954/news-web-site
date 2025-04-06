<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticalController extends Controller
{
    public function index()
    {
        return view ('Political.Political');
    }
    public function show()
    {
        return view ('Political.Politicalnews');
    }

}
