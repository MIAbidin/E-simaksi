<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrailController extends Controller
{
    public function index() {
        return view('jalur', [
            'title' => 'Jalur',
            'active' => 'Jalur'
        ]);
    }
}
