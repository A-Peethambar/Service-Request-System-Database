<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Services</title>
    <style>
        body {
            background-image: url('srs.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: black;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .module-links {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .module-links a {
            display: block;
            width: 45%;
            margin: 10px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s, transform 0.3s;
        }

        .module-links a:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Special Services</h1>
        <div class="module-links">
            <a href="transcript_request.php">Transcript Request</a>
            <a href="additional_lab.php">Additional Lab Request</a>
        </div>
    </div>
</body>
</html>
