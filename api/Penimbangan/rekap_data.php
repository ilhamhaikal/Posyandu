<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/Timbangan.php';

    $database = new Database();
    $db = $database->getConnection();
        
    $timbangan = new Timbangan($db);

    $data = $_POST['dateRekap'];

    $dateFrom = $data['fromDate'];
    $dateTo = $data['toDate'];

    $timbangan->fromDate = $dateFrom;
    $timbangan->toDate = $dateTo;

    $stmt2 = $timbangan->dataRekap();
    $num2 = $stmt2->rowCount();
    //check if more than 0 record found
    if($num2>=0){

        $timbang_arr=array();
        $timbang_arr["records"]=array();

        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $timbang=array(
                "id_timbangan"=>$id_timbangan,
                "nama_anak"=>$nama_anak,
                "nama_ibu"=>$nama_ibu,
                "alamat"=>$alamat_ibu,
                "status_kel"=>$status_kel,
                "jk_anak"=>$jk_anak,
                "tanggal_lahir"=>$tgl_lahir_anak,
                "usia_anak"=>$usia_anak,
                "berat_badan"=>$berat_badan,
                "tinggi_badan"=>$tinggi_badan,
                "tanggal_penimbangan"=>$tanggal_penimbangan
            );
        array_push($timbang_arr["records"], $timbang);
        }
        http_response_code(200);

        echo json_encode($timbang_arr);

    }
    else{
        http_response_code(500);
        echo json_encode(
            array("message" => "500 ERROR ")
        );
    }

?>