<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        return view('user.faq'); // Assuming the FAQ view is located in resources/views/user/faq.blade.php
    }
}
