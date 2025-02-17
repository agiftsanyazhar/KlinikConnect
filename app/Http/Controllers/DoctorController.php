<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        $data = [
            'title' => 'Daftar Dokter',
            'doctors' => $doctors,
        ];

        return view('doctor.index', $data);
    }
}
