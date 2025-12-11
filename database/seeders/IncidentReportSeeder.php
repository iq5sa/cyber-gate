<?php

namespace Database\Seeders;

use App\Models\IncidentReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['technical', 'security', 'hr', 'other'];

        for ($i = 0; $i < 10; $i++) {
            IncidentReport::create([
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'incident_type' => fake()->randomElement($types),
                'incident_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'incident_description' => fake()->paragraph(4),
                'attachments' => json_encode([
                    'incident-reports/sample-' . rand(1, 3) . '.pdf',
                    'incident-reports/image-' . rand(1, 3) . '.png',
                ]),
            ]);
        }
    }
}
