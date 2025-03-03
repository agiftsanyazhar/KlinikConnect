<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Auth::user()->patient->first();
        $appointments = Appointment::where('patient_id', $patient->id ?? '')
            ->orderBy('start_time', 'asc')
            ->get();

        $data = [
            'title' => 'Janji Temu Saya',
            'appointments' => $appointments,
        ];

        return view('dashboard.appointment', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'doctor_id' => 'required|integer|exists:doctors,id',
                'patient_id' => 'required|integer|exists:patients,id',
                'start_time' => 'required',
                'end_time' => 'required',
                'notes' => 'nullable|string',
            ]);

            if ($data['start_time'] >= $data['end_time']) {
                return redirect()->back()->with('error', 'Waktu selesai harus lebih besar dari waktu mulai.');
            }

            Appointment::create($data);

            $status = 'success';
            $message = 'Jadwal dokter berhasil ditambahkan.';
        } catch (Exception $e) {
            $status = 'error';
            $message = 'Jadwal dokter gagal ditambahkan. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $appointment = Appointment::where('id', $id)->firstOrFail();

            $newStatus = $request->input('status');

            if (!in_array($newStatus, ['Completed', 'Pending', 'Canceled'])) {
                return redirect()->back()->with('error', 'Invalid status.');
            }

            $appointment->update(['status' => $newStatus]);

            $status = 'success';
            $message = 'Status jadwal dokter berhasil diubah.';
        } catch (Exception $e) {
            $status = 'error';
            $message = 'Status jadwal dokter gagal diubah. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }
}
