<?php
    $conn = mysqli_connect("localhost", "root", "", "eposyandu");

    $func_imun = $_POST['func_imun'];
    
    if($func_imun == "update_data_imun"){
        $data = $_POST['imunisasi'];
        $id_imun = $_POST['id_imunisasi'];
        
        $tgl_imunisasi = $data['tgl_imun'];
        $usia_saat_vaksin = htmlspecialchars($data['usia_saat_vaksin']);
        $tinggi_badan = htmlspecialchars($data['tinggi_badan']);
        $berat_badan = htmlspecialchars($data['berat_badan']);
        $periode = htmlspecialchars($data['periode']);
        
        $update = mysqli_query($conn, "UPDATE ref_imunisasi SET tgl_imunisasi='$tgl_imunisasi', 
                                        usia_saat_vaksin='$usia_saat_vaksin', 
                                        tinggi_badan='$tinggi_badan', 
                                        berat_badan='$berat_badan',
                                        periode='$periode'
                                        WHERE id_imunisasi='$id_imun'");
        
        if($update){
            echo "sukses";
        } else {
            echo "error";
        }
   
    } else if($func_imun == "delete"){
        $id_imun = $_POST['id_imunisasi'];
        $del = mysqli_query($conn, "DELETE FROM ref_imunisasi WHERE id_imunisasi='$id_imun'");
        
        if($del){
            echo "sukses";
        } else {
            echo "error";
        }

   } else if($func_imun == "tambah_data_imun"){
        $data = $_POST['imunisasi'];   
        $tgl_imunisasi = $data['tgl_imun'];
        $usia_saat_vaksin = htmlspecialchars($data['usia_saat_vaksin']);
        $tinggi_badan = htmlspecialchars($data['tinggi_badan']);
        $berat_badan = htmlspecialchars($data['berat_badan']);
        $periode = htmlspecialchars($data['periode']);

        $tambah = mysqli_query($conn, "INSERT INTO ref_imunisasi(id_imunisasi, tgl_imunisasi, usia_saat_vaksin, tinggi_badan, berat_badan, periode) 
                        VALUES('', '$tgl_imunisasi','$usia_saat_vaksin','$tinggi_badan','$berat_badan', '$periode')");
        
        if($tambah){
            echo "sukses";
        } else {
            echo "ERROR";
        }
   }
//     }
?>