<?php 
$cloudhost = "https://gradesdatabase.azurewebsites.net/"; //endpoint that we will get from azure
$username = "GradesDataBase\$GradesDataBase";
$password = "hNzDuBdfWyTgzZaPiqC1bKyx5uCFW1GDJ3gJmdYk5P7ax40kR6Rze9sfto1Z";
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
