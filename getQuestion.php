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

// read number of questions
$query= "SELECT COUNT(*) as qnumber FROM questions";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $NUMBER_OF_QUESTIONS = intval ($row['qnumber']);
        //echo "Liczba pytań w bazie: " . $row['qnumber']."<br>";
    }
} else {
    echo "Error!";
}

// choose random questions
$question_number = rand(1, $NUMBER_OF_QUESTIONS);

$query= "SELECT * FROM questions WHERE ID_question = ".$question_number.";";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) {
    
    $ID_question = $row['ID_question'];
    $text = $row['text'];
    $category = $row['category'];
    $hint1 = $row['hint1'];
    $hint2 = $row['hint2'];
    $hint3 = $row['hint3'];
    $answer = $row['answer'];
    $wrong_answer1 = $row['wrong_answer1'];
    $wrong_answer2 = $row['wrong_answer2'];
    $wrong_answer3 = $row['wrong_answer3'];

    echo json_encode(array($ID_question, $text, $category, $hint1, $hint2, $hint3, $answer, $wrong_answer1, $wrong_answer2, $wrong_answer3));
}

mysqli_close($conn);
?>
