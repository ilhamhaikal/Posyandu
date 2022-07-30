<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_imunisasi");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Imunisasi</th>
            <th>ID Anak</th>
            <th>ID Petugas</th>
            <th>ID Vaksin</th>
            <th>Tanggal Imunisasi</th>
            <th>Usia saat Vaksin</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Periode</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($psynd = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $psynd['id_imunisasi'] ?></td>
            <td><?= $psynd['id_anak'] ?></td>
            <td><?= $psynd['id_petugas'] ?></td>
            <td><?= $psynd['id_vaksin'] ?></td>
            <td><?= $psynd['tgl_imunisasi'] ?></td>
            <td><?= $psynd['usia_saat_vaksin'] ?></td>
            <td><?= $psynd['tinggi_badan'] ?></td>
            <td><?= $psynd['berat_badan'] ?></td>
            <td><?= $psynd['periode'] ?></td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>