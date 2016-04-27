<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class queController extends Controller
{
    public function view()
    {
        return view('que');
    }
}
