<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuizResult;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FAQController extends Controller
{
    public function index()
    {
        $questions = Question::all();  // Fetch all questions from the database
        $quizResult = QuizResult::latest()->first();
        // Retrieve stored answers from session
        $storedAnswers = session('quiz_answers', []);
        return view('user.faq', compact('questions', 'storedAnswers', 'quizResult')); // Pass questions to the view
    }

    public function submit(Request $request)
    {
        $request->validate([
            'answers.*' => 'required|integer',  // Ensure every answer is required and is an integer
        ], [
            'answers.*.required' => 'You must answer all questions.',  // Custom error message if not answered
        ]);

        // If validation passes, process the answers
        $answers = $request->input('answers');  // Get the answers from the form submission
        $score = 0;  // Initialize the score
        $results = [];  // Initialize an array to store the results
        $questions = Question::all();  // Fetch all questions from the database
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
        $quizResult = QuizResult::create([
            'user_id' => auth()->id(),
            'score' => $score,
            'total_marks' => $totalMarks,  // Ensure this is passed
            'answers' => json_encode($results),
        ]);

        // Clear session answers after form submission
        session()->forget('quiz_answers');
        $user = Auth::user()->name;

        // Pass score, results, totalMarks, totalQuestions, and questions to the view
        return view('user.faqresult', compact('results', 'score', 'totalMarks', 'totalQuestions', 'questions', 'user', 'quizResult'));
    }

    public function downloadResult($id)
    {
        $quizResult = QuizResult::findOrFail($id); // Fetch the result using the ID
        $user = User::findOrFail($quizResult->user_id); // Fetch the user

        // Prepare data for the PDF
        $data = [
            'user' => $user->name,
            'score' => $quizResult->score,
            'totalMarks' => $quizResult->total_marks,
            'results' => json_decode($quizResult->answers, true),
        ];

        // Generate the PDF
        $pdf = Pdf::loadView('user.quiz_result', $data);

        // Return the PDF for download
        return $pdf->download('quiz_result.pdf');
    }
}
