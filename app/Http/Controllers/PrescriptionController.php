<?php

namespace App\Http\Controllers;

use App\Models\prescription;
use App\Http\Requests\StoreprescriptionRequest;
use App\Http\Requests\UpdateprescriptionRequest;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprescriptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprescriptionRequest $request, prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prescription $prescription)
    {
        //
    }
}
