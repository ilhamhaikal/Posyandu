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


</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Edit Data Penimbangan</h3><br> 
			<!-- <div class="form-group">
				<label for="tgl_timbangan" id="label">Tanggal timbangan</label>
				<input type="date" class="form-control" id="tgl_timbangan">
			</div> -->

			<div class="form-group">
				<label for="nama_anak" id="label">Nama Anak</label>
				<input class="form-control" id="nama_anak" disabled>
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
		<button onclick="window.location.href='Crud_Timbang.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
		<button id="tupdate" type="button" class="btn btn-success col-form"> PERBARUI </button>
		<span id="status"></span>
	</div>
</fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_timbangan;
    var nama_anak;
    var tinggi_badan;
    var berat_badan;
    var timbangan;

    $(document).ready(function () {
    	$(document).ready(function(){

			$("#nama_anak").load("../api/Penimbangan/read_one.php", "func_timbangan=ambil_option_anak");
			
			$.ajax({
					type : "GET",
					url: "../api/Penimbangan/read_one.php",
					data: {func_timbangan : "ambil_single_data", id_timbangan: "<?php echo $_GET['id_timbangan']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg;
						// tgl_timbangan = data['tgl_timbangan'];
						tinggi_badan = data['tinggi_badan'];
						berat_badan = data['berat_badan'];
						nama_anak = data['nama_anak'];


						//masukan ke masing - masing textfield
						// $("#tgl_timbangan").val(tgl_timbangan);
						$("#tinggi_badan").val(tinggi_badan);
						$("#berat_badan").val(berat_badan);
						$("#nama_anak").val(nama_anak);
					}
			});
				// $("#nama_anak").change(function(){
				// 	nama_anak = $(this).children("option:selected").val();
				// });

    		$("#tupdate").click(function(){
    			// tgl_timbangan = $("#tgl_timbangan").val();
    			tinggi_badan = $("#tinggi_badan").val();
    			berat_badan = $("#berat_badan").val();

    			//data = "&tgl_timbangan="+tgl_timbangan+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				timbangan = {
					"tinggi_badan" : tinggi_badan,
					"berat_badan" : berat_badan,
					"nama_anak" : nama_anak
				};	

				
   
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/timbangan/update.php",
    			data : {timbangan : timbangan, func_timbangan : "update_data_imun", id_timbangan: "<?php echo $_GET['id_timbangan']?>"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="timbangan was updated."){
    					alert("Data timbangan Berhasil Diperbarui");
    					window.location.href="crudtimbangan.php";
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