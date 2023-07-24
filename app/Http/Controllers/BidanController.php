<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidanController extends Controller
{
    public function index() {
        return view('bidan.index');
    }
}
