<?php
    include("dbh.php"); 

start($conn);
//addEngenieer ($conn);

function start ($conn) {
// sql to create table
    $EngenieersTable = "CREATE TABLE IF NOT EXISTS Engenieers (
            eng_id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            date_of_birth Date,
            age int(3),
            address VARCHAR(50),
            phone_number int(10),
            intrest_fk int(6) UNSIGNED,
            FOREIGN KEY (intrest_fk) REFERENCES SoftwareIntrests(intrest_id)
    )";

     $PhoneNumbersTable = "CREATE TABLE IF NOT EXISTS PhoneNumbers (
            PhoneNumber int (10) NOT NULL  PRIMARY KEY,
            eng_id_fk int(6) UNSIGNED,
            FOREIGN KEY (eng_id_fk) REFERENCES Engenieers(eng_id)
    )";

////////////////////////////////////////////////////////////////
    $ProjectsTable =  "CREATE TABLE IF NOT EXISTS Projects (
            project_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            project_name VARCHAR(30) NOT NULL,
            description VARCHAR(100),
            customer_name VARCHAR(30) NOT NULL,
            start_date Date,
            mile_stone_fk INT(6) UNSIGNED,
            devtools_fk INT(6) UNSIGNED,
            FOREIGN KEY (devtools_fk) REFERENCES Dev_Tools(devtools_id),
            FOREIGN KEY (mile_stone_fk) REFERENCES Mile_Stones(mile_stone_id)
    )";

     $devtoolsTable  =  "CREATE TABLE IF NOT EXISTS Dev_Tools (
            devtools_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            tool_name VARCHAR(30)
    )";

     $MileStonesTable =  "CREATE TABLE IF NOT EXISTS Mile_Stones (
            mile_stone_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            description VARCHAR(100),
            price int(5),
            due_date Date
    )";


////////////////*  software Intrests Table  *///////////////////////////////////////////
    $SoftwareIntrestsTable  =  "CREATE TABLE IF NOT EXISTS SoftwareIntrests (
            intrest_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            intrest_name VARCHAR(30) NOT NULL,
            expertise VARCHAR(30) NOT NULL
    )";

    $projects_engenieersTable =  "CREATE TABLE IF NOT EXISTS projects_engenieers (
            project_id_fk INT(6) UNSIGNED,
            eng_id_fk INT(6) UNSIGNED,
            FOREIGN KEY (project_id_fk) REFERENCES Projects(project_id),
            FOREIGN KEY (eng_id_fk) REFERENCES Engenieers(eng_id),
            grade INT(6)
    )";



    if (mysqli_query($conn, $devtoolsTable) && mysqli_query($conn, $MileStonesTable) && mysqli_query($conn, $SoftwareIntrestsTable)) {
        echo "Tables created successfully"; 
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }



if (mysqli_query($conn, $EngenieersTable)&& mysqli_query($conn, $ProjectsTable) && mysqli_query($conn, $projects_engenieersTable) && mysqli_query($conn, $PhoneNumbersTable)) {
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