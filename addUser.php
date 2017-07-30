<?php
$servername = "localhost";
$username = "rubikon_quizzer";
$password = "Quizz3r";
$dbname = "rubikon_quizzer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");


mysqli_close($conn);
?>