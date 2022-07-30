<?php
include '../connection.php';

$func_vaksin = $_POST['func_vaksin'];

if ($func_vaksin == "update_data_vaksin") {
    $data = $_POST['vaksin'];
    $id_vaksin = $_POST['id_vaksin'];

    $nama_vaksin = $data['nama_vaksin'];

    $update = mysqli_query($conn, "UPDATE ref_vaksin SET nama_vaksin='$nama_vaksin' WHERE id_vaksin='$id_vaksin'");

    if ($update) {
        echo "sukses";
    } else {
        echo "error";
    }
} else if ($func_vaksin == "delete") {
    $id_vaksin = $_POST['id_vaksin'];
    $del = mysqli_query($conn, "DELETE FROM ref_vaksin WHERE id_vaksin='$id_vaksin'");

    if ($del) {
        echo "sukses";
    } else {
        echo "error";
    }
} else if ($func_vaksin == "tambah_data_vaksin") {
    $data = $_POST['imunisasi'];
    $nama_vaksin = htmlspecialchars($data['nama_vaksin']);

    $tambah = mysqli_query($conn, "INSERT INTO ref_vaksin(id_vaksin, nama_vaksin) 
                        VALUES('', '$nama_vaksin')");

    if ($tambah) {
        echo "sukses";
    } else {
        echo "ERROR";
    }
}
//     }
