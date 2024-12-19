<!DOCTYPE html>
<html>

<head>
    <title>Quiz Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Quiz Result</h1>
    <p><strong>Name:</strong> {{ $user }}</p>
    <p><strong>Score:</strong> {{ $score }}/{{ $totalMarks }}</p>

    <h2>Detailed Results</h2>
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Chosen Option</th>
                <th>Correct Option</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td>{{ $result['question'] }}</td>
                <td>{{ $result['chosen'] }}</td>
                <td>{{ $result['correct'] }}</td>
                <td>{{ $result['marksForThisQuestion'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>