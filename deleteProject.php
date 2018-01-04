<?php
$data = json_decode(file_get_contents("php://input"));
include "dbh.php";
$sql = "DELETE FROM projects WHERE project_id = $data->id ";
$result = $conn->query($sql);
$conn->close();
?>