<?php 
$cloudhost = "...azure.net"; //endpoint that we will get from azure
$username = "un";
$password = "pw";
$database = "gradesDB";

$conn = new mysqli($cloudhost, $username, $password, $database);

//check connection
if($conn -> connect_errno){
    die("Failed to connect to MySQL: " . $conn -> connect_error);
}

//accept grades from either form or AJAX request
$studentID = $_POST["studentID"];
$grades = $_POST["grades"];

//set up inset command
$stmt = $conn->prepare("INSERT INTO GradesTable (studentID, grades) VALUES (?,?)");
$stmt->bind_param("id", $studentID, $grades);\

$stmt->execute();
?>