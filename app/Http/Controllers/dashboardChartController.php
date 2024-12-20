<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult;

class dashboardChartController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $userId = auth()->id();

        // Fetch quiz results for the authenticated user
        $quizResults = QuizResult::where('user_id', $userId)->get();

        // Debugging: Check if the results are being fetched
        // dd($quizResults);

        if ($quizResults->isEmpty()) {
            return view('dashboard', [
                'questionLabels' => [],
                'questionScores' => [],
            ]);
        }

        // Prepare data for the chart
        $questionLabels = [];
        $questionScores = [];

        // Populate the labels and scores arrays
        foreach ($quizResults as $result) {
            $questionLabels[] = 'Quiz Attempt ' . $result->id;
            $questionScores[] = $result->score;
        }

        // Pass the data to the view
        return view('dashboard', compact('questionLabels', 'questionScores'));
    }
}
