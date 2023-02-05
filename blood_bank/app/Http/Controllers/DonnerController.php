<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonnerController extends Controller
{
    //

    public function add()
    {
       return view('mngr.donner.add');
    }
}
