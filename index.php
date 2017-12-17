<?php
    include("dbh.php"); 

start($conn);
addEngenieer ($conn);

function start ($conn) {
// sql to create table
    $EngenieersTable = "CREATE TABLE IF NOT EXISTS Engenieers (
            eng_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            date_of_birth Date,
            age int(3),
            address VARCHAR(50),
            phone_number int(10)
    )";


////////////////////////////////////////////////////////////////
    $ProjectsTable =  "CREATE TABLE IF NOT EXISTS Projects (
            project_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            project_name VARCHAR(30) NOT NULL,
            description VARCHAR(100),
            customer_name VARCHAR(30) NOT NULL,
            start_date Date
    )";

     $devtoolsTable  =  "CREATE TABLE IF NOT EXISTS Dev_Tools (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            tool_name VARCHAR(30),
    )";

     $MileStonesTable =  "CREATE TABLE IF NOT EXISTS Mile_Stones (
            mile_stone_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            description VARCHAR(100),
            price int(5),
            due_date Date
    )";

    $SoftwareIntrestsTable  =  "CREATE TABLE IF NOT EXISTS SoftwareIntrests (
            intrest_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            intrest_name VARCHAR(30) NOT NULL,
            expertise VARCHAR(30) NOT NULL
    )";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    if (mysqli_query($conn, $EngenieersTable) && mysqli_query($conn, $ProjectsTable) && mysqli_query($conn, $SoftwareIntrestsTable) && mysqli_query($conn, $devtoolsTable) && mysqli_query($conn, $MileStonesTable)) {
        echo "Tables created successfully"; 
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}

function addEngenieer ($conn) {
   $EngenieersTable = "INSERT INTO Engenieers (eng_id, firstname, lastname, email, date_of_birth, age, address, phone_number)
    VALUES (1115 ,'Yotam', 'Akshota', 'yotam@gmail.com', '2008-11-11', 26, 'tel aviv', 0508818837)";

    if (mysqli_query($conn, $EngenieersTable)) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $EngenieersTable . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);

?>