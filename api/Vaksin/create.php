<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/database.php';
include_once '../objects/vaksin.php';


$database = new Database();
$db = $database->getConnection();

$vaksin = new Vaksin($db);

// get posted data

$data = $_POST['vaksin'];

// make sure data is not empty
if (isset($data['nama_vaksin'])) {

    // set product property values
    $vaksin->nama_vaksin = $data['nama_vaksin'];

    // create the vaksin
    if ($vaksin->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "vaksin Telah Di Tambahkan !.", "status" => 200));
    }

    // if unable to create the petugas, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create vaksin."));
    }
}

// tell the user data is incomplete
else {

    // set response code - 400 bad request


    // tell the user
    echo json_encode(array("message" => "Unable to create vaksin. Data is incomplete.", 'data' => $data));
}
