<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    public function store(Request $request, $courseId)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create the lesson and associate it with the course
        $course = Course::findOrFail($courseId);
        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $course->id;
        $lesson->save();

        // Redirect back to the course details page
        return redirect()->route('user.details', $courseId)->with('success', 'Lesson added successfully!');
    }
}
