<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/account.php';

    $func_account = $_GET['func_account'];

    $database = new Database();
    $db = $database->getConnection();
        
    $account = new Account($db);

    if ($func_account == "ambil_option_petugas"){
        $option = $db->query("SELECT id_petugas, nama_petugas FROM ref_petugas");
        echo "<option> PILIH NAMA PETUGAS </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_petugas']. "'>". $row['nama_petugas']. "</option>\n";
        }
    }

    else if ($func_account == "ambil_single_data"){

        // set ID property of record to read
        $account->id_login = $_GET['id_login'];
        
        $account->read_one();

        if($account->username != null){
            // create array
            $account_arr = array(
                "username" => $account->username,
                "nama_petugas" => $account->nama_petugas
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($account_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "account does not exist."));
        }
    }
    else if ($func_account == "ambil_single_data_admin"){
         // set ID property of record to read
         $account->id_login = $_GET['id_login'];
        
         $account->read_one();
 
         if($account->username != null){
             // create array
             $account_arr = array(
                 "username" => $account->username
             );
         
             // set response code - 200 OK
             http_response_code(200);
         
             // make it json format
             echo json_encode($account_arr);
         } else {
             // set response code - 404 Not found
             http_response_code(404);
         
             // tell the user product does not exist
             echo json_encode(array("message" => "account does not exist."));
         }
    }

?>