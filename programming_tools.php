<?php
session_start();

if (!isset($_SESSION['student_id']) && !isset($_SESSION['ct_id']) && !isset($_SESSION['hod_id']) && !isset($_SESSION['admin_id'])) {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programming Tools</title>
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
            text-align: center;
        }

        .tool {
            display: inline-block;
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            color: black;
        }

        .tool:hover {
            background-color: #f0f0f0;
        }

        .tool h2 {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Programming Tools</h1>
        <a href="https://c-free.en.softonic.com/" target="_blank" class="tool">
            <h2>C</h2>
        </a>
        <a href="https://bloodshed-dev-c.en.softonic.com/" target="_blank" class="tool">
            <h2>C++</h2>
        </a>
        <a href="https://www.eclipse.org/downloads/packages/" target="_blank" class="tool">
            <h2>Java</h2>
        </a>
        <a href="https://cran.r-project.org/" target="_blank" class="tool">
            <h2>R Programming</h2>
        </a>
        <a href="https://www.anaconda.com/download" target="_blank" class="tool">
            <h2>Python</h2>
        </a>
        <a href="https://www.apachefriends.org/index.html" target="_blank" class="tool">
            <h2>XAMPP</h2>
        </a>
    </div>
</body>
</html>
