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
