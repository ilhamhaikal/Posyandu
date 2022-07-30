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
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../tambahcss.css">
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Edit Data Ibu</h3><br>
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
		
	<!-- <form>
		<center>
        <fieldset>
            <legend>Edit Data Ibu</legend>
            <br><br><br> 
		NIK Ibu  :<br> 
		<input type="text" id="nik_ibu"> <p> 
		Nama ibu :<br> 
		<input type="text" id="nama_ibu"><p>
		Alamat :<br> 
		<input type="text" id="alamat_ibu"><p> 
		No telp :<br> 
		<input type="text" id="no_telp_ibu" size="30"><p> 
		 -->


		<div class="form-group row">
		<button onclick="window.location.href='crudIbu.php'" type="button"  class="btn btn-success col-form"> KEMBALI </button>
		<button id="tupdate" type="button" class="btn btn-success col-form" id="tupdate"> PERBARUI </button>
		<span id="status"></span>
	</div>
		</form>
	</fieldset>
	<!-- </center>
</fieldset>
	</form> -->

	<script type="text/javascript">
		var nik_ibu;
		var nama_ibu;
		var alamat_ibu;
		var no_telp_ibu;
		var ibu;
    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "../../api/Ibu/read_one.php",
					data: {func_ibu : "ambil_single_data", id_ibu: "<?php echo $_GET['id_ibu']?>"},
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg;
						nik_ibu = data['nik_ibu'];
						nama_ibu = data['nama_ibu'];
						alamat_ibu = data['alamat_ibu'];
						no_telp_ibu = data['no_telp_ibu'];
						

						//masukan ke masing - masing textfield
						$("#nik_ibu").val(nik_ibu);
						$("#nama_ibu").val(nama_ibu);
						$("#alamat_ibu").val(alamat_ibu);
						$("#no_telp_ibu").val(no_telp_ibu);
					}
			});

    		$("#tupdate").click(function(){
    			nik_ibu = $("#nik_ibu").val();
    			nama_ibu = $("#nama_ibu").val();
    			alamat_ibu = $("#alamat_ibu").val();
    			no_telp_ibu = $("#no_telp_ibu").val();
    			
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				ibu = {
					"nik_ibu" : nik_ibu,
					"nama_ibu" : nama_ibu,
					"alamat_ibu" : alamat_ibu,
					"no_telp_ibu" : no_telp_ibu
				};	

				
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../../api/Ibu/update.php",
    			data : {ibu : ibu, func_ibu : "update_data_ibu", id_ibu: "<?php echo $_GET['id_ibu']?>"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="ibu was updated."){
    					alert("Data Ibu Berhasil Diperbarui");
    					window.location.href="crudIbu.php";
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
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>