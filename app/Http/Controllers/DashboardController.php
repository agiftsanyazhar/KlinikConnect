<?php

namespace App\Http\Controllers;

use App\Models\{Announcement, Appointment, Doctor, Guide};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::latest()->limit(6)->get();
        $guides = Guide::all();
        $doctors = Doctor::with('doctorTestimonial')
            ->get()
            ->sortByDesc(function ($doctor) {
                return $doctor->averageRating();
            })
            ->take(10);

        $patient = Auth::user()->patient->first();
        $appointments = Appointment::where('patient_id', $patient->id ?? '')
            ->orderBy('start_time', 'asc')
            ->limit(10)
            ->get();

        $data = [
            'title' => 'Beranda',
            'announcements' => $announcements,
            'guides' => $guides,
            'doctors' => $doctors,
            'appointments' => $appointments,
        ];

        return view('dashboard.index', $data);
    }

    public function announcement()
    {
        $announcements = Announcement::all();

        $data = [
            'title' => 'Pengumuman',
            'announcements' => $announcements,
        ];

        return view('dashboard.announcement', $data);
    }
}
