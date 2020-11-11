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


$stmt = $conn->query("SELECT * FROM GradesTable");
while ($row = $stmt->fetch()) {
    echo $row['grades']."<br />\n";
}

?>
