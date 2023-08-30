<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create(['name' => 'Medical Checkup', 'description' => 'Comprehensive medical examination']);
        Service::create(['name' => 'X-ray', 'description' => 'Radiographic imaging']);
        Service::create(['name' => 'Blood Test', 'description' => 'Laboratory analysis of blood samples']);
    }
}
