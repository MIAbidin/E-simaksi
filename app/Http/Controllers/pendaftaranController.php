<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendaftaranController extends Controller
{
    public function index() {
        return view('pendaftaran', [
            'title' => 'Booking',
            'active' => 'Pendaftaran'
        ]);
    }
}
