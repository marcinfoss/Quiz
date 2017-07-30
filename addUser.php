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

$name = $_POST['name'];
$mail = crypt($_POST['mail']);
$passwd = crypt(test_input($_POST['passwd']));

$query= "INSERT INTO quizers (login, mail, password)
VALUES ('$name',
'$mail',
'$passwd'
    );";


if( $result = $conn->query($query)) { echo "Dodano użytkownika!"; }
else echo "Pojawił się błąd!";

mysqli_close($conn);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>