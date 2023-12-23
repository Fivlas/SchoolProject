<?php
function connectToDatabase() {
    $servername = "sql.24.svpj.link";
    $username = "db_92584";
    $password = "2y1yj0gr";
    $dbname = "db_92584";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>