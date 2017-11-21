<?php
    include("dbh.php"); 

start($conn);

function start ($conn) {
// sql to create table
    $ProgramersTable = "CREATE TABLE IF NOT EXISTS Programers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50)
    )";

    $ProjectsTable =  "CREATE TABLE IF NOT EXISTS Project (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(30) NOT NULL,
            customer VARCHAR(30) NOT NULL
    )";

    $DevResponsibilitiesTable  =  "CREATE TABLE IF NOT EXISTS DevResponsibilities (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(30) NOT NULL,
            expertise VARCHAR(30) NOT NULL
    )";

    if (mysqli_query($conn, $ProgramersTable) && mysqli_query($conn, $ProjectsTable) && mysqli_query($conn, $DevResponsibilitiesTable)) {
        echo "Tables created successfully"; 
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}



mysqli_close($conn);

?>