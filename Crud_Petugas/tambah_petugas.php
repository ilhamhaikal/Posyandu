<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ");
  }
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../tambahcss.css">
	<title>Form Tambah Data Petugas/Bidan</title>
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Tambah Data Petugas</h3><br>
                <label for="nama_petugas" id="label">Nama Petugas</label>
                <input type="text" class="form-control mb-3" id="nama_petugas">
            </div>

            <!-- <div class="form-group">
                <label for="jabatan_petugas" id="label">Jabatan Petugas</label>
                <input type="text" class="form-control" id="jabatan_petugas">
            </div> -->

            <div class="row">
                <label class="col-form-label col-sm-4 " id="label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="L" name="jk_petugas" id="laki">
                        <label class="form-check-label" for="gridRadios1">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input" type="radio" value="P" name="jk_petugas" id="perempuan">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="tempat_lahir_petugas" id="label">Tempat Lahir Petugas</label>
                    <input type="text" class="form-control" id="tempat_lahir_petugas">
                </div>

                <div class="form-group col-md-7">
                    <label for="tgl_lahir_petugas" id="label">Tanggal Lahir Petugas</label>
                    <input type="date" class="form-control" id="tgl_lahir_petugas">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat_petugas" id="label">Alamat Petugas</label>
                <input type="text" class="form-control" id="alamat_petugas">
            </div>

            <div class="form-group">
                <label for="no_telp_petugas" id="label">No Telepon Petugas</label>
                <input type="text" class="form-control" id="no_telp_petugas">
            </div>

            <!-- <div class="form-group">
                <label for="status_petugas" id="label">Status Petugas</label>
                <input type="text" class="form-control" id="status_petugas">
            </div> -->
	<!-- <form id="formnik">
	<center>
        <fieldset>
            <legend>Tambah Data Petugas</legend>
            <br><br><br> 
        Nama Petugas :<br> 
        <input type="text" id="nama_petugas"><p>
        Jabatan Petugas :<br> 
        <input type="text" id="jabatan_petugas"><p> 
        Jenis Kelamin Petugas :<br>
        <input type="radio" value="L" id="laki" name="jk_petugas">Laki - Laki<p>
        <input type="radio" value="P" id="perempuan" name="jk_petugas">Perempuan<p>
        Tempat Lahir Petugas : <br>
        <input type="text" id="tempat_lahir_petugas"><p>
        Tanggal Lahir : <br> 
        <input type="date" id="tgl_lahir_petugas" size="30"><p>
        Alamat Petugas : <br>
        <input type="text" id="alamat_petugas"><p>
        No Telepon Petugas : <br>
        <input type="text" id="no_telp_petugas"><p>
        Status Petugas :<br>
        <input type="text" id="status_petugas"><p> -->
        <div class="form-group row">
        <button onclick="window.location.href='Crud_Petugas/crudpetugas.php'" type="button" class="btn btn-success col-form">KEMBALI</button>
        <button type="button" id="ttambah" class="btn btn-success col-form">TAMBAH</button>
        <span id="status"></span>
    </div>
</fieldset>
</form>
	<script type="text/javascript">
		var nama_petugas;
		//var jabatan_petugas;
		var jk_petugas;
		var tempat_lahir_petugas;
		var tgl_lahir_petugas;
        var alamat_petugas;
        var no_telp_petugas;
        //var status_petugas;
		var petugas;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
                $("#status").html("lagi diproses");
				$("#ttambah").prop("disabled", true);
				//ambil nilai-nilai dari masing-masing input 
				nama_petugas = $("#nama_petugas").val();
    			//jabatan_petugas = $("#jabatan_petugas").val();
    			tempat_lahir_petugas = $("#tempat_lahir_petugas").val();
    			tgl_lahir_petugas = $("#tgl_lahir_petugas").val();
                alamat_petugas = $("#alamat_petugas").val();
    			no_telp_petugas = $("#no_telp_petugas").val();
    			//status_petugas = $("#status_petugas").val();

    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				petugas = {
					"nama_petugas" : nama_petugas,
					//"jabatan_petugas" : jabatan_petugas,
					"jk_petugas" : document.getElementById('laki').checked ? 'L' : 'P',
					"tempat_lahir_petugas" : tempat_lahir_petugas,
					"tgl_lahir_petugas" : tgl_lahir_petugas,
                    "alamat_petugas" : alamat_petugas,
                    "no_telp_petugas" : no_telp_petugas,
                    //"status_petugas" : status_petugas
				};	

				if (nama_petugas == ""  || jk_petugas == "" || tempat_lahir_petugas == "" || tgl_lahir_petugas == "" || alamat_petugas == "" || no_telp_petugas == "" ){
					alert("Data Tidak Lengkap");
					$("#status").html("");
                    $("#ttambah").prop("disabled", false);
				}
    			
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/Petugas/create.php",
    			data : {petugas : petugas, func_petugas : "tambah_data_petugas"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="petugas was created."){
    					alert("Data Petugas Berhasil Ditambah");
                        window.location.href="crudpetugas.php";
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