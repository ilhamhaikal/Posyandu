<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstr
	ap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../tambahcss.css">
	<style type="text/css">
		.form-control{
        	width: 50%;
		}
	</style>
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
			<h3>Tambah Data Ibu</h3><br>
			<div class="form-group">
				<label for="nik_ibu" id="label">NIK Ibu</label>
				<input type="text" class="form-control" id="nik_ibu">
			</div>
			
			<div class="form-group">
				<label for="nama_ibu" id="label">Nama Ibu</label>
				<input type="text" class="form-control" id="nama_ibu">
			</div>

			<div class="form-group">
				<label for="alamat_ibu" id="label">Alamat</label>
				<input type="text" class="form-control" id="alamat_ibu">
			</div>

			<div class="form-group">
				<label for="no_telp_ibu" id="label">No Telp</label>
				<input type="text" class="form-control" id="no_telp_ibu">
			</div>

		<div class="form-group row">
			<button type="button" onclick="window.location.href='crudIbu.php'" class="btn btn-success col-form">KEMBALI</a></button>
			<button id="ttambah" type="button" class="btn btn-success col-form">TAMBAH</button>
			<span id="status"style="padding-left: 15px;"></span>
		</div>
	</form>
</fieldset>

	<!-- </fieldset>
</center>
	</form> -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var nik_ibu;
		var nama_ibu;
		var alamat_ibu;
		var no_telp_ibu;
		var ibu;
		$(document).ready(function(){
		$("#ttambah").click(function(){ 
			$("#status").html("lagi diproses");
				$("#ttambah").prop("disabled", true);
				nik_ibu = $("#nik_ibu").val(); 
				
				nama_ibu = $("#nama_ibu").val(); 
				alamat_ibu = $("#alamat_ibu").val(); 
				no_telp_ibu = $("#no_telp_ibu").val(); 
				ibu = "&nik_ibu="+nik_ibu + "&nama_ibu="+nama_ibu+"&alamat_ibu="+alamat_ibu+"&no_telp_ibu="+no_telp_ibu;
				
				ibu = {
					"nama_ibu" : nama_ibu,
					"nik_ibu" : nik_ibu,
					"alamat_ibu" : alamat_ibu,
					"no_telp_ibu" : no_telp_ibu		
				};

				if (nik_ibu == "" || nama_ibu == "" || alamat_ibu == "" || no_telp_ibu == ""){
					alert("Data Tidak Lengkap");
					$("#status").html("");
                    $("#ttambah").prop("disabled", false);
				}
				
				$("#loading").show(); 
				$.ajax({ 
					type : "POST",
					url: "../../api/Ibu/create.php", 
					data: {ibu : ibu, func_ibu : "tambah_data_ibu"},
					cache: false, 
					success: function(msg){ 
						if(msg.message == "ibu was created."){ 
							alert("Data Ibu Berhasil Ditambah"); 
							window.location.href="crudIbu.php";
						} else { 
							$("#status").html("ERROR.."); 
						} 
						$("#loading").hide(); 
					}
				});
 			});
});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>