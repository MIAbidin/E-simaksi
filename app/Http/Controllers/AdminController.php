<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\Trail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::query();

        // Filter based on trail_id
        if ($request->has('trail_id') && $request->trail_id) {
            $query->where('trail_id', $request->get('trail_id'));
        }

        // Filter based on tanggal_naik (date of hike)
        if ($request->has('tanggal_naik') && $request->tanggal_naik) {
            $query->whereDate('tanggal_naik', $request->get('tanggal_naik'));
        }

        // Filter based on status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->get('status'));
        }

        // Fetch the data
        $registrations = $query->get();

        // Count total registrations matching filters
        $totalRegistrations = $query->count();

        // Count total users
        $totalUsers = User::count();

        // Fetch latest registrations (latest 5)
        $latestRegistrations = $query->latest()->take(5)->get();

        // Calculate total income from registrations with status Paid or Expired
        $totalIncome = $query->whereIn('status', ['Paid', 'Expired'])->sum('harga_tiket');

        // Fetch all trails
        $trails = Trail::all();

        return view('admin.dashboard', [
            'title' => 'Admin Dashboard',
            'active' => 'Admin',
            'totalRegistrations' => $totalRegistrations,
            'totalUsers' => $totalUsers,
            'latestRegistrations' => $latestRegistrations,
            'totalIncome' => $totalIncome,
            'trails' => $trails,
            'registrations' => $registrations,
        ]);
    }

    public function setPrice(Request $request)
    {
        $request->validate([
            'trail_id' => 'required|exists:trails,id',
            'harga_tiket' => 'required|numeric|min:0',
        ]);

        $trail = Trail::findOrFail($request->trail_id);
        $trail->harga_tiket = $request->harga_tiket;
        $trail->save();

        return redirect()->route('admin.index')->with('success', 'Harga tiket berhasil disimpan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Paid,Unpaid,Expired,On Progress',
        ]);

        DB::transaction(function () use ($request, $id) {
            $registration = Pendaftaran::findOrFail($id);
            $registration->status = $request->status;
            $registration->save();
        });

        return redirect()->route('admin.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function showRegistration($id)
    {
        $registration = Pendaftaran::findOrFail($id);

        return view('admin.registration_detail', [
            'title' => 'Detail Pendaftaran',
            'registration' => $registration,
        ]);
    }

}
