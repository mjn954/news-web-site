<?php
namespace App\Http\Controllers;

use App\Models\Politicalnews;
use Illuminate\Http\Request;

class PoliticalController extends Controller
{

    public function index()
    {
        return view('Political.Political');
    }


    public function show($id)
    {
        $Politicalnews = Politicalnews::findOrFail($id);
        return view('Political.Politicalnews', compact('Politicalnews'));
    }

}
