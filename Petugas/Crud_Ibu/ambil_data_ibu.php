<?php
    include '../connection.php';

    $func_ibu = $_GET['func_ibu'];
    
    if($func_ibu == "ambil_semua_data"){
        $query = mysqli_query($conn, "SELECT * FROM ref_ibu");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }

        echo json_encode($data);
    } else {
        $id_ibu = $_GET['id_ibu'];
        $query = mysqli_query($conn, "SELECT * FROM ref_ibu WHERE id_ibu = '$id_ibu'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>