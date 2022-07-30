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
	<link rel="stylesheet" type="text/css" href="../tambahcss.css">
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<title>Tambah</title>
	
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Tambah Data Penimbangan</h3><br>
			<!-- <div class="form-group">
				<label for="tgl_Penimbangan" id="label">Tanggal Penimbangan</label>
				<input type="date" class="form-control" id="tgl_Penimbangan">
			</div> -->

			<div class="form-group">
				<label for="nama_anak" id="label">Nama Anak</label>
				<select class="form-control" id="nama_anak"></select>
			</div>

			<div class="form-group">
				<label for="tinggi_badan" id="label">Tinggi badan</label>
				<input type="text" class="form-control" id="tinggi_badan">
			</div>

			<div class="form-group">
				<label for="berat_badan" id="label">Berat badan</label>
				<input type="text" class="form-control" id="berat_badan">
			</div>

		<div class="form-group row">
			<button onclick="window.location.href='Crud_Timbangan.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
			<button type="button" id="ttambah" class="btn btn-success col-form"> TAMBAH </button>
			<span id="status"></span>
		</div>
</fieldset>
</form>
<script type="text/javascript">
		var tgl_penimbangan;
		var tinggi_badan;
		var berat_badan;
		var nama_anak;
		var Penimbangan;
		$(document).ready(function(){
			$("#nama_anak").load("../api/Penimbangan/create.php", "func_Penimbangan=ambil_option_anak");
			
			$("#nama_anak").change(function(){
				nama_anak = $(this).children("option:selected").val();
			});

			$("#ttambah").click(function(){ 
				$("#status").html("lagi diproses");
				$("#ttambah").prop("disabled", true);
				//ambil nilai-nilai dari masing-masing input 
				// tgl_Penimbangan = $("#tgl_Penimbangan").val();
    			tinggi_badan = $("#tinggi_badan").val();
    			berat_badan = $("#berat_badan").val();
    			//data = "&tgl_Penimbangan="+tgl_Penimbangan+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				Penimbangan = {
					// "tgl_Penimbangan" : tgl_Penimbangan,
					"tinggi_badan" : tinggi_badan,
					"berat_badan" : berat_badan,
					"nama_anak" : nama_anak
				};	

				if (tinggi_badan == "" || berat_badan == "" || nama_anak == ""){
					alert("Data Tidak Lengkap");
					$("#status").html("");
					$("#ttambah").prop("disabled", false);
				}
			
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/Penimbangan/create.php",
    			data : {Penimbangan : Penimbangan},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="Timbangan was created."){
    					alert("Data Penimbangan Berhasil Ditambah");
						window.location.href="Crud_Timbang.php";
    				}else{
    					$("#status").html("ERROR. . . ");
    				}
    				$("#loading").hide();
       			}
				});
 			});
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


</body>
</html>