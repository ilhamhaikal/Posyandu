<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    

    include_once '../config/database.php';
    include_once '../objects/account.php';

    $database = new Database();
    $db = $database->getConnection();
        
    $account = new Account($db);
      

    if ($_SERVER['REQUEST_METHOD'] == "GET"){
            
        $option = $db->query("SELECT id_petugas, nama_petugas FROM ref_petugas");
        echo "<option> PILIH NAMA PETUGAS </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_petugas']. "'>". $row['nama_petugas']. "</option>\n";
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] == "POST"){
            
        // get posted data
        $data = $_POST['data_account'];
         // make sure data is not empty
        if(
            !empty($data['username']) &&
            !empty($data['password']) &&
            !empty($data['nama_petugas'])
        ){
            
            // set product property values
            $account->username = $data['username'];
            $account->password = password_hash($data['password'], PASSWORD_DEFAULT);
            $account->nama_petugas = $data['nama_petugas'];
        
             // create the imunisasi
            if($account->create()){
        
                // set response code - 201 created
                http_response_code(201);
        
                // tell the user
                echo json_encode(
                    array("message" => "account was created."));
                
            }

            // if unable to create the imunisasi, tell the user
            else{
        
                 // set response code - 503 service unavailable
                http_response_code(503);
        
                // tell the user
                echo json_encode(array("message" => "Unable to create data account."));
            }
        }
            // tell the user data is incomplete
            else{
        
            // set response code - 400 bad request
            http_response_code(400);
        
            // tell the user
            echo json_encode(array("message" => "Unable to create data account. Data is incomplete."));
            echo"<script type='text/javascript'>alert('DATA TIDAK KOMPLIT'  )</script>;";
        }
        
    }
?>