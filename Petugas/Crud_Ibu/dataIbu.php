<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    NIK Ibu : 
	<select id="option_nik_ibu"></select><br> 
	<a id="formtambah" style="cursor:pointer;color:red;"><u>Tambah Data Ibu</u></a> 
	<p style="display:none" id="formnik"> 
		NIK Ibu  :<br> 
		<input type="text" id="nik_ibu"> 
	</p> 
	<p> 
		Nama ibu :<br> 
		<input type="text" id="nama_ibu"><br>
		Alamat :<br> 
		<input type="text" id="alamat_ibu"><br> 
		No telp :<br> 
		<input type="text" id="telp_ibu" size="30"><br> 
		<button id="tupdate">UPDATE</button> 
		<button id="tdelete">DEL</button> 
		<button id="ttambah">TAMBAH</button><br>
		<span id="status"></span><br>
		<br><br>
		<button onclick="window.location.href='crudIbu.html'">BACK</a></button>
	</p> 

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var option_nik_ibu;
		var nama_ibu;
		var alamat_ibu;
		var telp_ibu;
		var data_ibu;
		$(document).ready(function(){
			//meloading option NIK dari database
			$("#option_nik_ibu").load("prosesCrudIbu.php", "func_ibu=ambil_option_ibu");

			//jika ada event onchange ambil data dari database
			$("#option_nik_ibu").change(function(){
				//ambil nilai nik dari form
				option_nik_ibu = $("#option_nik_ibu").val();
			
				//lakukan pengiriman data 
				$.ajax({
					url: "prosesCrudIbu.php",
					data: "func_ibu=ambil_data_ibu&option_nik_ibu="+option_nik_ibu,
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg.split("|");

						//masukan ke masing - masing textfield
						$("#nama_ibu").val(data[0]);
						$("#alamat_ibu").val(data[1]);
						$("#telp_ibu").val(data[2]);
					}
				});
			});
			//jika tombol update diclick
			$("#tupdate").click(function(){
				//ambil nilai-nilai dari masing-masing input
				option_nik_ibu = $("#option_nik_ibu").val();
				if (!option_nik_ibu) {
					alert("Pilih dulu nik_ibu");
					exit();
				}

				nama_ibu = $("#nama_ibu").val();
				alamat_ibu = $("#alamat_ibu").val();
                telp_ibu = $("#telp_ibu").val();
				data_ibu = "&option_nik_ibu="+option_nik_ibu+"&nama_ibu="+nama_ibu+"&alamat_ibu="+alamat_ibu+"&telp_ibu="+telp_ibu;
				//tampilkan status Updating dan animasinya
				$("#status").html("Lagi di update. . .");
				$("#loading").show();
				$.ajax({
					url: "prosesCrudIbu.php",
					data: "func_ibu=update_data_ibu"+data_ibu,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Update Berhasil . . ");
						} else {
							$("#status").html("ERROR. . .");
                            console.log(msg);
						}
						$("#loading").hide();
					}
				});
			});

			//jika tombol DEL diklik
			$("#tdelete").click(function(){
				option_nik_ibu = $("#option_nik_ibu").val();
				if (option_nik_ibu=="Pilih NIK Ibu") {
					alert("Pilih dulu nik_ibu");
					exit();
				}
				
				$.ajax({
					url: "prosesCrudIbu.php",
					data: "func_ibu=del_data_ibu&option_nik_ibu="+option_nik_ibu,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
						} else {
							$("#status").html("EROR. . .");
						}

						$("#nama_ibu").val("");
						$("#alamat_ibu").val("");
						$("#telp_ibu").val("");
						$("#loading").hide();
						$("#option_nik_ibu").load ("prosesCrudIbu.php", "func_ibu=ambil_option_ibu");
					}
				});
			});

			//Jika link tambah dta diklik
			$("#formtambah").click(function(){ 
				$("#formnik").show(); 
				$("#nik_ibu").val(""); 
				$("#nama_ibu").val(""); 
				$("#alamat_ibu").val(""); 
				$("#telp_ibu").val(""); 
			});
			
			//jika link Tambah Data Karyawan diklik 
			$("#formtambah").click(function(){ 
				$("#formnik").show(); 
				$("#nik_ibu").val(""); 
				$("#nama_ibu").val(""); 
				$("#alamat_ibu").val(""); 
				$("#telp_ibu").val(""); 
			});
 
			//jika tombol TAMBAH diklik 
			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nik_ibu = $("#nik_ibu").val(); 
				if(nik_ibu==""){ 
					alert("Nik belum diisi\nKlik Tambah Data Ibu"); 
					exit(); 
				} 
				
				nama_ibu = $("#nama_ibu").val(); 
				alamat_ibu = $("#alamat_ibu").val(); 
				telp_ibu = $("#telp_ibu").val(); 
				data_ibu = "&nik_ibu="+nik_ibu + "&nama_ibu="+nama_ibu+"&alamat_ibu="+alamat_ibu+"&telp_ibu="+telp_ibu;
				
				$("#status").html("Lagi ditambah..."); 
				$("#loading").show(); 
				$.ajax({ 
					url: "prosesCrudIbu.php", 
					data: "func_ibu=tambah_data_ibu"+data_ibu, 
					cache: false, 
					success: function(msg){ 
						if(msg=="sukses"){ 
							$("#status").html("Berhasil ditambah..."); 
						} else { 
							$("#status").html("ERROR.."); 
						} 
						$("#loading").hide(); 
						$("#option_nik_ibu").load("prosesCrudIbu.php","func_ibu=ambil_option_ibu"); 
						$("#formnik").hide(); 
						$("#nik_ibu").val(""); 
					}
				});
 			});
		});
 	</script>
</body>
</html>