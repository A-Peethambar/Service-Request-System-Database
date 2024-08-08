<?php
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "library"; // Your database name

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

// Function to check if a book by a specific author is present
function isBookPresent($conn1, $title, $author) {
    $stmt = $conn1->prepare("SELECT availability FROM books WHERE title = ? AND author = ?");
    $stmt->bind_param("ss", $title, $author);
    $stmt->execute();
    $stmt->bind_result($availability);
    $stmt->fetch();
    $stmt->close();

    if ($availability) {
        return "The book '$title' by '$author' is available in the library.";
    } else {
        return "The book '$title' by '$author' is not available in the library.";
    }
}

// Replace 'Book Title' and 'Author Name' with the actual title and author you want to check
$title = 'Book Title';
$author = 'Author Name';

$result = isBookPresent($conn1, $title, $author);
echo $result;

$conn->close();
?>
