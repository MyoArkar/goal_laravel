<?php

namespace Database\Seeders;

use App\Models\Goal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goals = [
            [
                "id" => 1,
                "goal" => json_encode([
                    "name" => "Goal1",
                    "description" => "This is the first goal",
                    "category_id" => 1
                ])
            ],
            [
                "id" => 2,
                "goal" => json_encode([
                    "name" => "Goal2",
                    "description" => "This is the second goal",
                    "category_id" => 2
                ])
            ]
        ];

        foreach($goals as $goal)
        {
            Goal::create($goal);
        }
    }
}
