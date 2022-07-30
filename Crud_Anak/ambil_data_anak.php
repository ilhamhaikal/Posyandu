<?php
    include '../connection.php';

    $func_anak = $_GET['func_anak'];
    

    if($func_anak == "ambil_data_anak"){
        $query = mysqli_query($conn, "SELECT * FROM ref_anak");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }

        echo json_encode($data);
    } else {
        $id_anak = $_GET['id_anak'];
        $query = mysqli_query($conn, "SELECT * FROM ref_anak WHERE id_anak = '$id_anak'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>