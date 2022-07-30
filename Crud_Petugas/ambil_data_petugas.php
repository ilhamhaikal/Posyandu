<?php
    include '../connection.php';

    $func_petugas = $_GET['func_petugas'];
    

    if($func_petugas == "ambil_data_petugas"){
        $query = mysqli_query($conn, "SELECT * FROM ref_petugas");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }
        echo json_encode($data);
    } else {
        $id_petugas = $_GET['id_petugas'];
        $query = mysqli_query($conn, "SELECT * FROM ref_petugas WHERE id_petugas = '$id_petugas'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>