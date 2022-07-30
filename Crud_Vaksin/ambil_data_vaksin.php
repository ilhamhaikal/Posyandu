<?php
    include '../connection.php';

    $func_vaksin = $_GET['func_vaksin'];
    

    if($func_vaksin == "ambil_data_vaksin"){
        $query = mysqli_query($conn, "SELECT * FROM ref_vaksin");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }

        echo json_encode($data);
    } else {
        $id_vaksin = $_GET['id_vaksin'];
        $query = mysqli_query($conn, "SELECT * FROM ref_vaksin WHERE id_vaksin = '$id_vaksin'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>