<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Trail;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index() {
        $user = Auth::user();
        $registrations = Pendaftaran::with(['pendaki', 'trail'])->where('user_id', $user->id)->get();
        $trails = Trail::all();

        return view('ticket.index', [
            'title' => 'Tiket',
            'active' => 'none',
            'registrations' => $registrations,
            'trails' => $trails,
        ]);
    }

    public function show($id)
    {
        $registration = Pendaftaran::with(['pendaki', 'trail'])->where('user_id', Auth::id())->findOrFail(decrypt($id));
        return view('ticket.show', [
            'title' => 'Detail Tiket',
            'registration' => $registration,
        ]);
    }

    public function edit($id)
    {
        $registration = Pendaftaran::where('user_id', Auth::id())->findOrFail(decrypt($id));
        $trails = Trail::all();

        return view('ticket.edit', [
            'title' => 'Edit Tiket',
            'active' => 'none',
            'registration' => $registration,
            'trails' => $trails,
        ]);
    }

    public function update(Request $request, $id)
    {
        $registration = Pendaftaran::where('user_id', Auth::id())->findOrFail(decrypt($id));

        $request->validate([
            'tanggal_naik' => 'required|date',
            'tanggal_turun' => 'required|date|after_or_equal:tanggal_naik',
            'trail_id' => 'required',
            'nama_pendaki' => 'required',
            'no_identitas' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Pria,Perempuan',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'nama_kontak_darurat' => 'required',
            'no_hp_kontak_darurat' => 'required|numeric',
            'alamat_kontak_darurat' => 'required',
            'hubungan_kontak_darurat' => 'required|in:Suami,Istri,Anak,Orang Tua,Saudara',
        ]);

        $registration->update([
            'tanggal_naik' => $request->tanggal_naik,
            'tanggal_turun' => $request->tanggal_turun,
            'trail_id' => $request->trail_id,
        ]);

        // Update data pendaki (assuming one-to-one relationship)
        $registration->pendaki->update([
            'name' => $request->nama_pendaki,
            'no_identitas' => $request->no_identitas,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        // Update data kontak darurat
        $registration->update([
            'nama_kontak_darurat' => $request->nama_kontak_darurat,
            'no_hp_kontak_darurat' => $request->no_hp_kontak_darurat,
            'alamat_kontak_darurat' => $request->alamat_kontak_darurat,
            'hubungan_kontak_darurat' => $request->hubungan_kontak_darurat,
        ]);

        return redirect()->route('ticket.index')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $registration = Pendaftaran::where('user_id', Auth::id())->findOrFail(decrypt($id));
        $registration->delete();
        return redirect()->route('ticket.index')->with('danger', 'Data berhasil dihapus.');
    }
}
