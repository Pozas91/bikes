<?php

namespace App\Http\Controllers;

use App\Model\Bike;

class HomeController extends Controller
{
    public function getIndex() {
        $bikes = Bike::all();

        return view('home', compact('bikes'));
    }
}