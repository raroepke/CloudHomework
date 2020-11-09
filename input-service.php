<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:gradesdbserver.database.windows.net,1433; Database = gradesdatabase", "raroepke", "hellohello_22");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

//accept grades from either form or AJAX request
$studentID = $_POST["studentID"];
$grades = $_POST["grades"];

//set up inset command
$stmt = $conn->prepare("INSERT INTO GradesTable (studentID, grades) VALUES (?,?)");
$stmt->bind_param("id", $studentID, $grades);\

$stmt->execute();
?>
