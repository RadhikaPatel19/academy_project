@extends('app.layout')

@section('content')
<!-- Chart.js container -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <canvas id="quizResultChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Prepare labels and scores arrays from PHP to JavaScript
    var labels = @json($questionLabels ?? []);
    var scores = @json($questionScores ?? []);

    // Check the data in the browser console (for debugging)
    // console.log("Labels:", labels);
    // console.log("Scores:", scores);

    // Chart.js configuration
    var ctx = document.getElementById('quizResultChart').getContext('2d');
    var quizResultChart = new Chart(ctx, {
        type: 'bar', // Set chart type to 'bar'
        data: {
            labels: labels, // Labels (Quiz attempts)
            datasets: [{
                label: 'Scores', // Dataset label
                data: scores, // Data (Scores from database)
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color for bars
                borderColor: 'rgba(75, 192, 192, 1)', // Border color for bars
                borderWidth: 1 // Border width
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true // Ensure y-axis starts at 0
                }
            }
        }
    });
</script>

@endsection