<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_petugas");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Petugas</th>
            <th>Nama Petugas</th>
            <th>Jabatan Petugas</th>
            <th>Jenis Kelamin Petugas</th>
            <th>Tempat Lahir Petugas</th>
            <th>Tanggal Lahir Petugas</th>
            <th>Alamat Petugas</th>
            <th>Nomer Telepon Petugas</th>
            <th>Foto Petugas</th>
            <th>Status Petugas</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($ptgs = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $ptgs['id_petugas'] ?></td>
            <td><?= $ptgs['nama_petugas'] ?></td>
            <td><?= $ptgs['jabatan_petugas'] ?></td>
            <td><?= $ptgs['jk_petugas'] ?></td>
            <td><?= $ptgs['tempat_lahir_petugas'] ?></td>
            <td><?= $ptgs['tgl_lahir_petugas'] ?></td>
            <td><?= $ptgs['alamat_petugas'] ?></td>
            <td><?= $ptgs['no_telp_petugas'] ?></td>
            <td>
            	<img src="http://localhost/eposyandu/mediaibu/<?php $ptgs['foto_petugas']?>" width="80px">
            </td>
            <td><?= $ptgs['status_petugas'] ?></td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>