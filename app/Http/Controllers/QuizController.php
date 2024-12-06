<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuizResult;
use App\Models\User;

class QuizController extends Controller
{
    // public function index()
    // {
    //     // $questions = Question::all();public function index()

    //     $paginatedQuestions = Question::paginate(3);

    //     // Optionally, get all questions for answer submission
    //     // $questions = Question::all();

    //     return view('quiz.index', compact('paginatedQuestions'));
    // }

    // public function result(Request $request)
    // {
    //     $results = $request->session()->get('quiz_results');
    //     $score = $request->session()->get('quiz_score');
    //     $totalMarks = 30 * 2;  // Assuming 30 questions with 2 points each

    //     return view('quiz.result', compact('results', 'score', 'totalMarks'));
    // }

    // public function submit(Request $request)
    // {
    //     $answers = $request->input('answers');
    //     $score = 0;
    //     $results = [];

    //     // Process answers for all questions
    //     foreach ($answers as $id => $answer) {
    //         $question = Question::find($id);
    //         $isCorrect = $question->correct_option == $answer;

    //         $results[] = [
    //             'question' => $question->question,
    //             'options' => json_decode($question->options),
    //             'correct' => $question->correct_option,
    //             'chosen' => $answer,
    //             'isCorrect' => $isCorrect,
    //         ];

    //         if ($isCorrect) {
    //             $score += 2;  // Add 2 points for each correct answer
    //         }
    //     }

    //     // Save the quiz result to the database
    //     QuizResult::create([
    //         'user_id' => auth()->id(),  // Store the user ID assuming the user is logged in
    //         'score' => $score,
    //         'answers' => json_encode($results),  // Store answers as JSON
    //     ]);

    //     // Clear the answers from session after submission
    //     $request->session()->forget('quiz_answers');  // Remove the stored answers

    //     return redirect()->route('quiz.result')->with([
    //         'results' => $results,
    //         'score' => $score,
    //         'totalMarks' => 30 * 2,  // Assuming 30 questions with 2 points each
    //     ]);
    // }

    public function index()
    {
        // Retrieve the paginated questions
        $questions = Question::all();

        // Retrieve stored answers from session
        $storedAnswers = session('quiz_answers', []);

        return view('quiz.index', compact('questions', 'storedAnswers'));
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers');  // Get the answers from the form submission
        $score = 0;  // Initialize the score
        $results = [];  // Initialize an array to store the results
        $totalQuestions = Question::count();  // Get the total number of questions
        $totalMarks = 60;  // Total marks set to 60 (for 30 questions)

        // Assuming each question is worth 2 points, so totalMarks = 30 * 2
        $marksPerQuestion = 2;  // 2 points per question

        // Process answers for all questions
        foreach ($answers as $id => $answer) {
            $question = Question::find($id);  // Find the question by ID
            $isCorrect = $question->correct_option == $answer;  // Check if the answer is correct

            // Store the result for each question
            $results[] = [
                'question' => $question->question,
                'options' => json_decode($question->options),  // Decode the question options from JSON
                'correct' => $question->correct_option,
                'chosen' => $answer,
                'isCorrect' => $isCorrect,
                'marksForThisQuestion' => $isCorrect ? $marksPerQuestion : 0,  // Calculate marks if correct
            ];

            // Add marks for correct answers
            if ($isCorrect) {
                $score += $marksPerQuestion;  // Add 2 points for a correct answer
            }
        }

        // Save the quiz result to the database with total_marks
        QuizResult::create([
            'user_id' => auth()->id(),
            'score' => $score,
            'total_marks' => $totalMarks,  // Ensure this is passed
            'answers' => json_encode($results),
        ]);

        // Clear session answers after form submission
        session()->forget('quiz_answers');

        // Pass score, results, totalMarks, and totalQuestions to the view
        return view('quiz.result', compact('results', 'score', 'totalMarks', 'totalQuestions'));
    }

    // public function dashboard()
    // {
    //     // Fetch quiz results for the authenticated user
    //     $quizResults = QuizResult::where('user_id', auth()->id())->get();

    //     // Calculate total score by summing up 'score' for each quiz result
    //     $userScore = $quizResults->sum('score');

    //     // Calculate total marks based on the number of quiz results
    //     $totalMarks = 60 * $quizResults->count();

    //     // Extract quiz IDs and scores for the chart
    //     $labels = $quizResults->pluck('id');
    //     $scores = $quizResults->pluck('score');

    //     // Return the view with all necessary data
    //     return view('dashboard', compact('quizResults', 'labels', 'scores', 'totalMarks', 'userScore'));
    // }
}
