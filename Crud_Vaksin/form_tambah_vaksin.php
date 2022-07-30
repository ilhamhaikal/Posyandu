<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../tambahcss.css">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    <title>Form Tambah Vaksin/Vitamin</title>
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Tambah Data Vaksin/Vitamin</h3>
            <div class="form-group">
                <label for="nama_vaksin" id="label">Nama Vaksin/Vitamin</label>
                <input type="text" class="form-control" id="nama_vaksin">
            </div>
        <div class="form-group row">
        <button onclick="window.location.href='crudVaksin.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
        <button type="button" id="ttambah" class="btn btn-success col-form"> TAMBAH </button>  
        <span id="status"></span>
        </div>   
    </form>
</fieldset>
        

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var id_vaksin;
		var nama_vaksin;
		var vaksin;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
				$("#status").html("Sedang diproses");
				$("#ttambah").prop("disabled", true);
				//ambil nilai-nilai dari masing-masing input 
    			nama_vaksin = $("#nama_vaksin").val();
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				

				if (nama_vaksin == ""){
					alert("Data Tidak Lengkap");
					$("#status").html("");
					$("#ttambah").prop("disabled", false);
				}
				
				vaksin = {
					"nama_vaksin" : nama_vaksin
				};

				// console.log(vaksin);
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "../api/Vaksin/create.php",
    			data : { vaksin :  vaksin, func_vaksin : "tambah_data_vaksin"},
    			cache : false,
    			success : function(msg){
					// console.log(msg);
					$("#loading").hide();
					if (msg.status == 200) {
						alert("Data Vaksin Berhasil Ditambah");
						window.location.href="crudVaksin.php";
					}
       			}
				});
 			});
		});
	</script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>