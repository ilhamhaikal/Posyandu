<?php

$conn = mysqli_connect("localhost")

$func_saran = $_POST['func_saran'];

    $data = $_POST['saran'];
    
    $nama= htmlspecialchars($data['nama']);
    $kritik = htmlspecialchars($data['kritik']);
    $email = htmlspecialchars($data['email']);
    $tanggal = $data['tanggal'];

    $tambah = mysqli_query($conn, "INSERT INTO ref_bantuan(id_kritik, nama, kritik, email , tgl_kritiksaran) 
                                    VALUES('', '$nama','$kritik','$email', '$tanggal' )");
    
    if($tambah){
        echo "saran disimpan";
    } else {
        echo "error";
    }

?>
