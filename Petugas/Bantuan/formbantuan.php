<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: http://localhost/Aplikasi_EPosyandu/index.php");
  }
?>
<html>
<head>
	<title>Form Kritik dan Saran</title>
	<link rel="stylesheet" type="text/css" href="bantuann.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<style type="text/css">
		body{
	    font-family: "futura Md BT";
	    background-image: url(../img/Menu/bggg.png);
	    background-repeat: repeat-y;
		}
		.form-horizontal{
			width: 30%;
			margin-left: 500px; 
			margin-top: 140px;
		}
		.form-control{
			width: 80%;
		}
		.btn{
			margin-left: 47px;
		}
		#tambahpesan{
			margin-left: 20px;
		}
		.form-group{
			margin: 10px 30px 30px 30px;
		}
	</style>
</head> 
<body> 
	<?php
    include "../sidebar.html";
  	?>
	<fieldset>
		
		<form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
			<h3>Kritik dan Saran</h3><br>
			<div class="form-group">
				<label for="nama" id="label">Nama</label>
				<input type="text" class="form-control" id="nama">
			</div>

			<div class="form-group">
				<label for="email" id="label">Email</label>
				<input type="text" class="form-control" id="email">
			</div>

			<div class="form-group">
				<label for="pesan" id="label">Pesan</label>
				<textarea type="text" class="form-control" id="pesan"></textarea>
			</div>
<!-- 
Nama : 
<input type="text" id="nama"><p>
Pesan : 
<input type="textarea" rowspan="10" colpan="3" id="pesan"><p>
Email : 
<input type="text" id="email"><br><br> -->
		<div class="form-group row">
			<button type="button" onclick="window.location.href='../home3.php'" class="btn btn-success col-form">Kembali</button>
			<button type="button" id="tambahpesan" class="btn btn-success col-form">Kirim</button>
			<span id="status"></span>
		</div> </form> </fieldset>
	


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var id_bantuan;
        var nama;
		var pesan;
		var email;
		var bantuan;
		$(document).ready(function(){
			$("#tambahpesan").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nama= $("#nama").val();
    			pesan = $("#pesan").val();
				email = $("#email").val();
    			

    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				pesan = {
					"nama" : nama,
					"pesan" : pesan,
					"email" : email				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesBantuan.php",
    			data : {pesan : pesan, func_pesan : "tambah_pesan"},
    			cache : false,
    			success : function(msg)
				
				{
    				if(msg=="pesan disimpan"){
    					$("#status").html("Pesan Berhasil ditambahkan. . . ");
    				}else{
    					$("#status").html("ERROR. . . ");
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