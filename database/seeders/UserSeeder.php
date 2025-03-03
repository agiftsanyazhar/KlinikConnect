<?php

namespace Database\Seeders;

use App\Models\{Doctor, DoctorSchedule, DoctorTestimonial, Patient, Role, User};
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $doctorRole = Role::where('name', 'Dokter')->first();
        $patientRole = Role::where('name', 'Pasien')->first();

        // Create random start and end times
        $randStartTime = new DateTime();
        $startTime = $randStartTime->setTime(rand(7, 12), 0);
        $randEndTime = new DateTime();
        $endTime = $randEndTime->setTime(rand(13, 16), 0);

        // Create 1 admin
        $admin = User::create([
            'name' => 'Admin',
            'gender' => ['Pria', 'Wanita'][rand(0, 1)],
            'date_of_birth' => '1601-10-01',
            'phone' => '081111111111',
            'address' => 'Jl. Admin No. 1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => $adminRole->id,
        ]);
        Patient::create([
            'user_id' => $admin->id,
            'name' => $admin->name,
            'phone' => $admin->phone,
            'email' => $admin->email,
        ]);

        // Create 10 doctors
        for ($i = 1; $i <= 10; $i++) {
            $doctor = User::create([
                'name' => "Dokter $i",
                'gender' => ['Pria', 'Wanita'][rand(0, 1)],
                'date_of_birth' => now()->subYears(rand(18, 50)),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'email' => "dokter$i@gmail.com",
                'password' => Hash::make('12345678'),
                'role_id' => $doctorRole->id,
            ]);

            Doctor::create([
                'user_id' => $doctor->id,
                'name' => $doctor->name,
                'specialization_id' => rand(1, 10),
                'phone' => $doctor->phone,
                'email' => $doctor->email,
            ]);

            DoctorSchedule::create([
                'doctor_id' => $doctor->id,
                'day' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'][rand(0, 4)],
                'start_time' => $startTime->format('H:i'),
                'end_time' => $endTime->format('H:i'),
            ]);
        }

        // Create 100 doctor testimonials
        for ($i = 1; $i <= 100; $i++) {
            DoctorTestimonial::create([
                'doctor_id' => rand(2, 11),
                'rating' => rand(1, 5),
            ]);
        }

        // Create 100 patients
        for ($i = 1; $i <= 100; $i++) {
            $patient = User::create([
                'name' => "Pasien $i",
                'gender' => ['Pria', 'Wanita'][rand(0, 1)],
                'date_of_birth' => now()->subYears(rand(18, 50)),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'email' => "pasien$i@gmail.com",
                'password' => Hash::make('12345678'),
                'role_id' => $patientRole->id,
            ]);

            Patient::create([
                'user_id' => $patient->id,
                'name' => $patient->name,
                'phone' => $patient->phone,
                'email' => $patient->email,
            ]);
        }
    }
}
