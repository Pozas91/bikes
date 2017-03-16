<?php

namespace App\Http\Controllers;

class PassportController extends Controller
{
    public function getIndex() {
        return view('passports.index');
    }
}