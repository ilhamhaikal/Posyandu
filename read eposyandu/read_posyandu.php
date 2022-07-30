<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_posyandu");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Posyandu</th>
            <th>Nama Posyandu</th>
            <th>Alamat Posyandu</th>
            <th>Kelurahan Posyandu</th>
            <th>Kecamatan Posyandu</th>
            <th>Kota/Kabupaten Posyandu</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($psynd = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $psynd['id_posyandu'] ?></td>
            <td><?= $psynd['nama_posyandu'] ?></td>
            <td><?= $psynd['alamat_posyandu   '] ?></td>
            <td><?= $psynd['kel_posyandu'] ?></td>
            <td><?= $psynd['kec_posyandu '] ?></td>
            <td><?= $psynd['kota_kab_posyandu '] ?></td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>