<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    { {
            $request->validate([
                'rating' => 'required|integer|min:1|max:5', // Ensure rating is between 1 and 5
                'course_id' => 'required|exists:courses,id', // Ensure course exists
            ]);

            // Save or update the rating for the logged-in user and course
            Rating::updateOrCreate(
                ['user_id' => auth()->id(), 'course_id' => $request->course_id],
                ['rating' => $request->rating]
            );

            // return response()->json(['message' => 'Rating submitted successfully!']);
            return redirect()->route('user.details', ['course' => $request->course_id])
                ->with('success', 'Rating submitted successfully!');
        }
    }
}
