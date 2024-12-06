<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create main categories
        $yoga = Category::create(['name' => 'Yoga']);
        $webDevelopment = Category::create(['name' => 'Web Development']);
        $userExperience = Category::create(['name' => 'User Experience']);

        // Create subcategories for Yoga
        Category::create(['name' => 'Vinyasa Yoga', 'parent_id' => $yoga->id]);
        Category::create(['name' => 'Restorative Yoga', 'parent_id' => $yoga->id]);
        Category::create(['name' => 'Tantra', 'parent_id' => $yoga->id]);

        // Create subcategories for Web Development
        Category::create(['name' => 'Laravel', 'parent_id' => $webDevelopment->id]);
        Category::create(['name' => 'Responsive Design', 'parent_id' => $webDevelopment->id]);
        Category::create(['name' => 'Bootstrap', 'parent_id' => $webDevelopment->id]);
        Category::create(['name' => 'HTML & CSS', 'parent_id' => $webDevelopment->id]);

        // Create subcategories for User Experience
        Category::create(['name' => 'User Experience Design', 'parent_id' => $userExperience->id]);
        Category::create(['name' => 'Mobile App Design', 'parent_id' => $userExperience->id]);
        Category::create(['name' => 'User Interface', 'parent_id' => $userExperience->id]);
        Category::create(['name' => 'Design Thinking', 'parent_id' => $userExperience->id]);
        Category::create(['name' => 'Figma', 'parent_id' => $userExperience->id]);
    }
}
