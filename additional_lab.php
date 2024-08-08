<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $student_id = $_SESSION['student_id'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $service = "additional lab";

    $query = "INSERT INTO other_requests (student_id, service_type, description) VALUES ('$student_id', '$service', '$description')";
    mysqli_query($conn, $query);
    header('location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Additional Lab Request</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label, textarea, input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            color: black;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Additional Lab Request</h1>
        <form action="" method="post">
            <label for="description">Reason for Request:</label>
            <textarea id="description" name="description" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
