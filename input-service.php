<?php
$host = 'gradesdbserver.database.windows.net';
$username = 'raroepke';
$password = 'hellohello_22';
$db_name = 'gradesdatabase';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
//accept grades from either form or AJAX request
$studentID = $_POST["studentID"];
$grades = $_POST["grades"];

//set up inset command
$stmt = $conn->prepare("INSERT INTO GradesTable (studentID, grades) VALUES (?,?)");
$stmt->bind_param("id", $studentID, $grades);\

$stmt->execute();
?>
