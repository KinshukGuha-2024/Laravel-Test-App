<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .info {
            margin-bottom: 15px;
        }
        .info strong {
            color: #007bff;
        }
        .message-box {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #007bff;
            border-radius: 5px;
            font-style: italic;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        <p class="info"><strong>Name:</strong> {{ $details['name']}}</p>
        <p class="info"><strong>Email:</strong> {{ $details['email']}}</p>
        <p class="info"><strong>Subject:</strong> {{ $details['subject']}}</p>
        <div class="message-box">
            <strong>Message:</strong>
            <p>{{$details['message']}}</p>
        </div>
        <p class="footer">This email was generated from the contact form on your website.</p>
    </div>
</body>
</html>
