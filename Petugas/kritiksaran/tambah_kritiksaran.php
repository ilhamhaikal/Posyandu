<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: index.php");
  }
?>
<html>
<head>
	<title>Form Kritik dan Saran</title>
	<!-- <link rel="stylesheet" type="text/css" href="../Bantuan/bantuann.css"> -->
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
			<div class="form-group">
				<label for="nama_ibu" id="label">Nama Ibu</label>
				<select class="form-control" id="nama"></select>
			</div>
			</div>

			<div class="form-group">
				<label for="email" id="label">Email Ibu</label>
				<input type="text" class="form-control" id="email">
			</div>

			<div class="form-group">
				<label for="pesan" id="label">Kritik atau Saran</label>
				<textarea type="text" class="form-control" id="kritik"></textarea>
			</div>
			<div class="form-group">
				<label for="tanggal" id="label">Tanggal</label>
				<input type="date" class="form-control" id="tanggal">
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
		var id_kritik;
        var nama;
		var kritik;
		var email;
		var saran;
		$(document).ready(function(){
			$("#nama").load("../../api/Imunisasi/create.php", "func_imunisasi=ambil_option_ibu");
			$("#nama").change(function(){
				nama = $(this).children("option:selected").val();
			});
			$("#tambahpesan").click(function(){ 
				$("#status").html("lagi diproses");
				$("#tambahpesan").prop('disabled', true);
				//ambil nilai-nilai dari masing-masing input 
    			kritik = $("#kritik").val();
				email = $("#email").val();
				tanggal = $("#tanggal").val();
    			

    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				saran = {
					"nama" : nama,
					"kritik" : kritik,
					"email" : email,
					"tanggal" : tanggal				
				};	

				
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "proseskritiksaran.php",
    			data : {saran : saran, func_saran : "tambah_saran"},
    			cache : false,
    			success : function(msg)
				
				{
    				if(msg=="saran disimpan"){
    					alert("Kritik dan Saran berhasil ditambahkan");
						window.location.href="../home3.php";
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