<?php
    $conn = mysqli_connect("localhost", "root", "", "eposyandu");

    $func_ibu = $_POST['func_ibu'];
    
    if($func_ibu == "update_data_ibu"){
        $data = $_POST['ibu'];
        $id_ibu = $_POST['id_ibu'];
        
        $nama_ibu =htmlspecialchars( $data['nama_ibu']);
        $nik_ibu= htmlspecialchars($data['nik_ibu']);
        $alamat_ibu = htmlspecialchars($data['alamat_ibu']);
        $telp_ibu = htmlspecialchars($data['no_telp_ibu']);
        
        
        $update = mysqli_query($conn, "UPDATE ref_ibu SET nama_ibu='$nama_ibu', 
                                        nik_ibu='$nik_ibu', 
                                        alamat_ibu='$alamat_ibu', 
                                        no_telp_ibu='$telp_ibu'
                                        WHERE id_ibu='$id_ibu'");
      
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_ibu == "delete"){
        $id_ibu = $_POST['id_ibu'];
        $del = mysqli_query($conn, "DELETE FROM ref_ibu WHERE id_ibu='$id_ibu'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_ibu == "tambah_data_ibu"){
        $data = $_POST['ibu'];   
        $nama_ibu = $data['nama_ibu'];
        $nik_ibu = htmlspecialchars($data['nik_ibu']);
        $alamat_ibu = htmlspecialchars($data['alamat_ibu']);
        $telp_ibu = htmlspecialchars($data['telp_ibu']);
        
        $tambah = mysqli_query($conn, "INSERT INTO ref_ibu(id_ibu, nama_ibu, nik_ibu, alamat_ibu, no_telp_ibu) 
                        VALUES('', '$nama_ibu','$nik_ibu','$alamat_ibu','$telp_ibu')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
   }
//     }
?>