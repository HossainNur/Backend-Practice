<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
    echo '{"result": "get received"}';
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

?>