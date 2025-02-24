<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
            background: #0073e6;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .header img {
            max-width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .content {
            padding: 20px;
            text-align: center;
            color: #333;
        }
        .content img {
            max-width: 100%;
            border-radius: 10px;
        }
        .button {
            display: inline-block;
            background: #0073e6;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExcjU4OG10cTUzYms0ODZqZjZ1YnRxN3g2ejc2bWJzZzF3aDZzcDJ2cSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/z5Ttbd0SnyDwT47bSQ/giphy.gif" alt="Animated Banner">
            <h1>Thank You for Reaching Out!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $details['name'] }},</p>
            <p>Thank you for reaching out to me. I truly appreciate your time and want you to know that your inquiry is important to me.</p>

            <p>I have received your message and will get back to you as soon as possible. Your concerns matter, and I am here to assist you.</p>

            <p>If you have any urgent questions, please don’t hesitate to contact me directly.</p>
            <p>kinshukguhadev.2024@gmail.com</p>

            <p>Looking forward to connecting with you soon!</p>
            
            <p><strong>Note:</strong> This is an automated email—please do not reply to this message.</p>
        </div>
        <div class="footer">
            <p>&copy; 2025 Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
