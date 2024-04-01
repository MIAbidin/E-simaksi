<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaran;
use App\Models\Trail;
use App\Models\Pendaki;

class TicketController extends Controller
{
    public function index() {
        $registrations = pendaftaran::with(['pendaki', 'trail'])->get();

        return view('ticket', [
            'title' => 'Tiket',
            'active' => 'none',
            'registrations' => $registrations,
        ]);
    }

    public function show($id)
    {
        // Logika untuk halaman detail
    }

    public function destroy($id)
    {
        $registration = pendaftaran::findOrFail($id);
        $registration->delete();
        return redirect(('/ticket'));
    }

    
}
