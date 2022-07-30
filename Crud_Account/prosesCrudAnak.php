<?php
    include '../connection.php';

    $func_anak = $_POST['func_anak'];
    
    if($func_anak == "update_data_anak"){
        $data = $_POST['data_anak'];
        $id_anak = $_POST['id_anak'];
        
        $nik_anak = $data['nik_anak'];
        $nama_anak = htmlspecialchars($data['nama_anak']);
        $temp_lahir_anak = htmlspecialchars($data['temp_lahir_anak']);
        $tgl_lahir_anak = $data['tgl_lahir_anak'];
        $usia_anak = htmlspecialchars($data['usia_anak']);
        $jk_anak = $data['jk_anak'];
        
        $update = mysqli_query($conn, "UPDATE ref_anak SET nik_anak='$nik_anak', 
                                        nama_anak='$nama_anak', 
                                        tempat_lahir_anak='$temp_lahir_anak', 
                                        tanggal_lahir_anak='$tgl_lahir_anak',
                                        usia='$usia_anak',
                                        jk_anak='$jk_anak'
                                        WHERE id_anak='$id_anak'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_anak == "delete"){
        $id_anak = $_POST['id_anak'];
        $del = mysqli_query($conn, "DELETE FROM ref_anak WHERE id_anak='$id_anak'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_anak == "tambah_data_anak"){
        $data = $_POST['data_anak'];   
        $nik_anak = $data['nik_anak'];
        $nama_anak = htmlspecialchars($data['nama_anak']);
        $temp_lahir_anak = htmlspecialchars($data['temp_lahir_anak']);
        $tgl_lahir_anak = $data['tgl_lahir_anak'];
        $usia_anak = htmlspecialchars($data['usia_anak']);
        $jk_anak = $data['jk_anak'];

        $tambah = mysqli_query($conn, "INSERT INTO ref_anak(id_anak, nik_anak, nama_anak, tempat_lahir_anak, tanggal_lahir_anak, usia,jk_anak) 
                        VALUES('', '$nik_anak','$nama_anak','$temp_lahir_anak','$tgl_lahir_anak', '$usia_anak','$jk_anak')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
   }
//     }
?>