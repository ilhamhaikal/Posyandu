<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_anak");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Anak</th>
            <th>ID Ibu</th>
            <!--<th>Nama Anak</th>
            <th>Nomer Induk Kependudukan (NIK) Anak</th>
            <th>Tempat Lahir Anak</th>
            <th>Tanggal Lahir Anak</th>
            <th>Usia Anak</th>
            <th>Jenis Kelamin Anak</th>-->
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($data = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $data['id_anak'] ?></td>
            <td><?= $data['id_ibu'] ?></td>
            <td><?= $data['nama_anak'] ?></td>
            <td><?= $data['nik_anak'] ?></td>
            <td><?= $ptgs['tempat_lahir_anak'] ?></td>
            <td><?= $ptgs['tgl_lahir_petugas'] ?></td>
            <td><?= $data['usia_anak'] ?></td>
            <td><?= $data['jk_anak'] ?></td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>