<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header('location: index.php');
    exit();
}

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_SESSION['student_id'];
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $proof = $_FILES['proof']['name'];
    $target_dir = "proofs/";
    $target_file = $target_dir . basename($proof);

    if (move_uploaded_file($_FILES['proof']['tmp_name'], $target_file)) {
        $query = "INSERT INTO leave_requests (student_id, purpose, document) VALUES ('$student_id', '$purpose', '$proof')";
        if (mysqli_query($conn, $query)) {
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Request</title>
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
        <h1>Leave Request</h1>
        <form action="leave_request.php" method="post" enctype="multipart/form-data">
            <label for="purpose">Purpose for Leave:</label>
            <textarea id="purpose" name="purpose" required></textarea><br>
            <label for="proof">Upload Proof Document:</label>
            <input type="file" id="proof" name="proof" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
