<?php
    include '../connection.php';

    $func_petugas = $_POST['func_petugas'];
    
    if($func_petugas == "update_data_petugas"){
        $data = $_POST['petugas'];
        $id_petugas = $_POST['id_petugas'];
        
        $nama_petugas = $data['nama_petugas'];
        $jabatan_petugas = htmlspecialchars($data['jabatan_petugas']);
        $jk_petugas = $data['jk_petugas'];
        $temp_lahir_petugas = $data['temp_lahir_petugas'];
        $tgl_lahir_petugas = $data['tgl_lahir_petugas'];
        $alamat_petugas = htmlspecialchars($data['alamat_petugas']);
        $telp_petugas = $data['telp_petugas'];
        $status_petugas = htmlspecialchars($data['status_petugas']);
        
        $update = mysqli_query($conn, "UPDATE ref_petugas SET nama_petugas='$nama_petugas', 
                                        jabatan_petugas='$jabatan_petugas', 
                                        jk_petugas='$jk_petugas', 
                                        tempat_lahir_petugas='$temp_lahir_petugas',
                                        tgl_lahir_petugas = '$tgl_lahir_petugas',
                                        alamat_petugas = '$alamat_petugas',
                                        no_telp_petugas = '$telp_petugas',
                                        status_petugas = '$status_petugas'
                                        WHERE id_petugas='$id_petugas'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_petugas == "delete"){
        $id_petugas = $_POST['id_petugas'];
        $del = mysqli_query($conn, "DELETE FROM ref_petugas WHERE id_petugas='$id_petugas'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_petugas == "tambah_data_petugas"){
        $data = $_POST['petugas'];
        
        $nama_petugas = $data['nama_petugas'];
        $jabatan_petugas = htmlspecialchars($data['jabatan_petugas']);
        $jk_petugas = htmlspecialchars($data['jk_petugas']);
        $temp_lahir_petugas = $data['temp_lahir_petugas'];
        $tgl_lahir_petugas = $data['tgl_lahir_petugas'];
        $alamat_petugas = $data['alamat_petugas'];
        $telp_petugas = htmlspecialchars($data['telp_petugas']);
        $status_petugas = htmlspecialchars($data['status_petugas']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_petugas(id_petugas, nama_petugas, jabatan_petugas, 
                                                jk_petugas, tempat_lahir_petugas, tgl_lahir_petugas, 
                                                alamat_petugas, no_telp_petugas, status_petugas) 
                                        VALUES('', '$nama_petugas','$jabatan_petugas','$jk_petugas',
                                                    '$temp_lahir_petugas', '$tgl_lahir_petugas','$alamat_petugas', 
                                                    '$telp_petugas', '$status_petugas')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "error";
        }
   }
//     }
?>