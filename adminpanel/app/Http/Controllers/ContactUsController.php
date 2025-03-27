<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $ContactUs=ContactUs::all();
        return view("ContactUs.index",compact('ContactUs'));
    }

    public function show($id)
    {
        $Contactus = ContactUs::findOrFail($id);
        return view("ContactUs.show", compact('Contactus'));
    }

}
