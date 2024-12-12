<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add some sample lessons
        Lesson::create([
            'course_id' => 1, // Assume the course with ID 1 exists
            'title' => 'Introduction to Laravel',
            'content' => 'This lesson covers the basics of Laravel framework.',
        ]);

        Lesson::create([
            'course_id' => 1, // Assume the course with ID 1 exists
            'title' => 'Routing in Laravel',
            'content' => 'Learn how to handle routing in Laravel applications.',
        ]);

        Lesson::create([
            'course_id' => 2, // Assume the course with ID 2 exists
            'title' => 'Setting Up Your Environment',
            'content' => 'This lesson helps you set up your development environment for a PHP project.',
        ]);

        Lesson::create([
            'course_id' => 2, // Assume the course with ID 2 exists
            'title' => 'Database Migrations',
            'content' => 'Understand the importance of migrations and how to use them.',
        ]);
    }
}
