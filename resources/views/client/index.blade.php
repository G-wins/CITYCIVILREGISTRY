<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Civil Registry - Choose Document Option</title>
    <style>
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .button {
            padding: 15px 30px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; margin-top: 30px;">City Civil Registry Appointment</h2>
    <div class="button-container">
        <a href="{{ route('existing_document') }}" class="button">Existing Document</a>
        <a href="{{ route('new_document') }}" class="button">New Document Request</a>
    </div>
</body>
</html>
