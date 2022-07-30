<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_ibu");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>ID Ibu</th>
            <th>Nama Ibu</th>
            <th>Nomer Induk Kependudukan (NIK) Ibu</th>
            <th>Alamat Ibu</th>
            <th>Nomer Telepon Ibu</th>
            <th>Foto Ibu</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($ibu = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $ibu['id_ibu'] ?></td>
            <td><?= $ibu['nama_ibu'] ?></td>
            <td><?= $ibu['nik_ibu'] ?></td>
            <td><?= $ibu['alamat_ibu'] ?></td>
            <td><?= $ibu['no_telp_ibu'] ?></td>
            <td>
            	<img src="http://localhost/eposyandu/mediaibu/<?php echo $ibu['foto_ibu']?>" width="100px" height="100px">
            </td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>