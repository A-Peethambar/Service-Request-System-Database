<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $query = "";
    $redirect_page = "";

    switch ($user_type) {
        case "student":
            $query = "SELECT * FROM students WHERE student_id = ? AND password = ?";
            $redirect_page = "dashboard.php";
            break;
        case "ct":
            $query = "SELECT * FROM class_teachers WHERE ct_id = ? AND password = ?";
            $redirect_page = "ct_dashboard.php";
            break;
        case "hod":
            $query = "SELECT * FROM hods WHERE hod_id = ? AND password = ?";
            $redirect_page = "hod_dashboard.php";
            break;
        case "admin":
            $query = "SELECT * FROM admins WHERE admin_id = ? AND password = ?";
            $redirect_page = "admin_home.php";
            break;
        default:
            echo "Invalid user type.";
            exit();
    }

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $user_id, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION[$user_type . '_id'] = $row[$user_type . '_id'];
            header('location: ' . $redirect_page);
        } else {
            echo "Invalid credentials for user type: " . htmlspecialchars($user_type);
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . htmlspecialchars($conn->error);
    }
}

$conn->close();
?>
