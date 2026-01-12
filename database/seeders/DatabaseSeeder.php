<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Website Development',
                'description' => 'Corporate website and admin panel',
               
            ],
            [
                'name' => 'Mobile App',
                'description' => 'Android & iOS application',
                
            ],
            [
                'name' => 'CRM System',
                'description' => 'Customer relationship management software',
               
            ],
        ];

        foreach ($projects as $p) {
            $project = Project::create($p);

           
            // Create 3 tasks for this project
            Task::create([
                'project_id' => $project->id,
                'title' => 'Requirement Analysis',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(5),
            ]);

            Task::create([
                'project_id' => $project->id,
                'title' => 'UI Design',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(10),
            ]);

            Task::create([
                'project_id' => $project->id,
                'title' => 'Development',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(20),
            ]);
        }
    }
}
