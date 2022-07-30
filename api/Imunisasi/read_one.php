<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/imunisasi.php';

    $database = new Database();
    $db = $database->getConnection();
        
    $imunisasi = new Imunisasi($db);

    $func_imunisasi = $_GET['func_imunisasi'];

    if ($func_imunisasi == "ambil_option_anak"){
        $option = $db->query("SELECT id_anak, nama_anak FROM ref_anak");
        echo "<option> PILIH NAMA ANAK </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_anak']. "'>". $row['nama_anak']. "</option>\n";
        }
    }
    
    else if ($func_imunisasi == "ambil_option_petugas"){
        $option = $db->query("SELECT id_petugas, nama_petugas FROM ref_petugas");
        echo "<option> PILIH NAMA PETUGAS </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_petugas']. "'>". $row['nama_petugas']. "</option>\n";
        }
    }

    else if ($func_imunisasi == "ambil_option_ibu"){
        $option = $db->query("SELECT id_ibu, nama_ibu FROM ref_ibu");
        echo "<option> PILIH NAMA IBU </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_ibu']. "'>". $row['nama_ibu']. "</option>\n";
        }
    }

    else if ($func_imunisasi == "ambil_option_vaksin"){
        $option = $db->query("SELECT id_vaksin, nama_vaksin FROM ref_vaksin");
        echo "<option> PILIH NAMA VAKSIN </option>\n";
        while ($row = $option->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='". $row['id_vaksin']. "'>". $row['nama_vaksin']. "</option>\n";
        }
    }
    else if ($func_imunisasi == "ambil_single_data"){
        // set ID property of record to read
        $imunisasi->id_imunisasi = isset($_GET['id_imunisasi']) ? $_GET['id_imunisasi'] : die();

        $imunisasi->read_one();

        if($imunisasi->tgl_imunisasi != null){
            // create array
            $imunisasi_arr = array(
                "id_imunisasi" =>  $imunisasi->id_imunisasi,
                "tgl_imunisasi" => $imunisasi->tgl_imunisasi,
                "usia_saat_vaksin" => $imunisasi->usia_saat_vaksin,
                "tinggi_badan" => $imunisasi->tinggi_badan,
                "berat_badan_umur" => $imunisasi->berat_badan_umur,
                "berat_badan_berdiri" => $imunisasi->berat_badan_berdiri,
                "berat_badan_terlentang" => $imunisasi->berat_badan_terlentang,
                "periode" => $imunisasi->periode,
                "nama_anak" => $imunisasi->nama_anak,
                "nama_petugas" => $imunisasi->nama_petugas,
                "nama_vaksin" => $imunisasi->nama_vaksin,
                "nama_ibu" => $imunisasi->nama_ibu
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($imunisasi_arr);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "imunisasi does not exist."));
        }
    
    }
?>