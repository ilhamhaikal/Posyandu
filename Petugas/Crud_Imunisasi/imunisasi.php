
<!DOCTYPE html>
<html>
<head>
	<title>Imunisasi</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<script type="text/javascript">
		var id_imun;
		var nama_anak;
		var id_petugas;
		var id_vaksin;
		var tgl_imun;
		var tinggi_badan;
		var berat_badan;
		var usia_saat_vaksin;
		var periode;
		var data;
		var nama_vaksin;
		$(document).ready(function() {
			$("#ttable").val();
		});

		$(document).ready(function(){
			$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$("#id_imun").change(function() {
				id_imun = $("#id_imun").val();

				$.ajax({
					url : "prosesCrudImunisasi.php",
					data : "func_imun=ambil_data_imun&id_imun="+id_imun,
					cache : false,
					success : function(msg){
						data = msg.split("|");

						$("#id_imun").val(data[0]);
						// $("#nama_anak").val(data[1]);
						// $("#id_petugas").val(data[2]);
						// $("#id_vaksin").val(data[3]);
						$("#tgl_imun").val(data[1]);
						$("#tinggi_badan").val(data[2]);
						$("#berat_badan").val(data[3]);
						$("#usia_saat_vaksin").val(data[4]);
						$("#periode").val(data[5]);
					}
				});
			});
		});

	</script>
<html>
<body>
	<table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Imunisasi</th>
            <th>Nama Anak</th>
            <th>ID Petugas</th>
            <th>ID Vaksin</th>
            <th>Tanggal Imunisasi</th>
            <th>Usia saat Vaksin</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
        <tr>
        	<td id="id_imun"></td>
        	<td id="nama_anak"></td>
        	<td id="id_petugas"></td>
        	<td id="id_vaksin"></td>
        	<td id="tgl_imun"></td>
        	<td id="tinggi_badan"></td>
        	<td id="berat_badan"></td>
        	<td id="usia_saat_vaksin"></td>
        	<td id="periode"></td>
			<td id="nama_vaksin"></td>
        	<td id="aksi">
        		<button id="edit">EDIT</button>
        		<button id="del">DELETE</button>
        	</td>
        </tr>
    </thead>
</body>
</html>