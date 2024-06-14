<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
    handleGetRequest();
    break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);  
        handlePostRequest($data);
    
    break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);  
        hanadlePutRquest($data);
    break;

    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);  // true means you can convert data to array
        handleDeleteRequest($data);
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
       while($r = mysqli_fetch_assoc($result)) {
          $rows["result"][] = $r; // with result object
        //  $rows[] = $r; // only array
       }
      echo json_encode($rows);

    } else {
        echo '{"result": "No data found"}';
    }
}

function handlePostRequest($data){
    include "db.php";

    $name = $data["name"];
    $phone = $data["phone"];


    $sql = "INSERT INTO demo_api(name, phone, exe_time) VALUES('$name', '$phone', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo '{"result": "Success"}';
    } else {
        echo '{"result": "Sql error"}';
    
    }
}

function handleDeleteRequest($data){

    include "db.php";

    $id = $data["id"];

    $sql = "DELETE FROM demo_api WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo '{"result": "Success"}';
    } else {
        echo '{"result": "Sql error"}';
    }

  }


  function hanadlePutRquest($data){
    include "db.php";

    $id = $data["id"];
    $name = $data["name"];
    

    $sql = "UPDATE demo_api SET name = '$name', phone = '$phone',  exe_time = NOW() WHERE id = '$id'";

    if (mysqli_query($conn, $sql) or die()) {
        echo '{"result": "Success"}';
    } else {
        echo '{"result": "Sql error"}';
    }

  }
  

?>