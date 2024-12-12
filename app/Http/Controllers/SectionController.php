<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Course;

class SectionController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $section = new Section();
        $section->course_id = $course->id; // The course the section belongs to
        $section->lesson_id = $validated['lesson_id'];
        $section->title = $validated['title'];
        $section->content = $validated['content'];

        $section->save(); // Save the section

        return redirect()->route('user.details', $course->id)->with('success', 'Section added successfully!');
    }
}
