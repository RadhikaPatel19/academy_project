@extends('app.layout')

@section('content')

<h1>Quiz Result</h1>

<div>
    <h3>Your Score: {{ $score }} / {{ $totalMarks }}</h3>
    <h4>Total Questions: {{ $totalQuestions }}</h4>
</div>

<hr>

@foreach ($results as $result)
<div>
    <p><strong>Question:</strong> {{ $result['question'] }}</p>
    <p><strong>Chosen Answer:</strong> {{ $result['options'][$result['chosen']] }}</p>
    <p><strong>Correct Answer:</strong> {{ $result['options'][$result['correct']] }}</p>
    <p><strong>Status:</strong>
        @if ($result['isCorrect'])
        Correct
        @else
        Incorrect
        @endif
    </p>
</div>
<hr>
@endforeach

@endsection