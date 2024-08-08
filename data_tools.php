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
    <title>Data Tools</title>
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
        <h1>Data Mining and Visualization Tools</h1>
        <a href="https://www.cs.waikato.ac.nz/ml/weka/" target="_blank" class="tool">
            <h2>Weka</h2>
        </a>
        <a href="https://www.tableau.com/" target="_blank" class="tool">
            <h2>Tableau</h2>
        </a>
        <a href="https://powerbi.microsoft.com/" target="_blank" class="tool">
            <h2>Power BI</h2>
        </a>
    </div>
</body>
</html>
