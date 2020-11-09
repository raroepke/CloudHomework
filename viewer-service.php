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

//get grades from database
if ($result = $conn -> query("SELECT studentID, AVG(grades) FROM GradesTable GROUP BY studentID")) {
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
