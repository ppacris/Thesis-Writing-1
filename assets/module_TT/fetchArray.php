<?php
require_once '../includes/DBHandler.php';

$query = "SELECT Time FROM bscs";
$result = mysqli_query($conn, $query);
$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row['Time'];
}
echo json_encode($data);
$result->free_result();
?>
