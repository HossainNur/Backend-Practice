<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
    handleGetRequest();
    break;

    case 'POST':
    echo '{"result": "post received"}';
    break;

    case 'PUT':
    echo '{"result": "put received"}';
    break;

    case 'DELETE':
    echo '{"result": "delete received"}';
    break;

    default:
    echo '{"result": "un defiend"}';
    break;
}

function handleGetRequest(){
    include "db.php";

    $sql = "SELECT * FROM demo_api";

    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $rows = array();
  while($row = mysqli_fetch_assoc($result)) {
    $rows["result"][] = $row;
  }
  echo json_decode($rows);
}
else {
  echo '{"result": "No data found"}';
}
}
?>