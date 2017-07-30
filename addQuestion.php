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

//$pytanie = test_input($_POST['pytanie']);
$pytanie = $_POST['pytanie'];
$kategoria = test_input($_POST['kategoria']);
$hint1 = test_input($_POST['hint1']);
$hint2 = test_input($_POST['hint2']);
$hint3 = test_input($_POST['hint3']);
$answer = test_input($_POST['answer']);
$wrong_answer1 = test_input($_POST['wrong_answer1']);
$wrong_answer2 = test_input($_POST['wrong_answer2']);
$wrong_answer3 = test_input($_POST['wrong_answer3']);



// read number of questions
$query= "INSERT INTO proposed_questions (text, category, hint1, hint2, hint3, answer, wrong_answer1, wrong_answer2, wrong_answer3)
VALUES ('$pytanie',
'$kategoria',
'$hint1',
'$hint2',
'$hint3',
'$answer',
'$wrong_answer1',
'$wrong_answer2',
'$wrong_answer3'
    );";

if( $result = $conn->query($query)) { echo "Dodano pytanie!"; }
else echo "Pojawił się błąd!";
mysqli_close($conn);
//echo "post: ".var_dump($_POST);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>