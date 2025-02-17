<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Specialization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks before seeding
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        $this->call([
            RoleSeeder::class,
            SpecializationSeeder::class,
            UserSeeder::class,
            AppointmentSeeder::class,
            AnnouncementSeeder::class,
            GuideSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
