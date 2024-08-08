<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Request System Database</title>
    <style>
        body {
            background-image: url('srs.jpg');
            background-size: cover;
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

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        li {
            margin: 10px;
        }

        a {
            display: block;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-5px);
        }

        .notifications {
            margin-top: 20px;
        }

        .notification {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            border-left: 5px solid #4CAF50;
            margin-bottom: 10px;
            border-radius: 5px;
            color: black;
        }

        .notification div {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Service Request System Database</h1>
        <ul>
            <li><a href="home.php">Primary Services</a></li>
            <li><a href="special_services.php">Special Services</a></li>
            <li><a href="complaints.php">Submit Complaint</a></li>
            <li><a href="softwares.php">Software Downloads</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <div class="notifications">
            <h2>Notifications</h2>
            <?php
            require 'config.php';
            $student_id = $_SESSION['student_id'];
            $query = "SELECT * FROM notifications WHERE student_id = '$student_id'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='notification'><div>" . $row['message'] . "</div></div>";
                }
            } else {
                echo "<div>No notifications</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
