<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: /index.php");
  }
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<title>DATA IBU</title>
	    <style type="text/css">
			body{
				font-family: "Futura Md BT";
		        background-image: url(../img/Menu/bg1.png);
		        background-repeat: repeat;
		    }
	      	#button {
	      		color: white;
	      	}
	    </style>
</head> 
<body> 
	<?php
    include "../sidebar.html";
  ?>
  	<div id="content1" style="margin-left: 230px; margin-top: 130px;">
  			<h1>Data Ibu</h1>
  			<button type="button" onclick="window.location.href='formTambahIbu.php'"class="btn shadow-sm p-2 bg-success rounded" id="button" style="margin-top: 10px;">Tambah Data Ibu</button> <br><br>
				<table id="ttable" border="0" class="table table-hover table-light table-striped">
					<thead class="bg-dark">
			        	<tr class="text-white text-center align-middle">
							<th>ID Ibu</th>
							<th>Nama Ibu</th>
							<th>Nik Ibu</th>
							<th>Alamat Ibu</th>
							<th>No Telp Ibu</th>
							<th colspan="2" style="text-align: center;">Aksi</th>
						</tr>
					</thead>
					<tbody id="content">
				
					</tbody>
				 </table>
				 <br>
				 <div id="contentPagination"></div>
				 <br>
		  <span id="status"></span>
		  <button type="button" onclick="window.location.href='../home3.php'" class="btn shadow-sm p-2 bg-success rounded" id="button">Kembali</button><br><br>
	</div>
<!-- 
	  <button type="button" onclick="window.location.href='../home.html'">BACK TO DASHBOARD</button> -->
	  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	  <script type="text/javascript">
		var id_ibu;
		var nama_ibu;
		var nik_ibu;
		var alamat_ibu;
		var telp_ibu;
		var jumlahHalaman;
    	var halamanAktif;
		var data;
		$(document).ready(function() {
		  $("#ttable").val();
		});
	
	
		  function getAllData(){
			$.ajax({
				type : "GET",	
				url : "../../api/Ibu/read.php",
				data : {page : "<?php $page = isset($_GET['page']) ? $_GET['page'] : 1; echo $page ?>"},
				cache : false,
				success : function(msg){
				data = msg.records;
				jumlahHalaman = msg['jumlahHalaman'];
          		halamanAktif = parseInt(msg['halamanAktif']);
				console.log(data);
				var content = "";
					for (let index = 0; index < data.length; index++) {
					const element = data[index];
					content+="<tr>";
					content+= "<td class='text-center'>"+element.id_ibu+"</td>"+
					"<td>"+element.nama_ibu+"</td>" +
					"<td>"+element.nik_ibu+" </td>"+
					"<td>"+element.alamat_ibu+" </td>" +
					"<td>"+element.no_telp_ibu+"</td>"+
				'<td><button onclick="window.location.href=\'formEditIbu.php?id_ibu='+ element.id_ibu +'\'" class="btn btn-info" style="padding: 0px 10px 0px 10px;">EDIT</button></td>' +
              	'<td><button class="tdelete btn btn-danger" style="padding: 0px 10px 0px 10px;"  value="'+element.id_ibu+'">HAPUS</button></td>'
					content+="</tr>";
					}

					var contentPagination = "";
            contentPagination = "<h5>";
            if (halamanAktif > 1){
              contentPagination += "<a href='?page=" + (halamanAktif - 1) + "' style='color:silver'><b>&#10094;</b></a>";
            } 
            
            contentPagination += "&ensp;" + halamanAktif + "&ensp;of&ensp;" + jumlahHalaman + " &ensp;";

            if (halamanAktif < jumlahHalaman){
              contentPagination += "<a href='?page=" + (halamanAktif + 1) + "' style='color:silver'><b>&#10095;</b></a>";
            }
            contentPagination += " &#9;</h5>";
            content+="</tr>";
            $("#content").html(content);
            $("#contentPagination").html(contentPagination);
				}
				});
			}

			getAllData();
			 $(document).on('click', '.tdelete', function(){
				 var yakin = confirm("Apakah anda yakin ingin menghapus data ? ");
				 if(yakin == true){
					$.ajax({
          			type : "POST",
					url : "../../api/Ibu/delete.php",
					data : {func_ibu : "delete", id_ibu : $(this).val()},
					cache: false,
					success: function(msg){
						if (msg.message=="ibu was deleted.") {
              				getAllData();
						} else {
							$("#status").html("ERROR. . .");
						}
						$("#loading").hide();
					}
				});
				 }else{alert("data tidak jadi dihapus");}
				
			});
	
	
	  </script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body> 
</html>