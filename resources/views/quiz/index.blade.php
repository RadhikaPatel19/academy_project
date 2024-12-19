@extends('app.layout')

@section('content')

<div class="container my-5">
    <h1 class="text-center">Quiz Results</h1>

    @if($quizResults->isNotEmpty())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Score</th>
                <th>Total Marks</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizResults as $result)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $result->user->name ?? 'Unknown' }}</td> <!-- Show user name -->
                <td>{{ $result->score }}</td>
                <td>{{ $result->total_marks }}</td>
                <td>{{ $result->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="d-flex justify-content-center">
        {{ $quizResults->links() }}
    </div> -->
    <div class="d-flex justify-content-center">
        <div>

            {{ $quizResults->links('vendor.pagination.custom') }}
        </div>
    </div>
    @else
    <p class="text-center">No quiz results available.</p>
    @endif
</div>

@endsection