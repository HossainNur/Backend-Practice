<?php
$servername ="localhost";
$dbname ="demo_api";
$username ="root";
$password ="";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn -> connect_error) {
    die("error" . $conn -> connect_error);
}
echo "success";

?>