<?php
    include '../connection.php';

    $func_posyandu = $_GET['func_posyandu'];
    
    if($func_posyandu == "ambil_data_posyandu"){
        $query = mysqli_query($conn, "SELECT * FROM ref_posyandu");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }

        echo json_encode($data);
    } else {
        $id_posyandu = $_GET['id_posyandu'];
        $query = mysqli_query($conn, "SELECT * FROM ref_posyandu WHERE id_posyandu = '$id_posyandu'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>