<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = DB::table('genders')->pluck('id');
        $services = DB::table('services')->pluck('id');

        foreach (range(1, 5) as $index) { 
            Patient::create([
                'name' => 'Patient ' . $index,
                'date_of_birth' => now()->subYears(rand(18, 70))->format('Y-m-d'),
                'gender_id' => $genders->random(),
                'service_id' => $services->random(),
                'comments' => 'Sample comments for Patient ' . $index,
            ]);
        }
    }
}
