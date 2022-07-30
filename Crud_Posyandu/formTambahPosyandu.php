<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../tambahcss.css">
	<title>Tambah</title>
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Tambah Data Posyandu</h3><br>
				<label for="nama_posyandu" id="label">Nama Posyandu</label>
				<input type="text" class="form-control" id="nama_posyandu">
			</div>

			<div class="form-group">
				<label for="alamat_posyandu" id="label" style="margin-top: 10px;">Alamat</label>
				<input type="text" class="form-control" id="alamat_posyandu">
			</div>

			<div class="form-group">
				<label for="kel_posyandu" id="label">Kelurahan Posyandu</label>
				<input type="text" class="form-control" id="kel_posyandu">
			</div>

			<div class="form-group">
				<label for="kec_posyandu" id="label">Kecamatan Posyandu</label>		
				<input type="text" class="form-control" id="kec_posyandu">		
			</div>

			<div class="form-group">
				<label for="kota_kab_posyandu" id="label">Kota/Kabupaten</label>
				<input type="text" class="form-control" id="kota_kab_posyandu">
			</div>
			<div class="form-group row"> 
				<button onclick="window.location.href='crudPosyandu.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
				<button type="button" id="ttambah" class="btn btn-success col-form"> TAMBAH </button>
				<span id="status"></span>
			</div>
		</form>
	</fieldset>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var nama_posyandu;
		var alamat_posyandu;
		var kel_posyandu;
		var kec_posyandu;
		var kota_kab_posyandu;
		var posyandu;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
				$("#status").html("lagi diproses");
				$("#ttambah").prop("disabled", true);
				//ambil nilai-nilai dari masing-masing input 
				nama_posyandu = $("#nama_posyandu").val();

    			alamat_posyandu = $("#alamat_posyandu").val();
    			kel_posyandu = $("#kel_posyandu").val();
    			kec_posyandu = $("#kec_posyandu").val();
    			kota_kab_posyandu = $("#kota_kab_posyandu").val();
    			//data = "&nama_posyandu="+nama_posyandu+"&alamat_posyandu="+alamat_posyandu+"&kel_posyandu="+kel_posyandu+"&kec_posyandu="+kec_posyandu+"&kota_kab_posyandu="+kota_kab_posyandu;
				posyandu = {
					"nama_posyandu" : nama_posyandu,
					"alamat_posyandu" : alamat_posyandu,
					"kel_posyandu" : kel_posyandu,
					"kec_posyandu" : kec_posyandu,
					"kota_kab_posyandu" : kota_kab_posyandu
				};	

				if (nama_posyandu == "" || alamat_posyandu == "" || kel_posyandu == "" || kec_posyandu == "" || kota_kab_posyandu == ""){
					alert("Data Tidak Lengkap");
					$("#status").html("");
					$("#ttambah").prop("disabled", false);
				}
				
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/Posyandu/create.php",
    			data : {posyandu : posyandu, func_posyandu : "tambah_data_posyandu"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="posyandu was created."){
    					alert("Data Posyandu Berhasil Ditambah");
						window.location.href="crudPosyandu.php";
    				}else{
    					alert("Data Posyandu Tidak Bisa Ditambah");
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