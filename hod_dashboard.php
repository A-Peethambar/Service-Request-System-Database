<?php
session_start();

if (!isset($_SESSION['hod_id'])) {
    header('location: index.php');
    exit();
}

require 'config.php';

// Handle approval of complaints
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['approve_complaint'])) {
        $complaint_id = $_POST['complaint_id'];
        $student_id = $_POST['student_id'];
        $query = "DELETE FROM complaints WHERE id = '$complaint_id'";
        mysqli_query($conn, $query);
        $notification = "Your complaint has been received. Meet the HOD in the cabin.";
        $query = "INSERT INTO notifications (student_id, message) VALUES ('$student_id', '$notification')";
        mysqli_query($conn, $query);
    }
}

// Fetch complaints
$complaints = mysqli_query($conn, "SELECT * FROM complaints");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOD Dashboard</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>HOD Dashboard</h1>
        <h2>Complaints</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Complaint Type</th>
                <th>Complaint</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($complaints)) { ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['complaint_type']; ?></td>
                <td><?php echo $row['complaint']; ?></td>
                <td>
                    <form action="hod_dashboard.php" method="post">
                        <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                        <button type="submit" name="approve_complaint" class="button">Approve</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
