<?php
	include 'connection.php';

	$sql = mysqli_query ($conn, "SELECT * FROM ref_vaksin");

?>
<html>
<body>
	<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID vaksin</th>
            <th>Nama vaksin</th>
        </tr>
    </thead>
    <tbody>
    	<?php if(mysqli_num_rows($sql)>0){ 
            $i = 1;
            while ($vksn = $sql -> fetch_array()){
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $vksn['id_vaksin'] ?></td>
            <td><?= $vksn['nama_vaksin'] ?></td>
    	</tr>
    	<?php } 
    }?>
    </tbody>
</table>
</body>
</html>