<?php

include '../connection.php';

$func_pesan = $_POST['func_pesan'];


    $data = $_POST['pesan'];
    
    $nama= htmlspecialchars($data['nama']);
    $pesan = htmlspecialchars($data['pesan']);
    $email = htmlspecialchars($data['email']);

    $tambah = mysqli_query($conn, "INSERT INTO ref_bantuan(id_bantuan, nama, pesan, email ) 
                                    VALUES('', '$nama','$pesan','$email' )");
    
    if($tambah){
        echo "pesan disimpan";
    } else {
        echo "error";
    }

//     }
?>
