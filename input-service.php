<?php 
$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "realgradesdbserver.mysql.database.azure.com", "raroepke@realgradesdbserver", {your_password}, {your_database}, 3306);

$cloudhost = "https://gradesdatabase.azurewebsites.net/"; //endpoint that we will get from azure
$username = "un";
$password = "pw";
$database = "realgradesdbserver";

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
