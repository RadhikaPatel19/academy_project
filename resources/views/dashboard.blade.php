@extends('app.layout')

@section('content')
<!-- Chart.js container -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Bar chart</h2>
            <canvas id="quizResultChart"></canvas>
        </div>

        <!-- <div class="col-md-12">
            -- Donut chart --
        <h2>Donut Chart score</h2>
        <div class="col-md-6">
            <canvas id="quizResultDonutChart"></canvas>
        </div>
    </div> -->
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


    // Donut Chart configuration
    // var ctxDonut = document.getElementById('quizResultDonutChart').getContext('2d');
    // var quizResultDonutChart = new Chart(ctxDonut, {
    //     type: 'doughnut', // Set chart type to 'doughnut' (donut chart)
    //     data: {
    //         labels: labels, // Labels (Quiz attempts)
    //         datasets: [{
    //             label: 'Scores Distribution', // Dataset label
    //             data: scores, // Data (Scores from database)
    //             backgroundColor: [
    //                 'rgba(75, 192, 192, 0.2)', // Slice 1 color
    //                 'rgba(153, 102, 255, 0.2)', // Slice 2 color
    //                 'rgba(255, 159, 64, 0.2)', // Slice 3 color
    //                 'rgba(54, 162, 235, 0.2)' // Slice 4 color
    //             ],
    //             borderColor: [
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)',
    //                 'rgba(54, 162, 235, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         cutoutPercentage: 60, // This creates the donut effect
    //         plugins: {
    //             legend: {
    //                 position: 'top', // Position legend at the top
    //             }
    //         }
    //     }
    // });
</script>

@endsection