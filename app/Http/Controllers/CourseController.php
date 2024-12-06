<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CourseController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        //  dd($categories); // This will dump the categories array and stop execution
        return view('courses.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'status' => 'required|in:Active,Private,Upcoming,Pending,Draft,Inactive',
            'category_id' => 'required|exists:categories,id',  // Ensure the selected category is valid
            'pricing_type' => 'required|in:Paid,Free',
            'price' => 'nullable|required_if:pricing_type,Paid|numeric|min:0',
            'has_discount' => 'nullable|boolean',
            'discounted_price' => 'nullable|numeric|min:0|lt:price|required_if:pricing_type,Paid',
            'thumbnail_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('thumbnails', 'public');
        }

        // Store the course
        Course::create($validated);

        return redirect()->route('courses.create')->with('success', 'Course added successfully!');
    }


    public function index(Request $request)
    {
        // $courses = Course::with('category')->get(); // Fetch courses with their category
        // $courses = Course::with('category')->paginate(5); // Paginate courses, 10 per page
        // return view('courses.index', compact('courses'));

        $categories = Category::all();

        // Query to get courses with filtering
        $courses = Course::with('category');

        // Apply filters if they are present in the request
        if ($request->has('title') && $request->title != '') {
            $courses = $courses->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $courses = $courses->where('category_id', $request->category_id);
        }

        if ($request->has('status') && $request->status != '') {
            $courses = $courses->where('status', $request->status);
        }

        if ($request->has('price') && $request->price != '') {
            $courses = $courses->where('price', '<=', $request->price);
        }

        // Paginate the results
        $courses = $courses->paginate(5);

        return view('courses.index', compact('courses', 'categories'));
    }


    public function edit($id)
    {
        // Retrieve the course and its category
        $course = Course::with('category')->findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'status' => 'required|in:Active,Private,Upcoming,Pending,Draft,Inactive',
            'category_id' => 'required|exists:categories,id',
            'pricing_type' => 'required|in:Paid,Free',
            'price' => 'nullable|required_if:pricing_type,Paid|numeric|min:0',
            'has_discount' => 'nullable|boolean',
            'discounted_price' => 'nullable|numeric|min:0|lt:price|required_if:pricing_type,Paid',
            'thumbnail_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Check if a new thumbnail image was uploaded
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('thumbnails', 'public');
        }

        // Find and update the course
        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        // Find and delete the course
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}