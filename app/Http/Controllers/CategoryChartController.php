<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryChartController extends Controller
{
    public function index()
    {
        // Fetch main categories
        $categories = Category::with('children')->whereNull('parent_id')->get();

        // Prepare data for the charts
        $categoryData = [];
        foreach ($categories as $category) {
            $categoryData[] = [
                'name' => $category->name,
                'count' => $category->children->count()
            ];
        }

        // Pass the data to the view
        return view('dashboard', compact('categoryData'));
    }
}
