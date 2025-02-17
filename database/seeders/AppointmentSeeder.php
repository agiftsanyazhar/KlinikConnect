<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Notification;
use App\Models\PaymentRecord;
use App\Models\Prescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 75; $i++) {
            $appointment = Appointment::create([
                'doctor_id' => rand(1, 10),
                'patient_id' => rand(1, 100),
                'start_time' => now()->addDays(rand(0, 30)),
                'end_time' => now()->addDays(rand(0, 30)),
                'status' => ['Completed', 'Pending', 'Canceled'][rand(0, 2)],
            ]);

            Notification::create([
                'user_id' => $appointment->patient_id,
                'message' => "Cek Kesehatan $i",
            ]);

            Prescription::create([
                'appointment_id' => $appointment->id,
                'description' => "Resep Obat $i",
            ]);

            PaymentRecord::create([
                'appointment_id' => $appointment->id,
                'amount' => rand(100000, 5000000),
                'status' => ['Completed', 'Pending', 'Failed'][rand(0, 2)],
            ]);
        }
    }
}
