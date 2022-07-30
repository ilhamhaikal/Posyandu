<?php
    session_start();
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/petugas.php';


        $database = new Database();
        $db = $database->getConnection();
        

        $func_petugas = $_GET['func_petugas'];

        $petugas = new Petugas($db);

        $petugas->id_petugas_login = isset($_SESSION['profile_id']) ? $_SESSION['profile_id'] : "";

        if($func_petugas == "ambil_single_data"){

        // set ID property of record to read
        $petugas->id_petugas = isset($_GET['id_petugas']) ? $_GET['id_petugas'] : die();

        $petugas->read_one();

        if($petugas->nama_petugas != null){
            // create array
            $petugas_arr = array(
                "id_petugas" =>  $petugas->id_petugas,
                "nama_petugas" => $petugas->nama_petugas,
                "jabatan_petugas" => $petugas->jabatan_petugas,
                "jk_petugas" => $petugas->jk_petugas,
                "tempat_lahir_petugas" => $petugas->tempat_lahir_petugas,
                "tgl_lahir_petugas" => $petugas->tgl_lahir_petugas,
                "alamat_petugas" => $petugas->alamat_petugas,
                "no_telp_petugas" => $petugas->no_telp_petugas,
                "status_petugas" => $petugas->status_petugas
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($petugas_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Petugas does not exist."));
        }
    } else if ($func_petugas == "ambil_login_profile"){

        // set ID property of record to read
        $petugas->read_one_login();
        if($petugas->nama_petugas != null){
            // create array
            $petugas_arr = array(
                "nama_petugas" => $petugas->nama_petugas,
                "jabatan_petugas" => $petugas->jabatan_petugas,
                "jk_petugas" => $petugas->jk_petugas,
                "tempat_lahir_petugas" => $petugas->tempat_lahir_petugas,
                "tgl_lahir_petugas" => $petugas->tgl_lahir_petugas,
                "alamat_petugas" => $petugas->alamat_petugas,
                "no_telp_petugas" => $petugas->no_telp_petugas,
                "status_petugas" => $petugas->status_petugas
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($petugas_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Petugas does not exist."));
        }
    }

?>