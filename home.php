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
    <title>Student Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('srs.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            color: black;
        }

        .container {
            width: 80%;
            margin: 20px auto;
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
        <h1>Primary Services</h1>
        <div class="module-links">
            <a href="leave_request.php">Leave Request</a>
            <a href="bonafide_request.php">Bonafide Request</a>
        </div>
    </div>
</body>
</html>
