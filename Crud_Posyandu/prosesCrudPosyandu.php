<?php
    $conn = mysqli_connect("localhost", "root", "", "eposyandu");

    $func_posyandu = $_POST['func_posyandu'];
    
    if($func_posyandu == "update_data_posyandu"){
        $data = $_POST['posyandu'];
        $id_posyandu = $_POST['id_posyandu'];
        
        $nama_posyandu = $data['nama_posyandu'];
        $alamat_posyandu = htmlspecialchars($data['alamat_posyandu']);
        $kel_posyandu = htmlspecialchars($data['kel_posyandu']);
        $kec_posyandu = htmlspecialchars($data['kec_posyandu']);
        $kota_kab_posyandu = htmlspecialchars($data['kota_kab_posyandu']);
        
        $update = mysqli_query($conn, "UPDATE ref_posyandu SET nama_posyandu='$nama_posyandu', 
                                        alamat_posyandu='$alamat_posyandu', 
                                        kel_posyandu='$kel_posyandu', 
                                        kec_posyandu='$kec_posyandu',
                                        kota_kab_posyandu='$kota_kab_posyandu'
                                        WHERE id_posyandu='$id_posyandu'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_posyandu == "delete"){
        $id_posyandu = $_POST['id_posyandu'];
        $del = mysqli_query($conn, "DELETE FROM ref_posyandu WHERE id_posyandu='$id_posyandu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_posyandu == "tambah_data_posyandu"){
        $data = $_POST['posyandu'];   
        $nama_posyandu = $data['nama_posyandu'];
        $alamat_posyandu = htmlspecialchars($data['alamat_posyandu']);
        $kel_posyandu = htmlspecialchars($data['kel_posyandu']);
        $kec_posyandu = htmlspecialchars($data['kec_posyandu']);
        $kota_kab_posyandu = htmlspecialchars($data['kota_kab_posyandu']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_posyandu(id_posyandu, nama_posyandu, alamat_posyandu, kel_posyandu, kec_posyandu, kota_kab_posyandu) 
                        VALUES('', '$nama_posyandu','$alamat_posyandu','$kel_posyandu','$kec_posyandu', '$kota_kab_posyandu')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
   }
//     }
?>