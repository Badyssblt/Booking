<?php
$sql = $_GET["sql"];
require("../class/Db.php");
$db = new Database("localhost", "root", "", "bookingfe");
$stmt = $db->query($sql);

$response = $stmt;

echo json_encode($response);

?>