<?php
    include '../connection.php';

    $func_imun = $_GET['func_imun'];
    
    if($func_imun == "ambil_data_imun"){
        $query = mysqli_query($conn, "SELECT * FROM ref_imunisasi");
        $data = array();
        while ($d = mysqli_fetch_array($query)){
            //echo $d['id_imunisasi']."|".$d['tgl_imunisasi']."|".$d['usia_saat_vaksin']. "|". $d['tinggi_badan']. "|". $d['berat_badan']. "|". $d['periode'];
            array_push($data, $d);
        }

        echo json_encode($data);
    } else {
        $id_imunisasi = $_GET['id_imunisasi'];
        $query = mysqli_query($conn, "SELECT * FROM ref_imunisasi WHERE id_imunisasi = '$id_imunisasi'");

        $d = mysqli_fetch_array($query);
        echo json_encode($d);
    }
?>