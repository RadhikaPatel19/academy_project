@extends('app.layout')

@section('content')

<h1>Quiz</h1>

<form action="{{ route('quiz.submit') }}" method="POST">
    @csrf

    @foreach ($questions as $question)
    <div>
        <h3>{{ $question->question }}</h3>
        @foreach (json_decode($question->options) as $index => $option)
        <div>
            <label>
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $index }}">
                {{ $option }}
            </label>
        </div>
        @endforeach
    </div>
    <hr>
    @endforeach

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection