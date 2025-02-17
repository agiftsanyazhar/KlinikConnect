<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\Doctor;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $doctor = Doctor::where('id', $id)->firstOrFail();
        $schedule = DoctorSchedule::where('doctor_id', $id)->get();

        $data = [
            'title' => 'Jadwal Dokter',
            'doctor' => $doctor,
            'schedules' => $schedule,
        ];

        return view('doctor.schedule', $data);
    }
}
