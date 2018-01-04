<?php
$data = json_decode(file_get_contents("php://input"));
include "dbh.php";
$sql = "DELETE FROM Engenieers WHERE eng_id = $data->id ";
$result = $conn->query($sql);
$conn->close();
?>