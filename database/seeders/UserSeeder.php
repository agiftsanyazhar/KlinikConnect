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
        User::create([
            'name' => 'Admin',
            'gender' => ['Pria', 'Wanita'][rand(0, 1)],
            'date_of_birth' => now()->subYears(rand(18, 50)),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => $adminRole->id,
        ]);

        // Create 10 doctors
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
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
                'user_id' => $user->id,
                'name' => $user->name,
                'specialization_id' => rand(1, 10),
                'phone' => $user->phone,
                'email' => $user->email,
            ]);

            DoctorSchedule::create([
                'doctor_id' => $user->id,
                'day' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'][rand(0, 4)],
                'start_time' => $startTime->format('H:i'),
                'end_time' => $endTime->format('H:i'),
            ]);

            DoctorTestimonial::create([
                'doctor_id' => $user->id,
                'rating' => rand(1, 5),
            ]);
        }

        // Create 100 patients
        for ($i = 1; $i <= 100; $i++) {
            $user = User::create([
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
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
            ]);
        }
    }
}
