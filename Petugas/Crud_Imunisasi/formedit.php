<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../tambahcss.css">
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">


</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Edit Data Imunisasi</h3><br> 
			<div class="form-group">
				<label for="tgl_imunisasi" id="label">Tanggal Imunisasi</label>
				<input type="date" class="form-control" id="tgl_imunisasi">
			</div>

			<div class="form-group">
				<label for="nama_anak" id="label">Nama Anak</label>
				<select class="form-control" id="nama_anak"></select>
			</div>
			
			<div class="form-group">
				<label for="nama_ibu" id="label">Nama Ibu</label>
				<select class="form-control" id="nama_ibu"></select>
			</div>

			<div class="form-group">
				<label for="nama_petugas" id="label">Nama Petugas</label>
				<select class="form-control" id="nama_petugas"></select>
			</div>

			<div class="form-group">
				<label for="usia_saat_vaksin" id="label">Usia saat vaksin</label>
				<input type="text" class="form-control" id="usia_saat_vaksin">
			</div>

			<div class="form-group">
				<label for="tinggi_badan" id="label">Tinggi badan</label>
				<input type="text" class="form-control" id="tinggi_badan">
			</div>

			<div class="form-group">
				<label for="berat_badan_umur" id="label">Berat badan (Umur)</label>
				<input type="text" class="form-control" id="berat_badan_umur">
			</div>

			<div class="form-group">
				<label for="berat_badan_berdiri" id="label">Berat badan (Berdiri)</label>
				<input type="text" class="form-control" id="berat_badan_berdiri">
			</div>

			<div class="form-group">
				<label for="berat_badan_terlentang" id="label">Berat badan (Terlentang)</label>
				<input type="text" class="form-control" id="berat_badan_terlentang">
			</div>

			<div class="form-group">
				<label for="periode" id="label">Periode</label>
				<select class="form-control" id="periode">
				<option>PILIH PERIODE</option>
  					<option value="0-7 hari">0 - 7 hari</option>
					<option value="1 bulan">1 Bulan</option>
					<option value="2 bulan">2 Bulan</option>
					<option value="3 bulan">3 Bulan</option>
					<option value="4 bulan">4 Bulan</option>
					<option value="5 bulan">5 Bulan</option>
					<option value="9 bulan">9 Bulan</option>
					<option value="18 bulan">18 Bulan</option>
					<option value="2 tahun">2 Tahun</option>
				</select>
			</div>

			<div class="form-group">
				<label for="nama_vaksin" id="label">Nama Vaksin</label>
				<input type="text" class="form-control" id="nama_vaksin">
			</div>

	<!-- <form>
		<center>
        <fieldset>
            <legend>Edit Data Imunisasi</legend>
            <br><br><br> 
		Tanggal Imunisasi :<br> 
		<input type="date" id="tgl_imunisasi"><p>
		Usia Saat Vaksin : <br>
		<input type="text" id="usia_saat_vaksin"><p>
		Tinggi Badan : <br>
		<input type="text" id="tinggi_badan"><p>
		Berat Badan : <br>
		<input type="text" id="berat_badan"><p>
		Periode : <br>
		<input type="text" id="periode"><p>
 -->
 	<div class="form-group row">
		<button onclick="window.location.href='crudImunisasi.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
		<button id="tupdate" type="button" class="btn btn-success col-form"> PERBARUI </button>
		<span id="status"></span>
	</div>
</fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_imunisasi;
    var nama_anak;
    var nama_petugas;
    var nama_vaksin;
    var tgl_imunisasi;
    var tinggi_badan;
    var berat_badan_umur;
    var berat_badan_berdiri;
    var berat_badan_terlentang;
    var usia_saat_vaksin;
    var periode;
    var imunisasi;

    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imunisasi=ambil_data_imun");
			$("#nama_anak").load("../../api/Imunisasi/read_one.php", "func_imunisasi=ambil_option_anak");
			$("#nama_petugas").load("../../api/Imunisasi/read_one.php", "func_imunisasi=ambil_option_petugas");
			$("#nama_ibu").load("../../api/Imunisasi/read_one.php", "func_imunisasi=ambil_option_ibu");
			$("#nama_vaksin").load("../../api/Imunisasi/read_one.php", "func_imunisasi=ambil_option_vaksin");
			
			$.ajax({
					type : "GET",
					url: "../../api/Imunisasi/read_one.php",
					data: {func_imunisasi : "ambil_single_data", id_imunisasi: "<?php echo $_GET['id_imunisasi']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg;
						tgl_imunisasi = data['tgl_imunisasi'];
						usia_saat_vaksin = data['usia_saat_vaksin'];
						tinggi_badan = data['tinggi_badan'];
						berat_badan_umur = data['berat_badan_umur'];
						berat_badan_berdiri = data['berat_badan_berdiri'];
						berat_badan_terlentang = data['berat_badan_terlentang'];
						periode = data['periode'];
						nama_anak = data['nama_anak'];
						nama_petugas = data['nama_petugas'];
						nama_vaksin = data['nama_vaksin'];
						nama_ibu = data['nama_ibu'];

						//masukan ke masing - masing textfield
						$("#tgl_imunisasi").val(tgl_imunisasi);
						$("#usia_saat_vaksin").val(usia_saat_vaksin);
						$("#tinggi_badan").val(tinggi_badan);
						$("#berat_badan_umur").val(berat_badan_umur);
						$("#berat_badan_berdiri").val(berat_badan_berdiri);
						$("#berat_badan_terlentang").val(berat_badan_terlentang);
						$("#periode").val(periode);
						$("#nama_anak").val(nama_anak);
						$("#nama_petugas").val(nama_petugas);
						$("#nama_vaksin").val(nama_vaksin);
						$("#nama_ibu").val(nama_ibu);
					}
			});
				$("#nama_anak").change(function(){
					nama_anak = $(this).children("option:selected").val();
				});
				$("#nama_petugas").change(function(){
					nama_petugas = $(this).children("option:selected").val();
				});

				$("#nama_ibu").change(function(){
					nama_ibu = $(this).children("option:selected").val();
				});

				$("#nama_vaksin").change(function(){
					nama_vaksin = $(this).children("option:selected").val();
				});
				$("#periode").change(function(){
					periode = $(this).children("option:selected").val();
					switch(periode){
					case "0-7 hari":
						nama_vaksin = "HB";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "1 bulan":
						nama_vaksin = "BCG + Polio 1";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "2 bulan":
						nama_vaksin = "DPT 1 + Polio 2";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "3 bulan":
						nama_vaksin = "DPT 2 + Polio 3";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "4 bulan":
						nama_vaksin = "DPT 3 + Polio 4";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "5 bulan":
						nama_vaksin = "IPV";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "9 bulan":
						nama_vaksin = "MR";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "18 bulan":
						nama_vaksin = "DPT 4 (Lanjutan)";
						$("#nama_vaksin").val(nama_vaksin);
						break;
					case "2 tahun":
						nama_vaksin = "MR 2";
						$("#nama_vaksin").val(nama_vaksin);
						break;
				}
				});

    		$("#tupdate").click(function(){
    			tgl_imunisasi = $("#tgl_imunisasi").val();
    			usia_saat_vaksin = $("#usia_saat_vaksin").val();
    			tinggi_badan = $("#tinggi_badan").val();
    			berat_badan_umur = $("#berat_badan_umur").val();
    			berat_badan_berdiri = $("#berat_badan_berdiri").val();
    			berat_badan_terlentang = $("#berat_badan_terlentang").val();

    			//data = "&tgl_imunisasi="+tgl_imunisasi+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				imunisasi = {
					"tgl_imunisasi" : tgl_imunisasi,
					"usia_saat_vaksin" : usia_saat_vaksin,
					"tinggi_badan" : tinggi_badan,
					"berat_badan_umur" : berat_badan_umur,
					"berat_badan_berdiri" : berat_badan_berdiri,
					"berat_badan_terlentang" : berat_badan_terlentang,
					"periode" : periode,
					"nama_anak" : nama_anak,
					"nama_petugas" : nama_petugas,
					"nama_vaksin" : nama_vaksin,
					"nama_ibu" : nama_ibu
				};	

				
   
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../../api/Imunisasi/update.php",
    			data : {imunisasi : imunisasi, func_imunisasi : "update_data_imun", id_imunisasi: "<?php echo $_GET['id_imunisasi']?>"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="imunisasi was updated."){
    					alert("Data Imunisasi Berhasil Diperbarui");
    					window.location.href="crudImunisasi.php";
    				}else{
    					$("#status").html("ERROR. . . ");
    				}
    				$("#loading").hide();
       			}
    		});
    		});
    	});
    });
 	</script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>