<?php
session_start();

if (!isset($_SESSION['ct_id'])) {
    header('location: index.php');
    exit();
}

require 'config.php';

// Handle approval of leave requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['approve_leave_request'])) {
        $request_id = $_POST['request_id'];
        $student_id = $_POST['student_id'];
        $query = "DELETE FROM leave_requests WHERE id = '$request_id'";
        mysqli_query($conn, $query);
        $notification = "Your leave request has been approved. Meet the class teacher for further procedures.";
        $query = "INSERT INTO notifications (student_id, message) VALUES ('$student_id', '$notification')";
        mysqli_query($conn, $query);
    }
}

// Fetch leave requests
$leave_requests = mysqli_query($conn, "SELECT * FROM leave_requests");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class Teacher Dashboard</title>
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
        <h1>Class Teacher Dashboard</h1>
        <h2>Leave Requests</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Purpose</th>
                <th>Document</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($leave_requests)) { ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><a href="proofs/<?php echo $row['document']; ?>" target="_blank">View Document</a></td>
                <td>
                    <form action="ct_dashboard.php" method="post">
                        <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                        <button type="submit" name="approve_leave_request" class="button">Approve</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
