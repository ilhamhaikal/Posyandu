<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    // header('Content-Type: application/json');
    
    // include database and object files
    include_once '../api/config/database.php';
    include_once '../api/objects/Timbangan.php';
    include_once '../api/objects/anak.php';
    include_once '../fungsi/countUsia.php';

    $loop;
    $database = new Database();
    $db = $database->getConnection();
        
    $timbangan = new Timbangan($db);
    $anak = new Anak($db);

    $dateFrom = $_GET['fromDate'];
    $dateTo = $_GET['toDate'];

    $timbangan->fromDate = $dateFrom;
    $timbangan->toDate = $dateTo;

    $dataAnak = $anak->read();
    $jumlahSeluruhAnak = $dataAnak->rowCount();

    $stmt2 = $timbangan->dataRekap();
    $num2 = $stmt2->rowCount();
    //check if more than 0 record found

        $timbang_arr=array();
        $timbang_arr["records"]=array();

        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $timbang=array(
                "id_timbangan"=>$id_timbangan,
                "nama_anak"=>$nama_anak,
                "nama_ibu"=>$nama_ibu,
                "alamat"=>$alamat_ibu,
                "status_kel"=>$status_kel,
                "jk_anak"=>$jk_anak,
                "tanggal_lahir"=>$tgl_lahir_anak,
                "usia_anak"=>$usia_anak,
                "berat_badan"=>$berat_badan,
                "tinggi_badan"=>$tinggi_badan,
                "tanggal_penimbangan"=>$tanggal_penimbangan
            );
        array_push($timbang_arr["records"], $timbang);
        }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap Penimbangan</title>
</head>
<body>
    <h1><center>FORMULIR PENCATATAN BULAN PENIMBANGAN BALITA (BPB)</center></h1>
    <h1><center>BULAN AGUSTUS 2019</center></h1>

    <table>
        <tr>
            <td>KELURAHAN</td>
            <td colspan="5">: MALEER</td>
            <td>TANGGAL PENIMBANGAN</td>
            <td>: <?php echo $dateFrom. " s/d ". $dateTo?></td>
        </tr>
        <tr>
            <td>NAMA POSYANDU</td>
            <td>: namaposyandunya</td>
        </tr>
        <tr>
            <td>JUMLAH BALITA YANG ADA</td>
            <td>: <?php echo $jumlahSeluruhAnak. " Anak";?></td>
        </tr>
        <tr>
            <td>JUMLAH BALITA YANG DITIMBANG</td>
            <td>: <?php echo $num2. " Anak"?></td>
        </tr>
    </table>

    <table border="1">
        <tr  style=" border: 1px solid black;">
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Anak</th>
            <th rowspan="2">Nama Ibu</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2"> Status Keluarga</th>
            <th colspan="2">Jenis Kelamin</th>
            <th rowspan="2">Tanggal Lahir</th>
            <th rowspan="2">Berat Badan</th>
            <th rowspan="2">Tinggi Badan</th>
            <th rowspan="2">Umur</th>
        </tr>
        <tr>
            <th>L</th>
            <th>P</th>
        </tr>
    <?php 
    $no = 1;
    $status_kel;

    foreach($timbang_arr['records'] as $row){
        if ($row['status_kel'] == '1'){
            $status_kel = "Gakin";
        } else if ($row['status_kel'] == '2'){
            $status_kel = "Non Gakin";
        }
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama_anak'];?></td>
        <td><?php echo $row['nama_ibu'];?></td>
        <td><?php echo $row['alamat'];?></td>
        <td><?php echo $status_kel;?></td>
        <td><?php echo $row['jk_anak'] == "L" ? "√" : "";?></td>
        <td><?php echo $row['jk_anak'] == "P" ? "√" : "";?></td>
        <td><?php echo date("d-m-Y", strtotime($row['tanggal_lahir']));?></td>
        <td><?php echo $row['berat_badan'];?></td>
        <td><?php echo $row['tinggi_badan'];?></td>
        <td><?php echo count_usia($row['tanggal_lahir']);?></td>
    </tr>
        <?php } ?>
    </table>
</body>
</html>