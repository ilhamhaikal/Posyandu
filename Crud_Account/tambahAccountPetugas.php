<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ..\login.php");
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
            <h3>Tambah Account Petugas</h3><br>
            <div class="form-group">
                <label for="nama_petugas" id="label">Nama Petugas</label>
                <select class="form-control" id="nama_petugas"></select>
            </div>

            <div class="form-group">
                <label for="username" id="label">Username Account</label>
                <input type="text" class="form-control" id="username">
            </div>

            <div class="form-group"> 
                <label for="password" id="label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
			<div class="form-group row">
                <button onclick="window.location.href='accountPetugas.php'" type="button" class="btn btn-success col-form">KEMBALI</button>
                <button type="button" class="btn btn-success col-form" id="ttambah">TAMBAH</button>
            	<span id="status"></span>
        	</div>
	    </form>
    </fieldset>

	<script type="text/javascript">
		var username = "";
		var password = "";
		var nama_petugas = "";
		var data_account;
		$(document).ready(function(){
			
			$("#nama_petugas").load("../api/accountPetugas/create.php", "func_account=ambil_option_petugas");

			$("#nama_petugas").change(function(){
				nama_petugas = $(this).children("option:selected").val();
			});


			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				$("#status").html("lagi diproses");
				$("#ttambah").prop("disabled", true);
				username = $("#username").val();
    			password = $("#password").val();
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				data_account = {
					"username" : username,
					"password" : password,
					"nama_petugas" : nama_petugas
				};	
				
				if ($("#username").val() == "" || $("#password") == ""){
					alert("Data Tidak Lengkap");
					$("#status").html("");
					$("#ttambah").prop("disabled", false);
				}
				
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/AccountPetugas/create.php",
    			data : {data_account : data_account},
    			cache : false,
    			success : function(msg){
    				if(msg.message == "account was created."){
    					alert("Account berhasil Ditambah");
						window.location.href="accountPetugas.php";
    				} else if (http_request_code == 503) {
    					alert("ERROR...");
						$("#status").html("ERROR...");
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