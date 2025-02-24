<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} || Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        h1 {
            color: #28a745;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExbXVkZXo1eTF5dTZkM2F6ZzVzdWNpbmxnNTJyZ2pwbnZobWNyMWV5dyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/21HtXqCprrU7Xsr0qo/giphy.gif" alt="">
        <p>Thank you for reaching me out. I will get back to you as soon as possible.</p>
        <a href="{{ route('home') }}" class="btn">Back to Home</a>
    </div>
</body>
</html>