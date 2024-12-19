@extends('user.userapp')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Quiz</h1>



    <form action="{{ route('faq.submit') }}" method="POST" id="quizForm">
        @csrf

        @foreach ($questions as $question)
        <div class="mb-4">
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

    <!-- Result Section -->

</div>

@endsection