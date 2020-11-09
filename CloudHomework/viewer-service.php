<?php
$cloudhost = "https://gradesdatabase.azurewebsites.net/"; //endpoint that we will get from azure
$username = "GradesDataBase\$GradesDataBase";
$password = "hNzDuBdfWyTgzZaPiqC1bKyx5uCFW1GDJ3gJmdYk5P7ax40kR6Rze9sfto1Z";
$database = "gradesDB";

$conn = new mysqli($cloudhost, $username, $password, $database);

//check connection 
if ($conn -> connection_errno) {
    dies("Failed to connect to MySQL: " . $conn -> connect_error);
}

//get grades from database
if ($result = $conn -> query("SELECT studentID, AVG(grades) FROM gradesTable GROUP BY studentID")) {
?>

<table>

<?php 
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["studentID"] . "</td>";
        echo "<td>" . $row["grades"] . "</td>";
        echo "</tr>";
    }
?>

</table>

<?php
    //free up memory 
    $result -> free_result();
}

//close connection
$conn -> close();
?>
