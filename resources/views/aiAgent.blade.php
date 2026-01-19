<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Edu Helper') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background: #f5f7fa;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            background: #2563eb;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .note {
            background: #eef2ff;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .response {
            margin-top: 20px;
            padding: 15px;
            background: #f1f5f9;
            border-radius: 6px;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Hi....,Iam a EduHelper Chatbot 🤖</h2>

    <div class="note">
        <strong>Note:</strong> Only the following topics are allowed:
        <ul>
            <li>Solar System</li>
            <li>Fractions</li>
            <li>Water Cycle</li>
        </ul>
    </div>

    <input type="text" id="question" placeholder="Enter your question here..." />

    <button onclick="sendQuestion()">Submit</button>

    <div id="response" class="response" style="display:none;"></div>
</div>

<script>
    function sendQuestion() {
        const question = document.getElementById('question').value;
        const responseBox = document.getElementById('response');

        if (!question) {
            alert('Please enter a question');
            return;
        }

        fetch('/chat', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ question: question })
})
.then(res => res.json())
.then(data => {
    responseBox.style.display = 'block';
    responseBox.innerHTML = `<strong>EduHelper:</strong> ${data.reply}`;
})
.catch(error => {
    responseBox.style.display = 'block';
    responseBox.innerHTML = 'Something went wrong. Please try again.';
});
    }
</script>
</body>
</html>
