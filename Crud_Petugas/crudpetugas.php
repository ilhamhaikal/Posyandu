<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ");
  }
?>
<html>
<head>
	<title>DATA PETUGAS/BIDAN</title>
    <style type="text/css">
      body{
        font-family: "Futura Md BT";
        background-image: url(../img/Menu/bg1.png);
        background-repeat: repeat;
        background-size: cover;
      }
      #button {
        color: white;
        margin-bottom: 20px;
      }
    </style>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
  
</head> 
<body> 
  <?php
    include "../sidebar.html";  
  ?>
  <div id="content1" style="margin-left: 230px; margin-top: 130px;">
      <h1>Data Petugas/Bidan</h1>
      <button type="buton" onclick="window.location.href='tambah_petugas.php'" class="btn shadow-sm p-2 bg-success rounded" id="button" style="margin-top: 10px;">Tambah Data Petugas/Bidan</button><br><br>
      	<table id="ttable" border="0" class="table table-hover table-light table-striped">
          <thead class="bg-dark">
              <tr class="text-white text-center align-middle">
                  <th width="10%">ID Petugas</th>
                  <!-- <th>Nama Anak</th>
                  <th>ID Petugas</th>
                  <th>ID Vaksin</th> -->
                  <th class="align-middle">Nama</th>
                  <!-- <th class="align-middle">Jabatan</th> -->
                  <th class="align-middle">Jenis Kelamin</th>
                  <th class="align-middle">Tempat Lahir</th>
                  <th class="align-middle">Tanggal Lahir</th>
                  <th class="align-middle">Alamat</th>
                  <th class="align-middle">No Telepon</th>
                  <!-- <th class="align-middle">Status</th> -->
                  <th colspan=2 style="text-align: center; width: 7%;" class="align-middle">Aksi</th>
              </tr>
          </thead>
          <tbody id="content">
          </tbody>
        </table>
        <br>
      <div id="contentPagination"></div>
      <br>
        <span id="status"></span>
        <button onclick="window.location.href='../home3.php'"  class="btn shadow-sm p-2 bg-success rounded" id="button">Kembali</a></button><br>
      </div>	
	 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_petugas;
    var nama_petugas;
    // var jabatan_petugas;
    var jk_petugas;
    var tempat_lahir_petugas;
    var tgl_lahir_petugas;
    var alamat_petugas;
    var no_telp_petugas;
    // var status_petugas;
    var data_petugas;
    var jumlahHalaman;
    var halamanAktif;
    $(document).ready(function() {
      $("#ttable").val();
    });

	  function getAllData(){
      $.ajax({
		      type : "GET",	
          url : "../api/Petugas/read.php",
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
              content+= "<td class='text-center'>"+element.id_petugas+"</td>"+
              "<td>"+element.nama_petugas+"</td>" +
              // "<td>"+element.jabatan_petugas+" </td>"+
              "<td class='text-center'>"+element.jk_petugas+" </td>" +
              "<td>"+element.tempat_lahir_petugas+" </td>" +
              "<td>"+element.tgl_lahir_petugas+" </td>" +
              "<td>"+element.alamat_petugas+" </td>"+
              "<td>"+element.no_telp_petugas+" </td>" +
              // "<td>"+element.status_petugas+" </td>"+
              '<td><button onclick="window.location.href=\'formEditPetugas.php?id_petugas='+ element.id_petugas +'\'" class="btn btn-info" style="padding: 0px 10px 0px 10px;">EDIT</button></td>' +
              '<td><button class="tdelete btn btn-danger" style="padding: 0px 10px 0px 10px;" value="'+element.id_petugas+'">HAPUS</button></td>'
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
      $("#id_petugas").change(function() {
        id_petugas = $("#id_petugas").val();
      });

      $(document).on('click', '.tdelete', function(){
        var yakin = confirm("Apakah anda yakin ingin menghapus data ? ");
        if(yakin == true){
          $.ajax({
          type : "POST",
					url : "../api/Petugas/delete.php",
					data : {func_petugas : "delete", id_petugas : $(this).val()},
					cache: false,
					success: function(msg){
						if (msg.message=="petugas was deleted.") {
              getAllData();
						} else {
							$("#status").html("EROR. . .");
						}
						$("#loading").hide();
					}
				}); 
        }else{alert("data tidak jadi dihapus");}
				
			});
    


  </script>


	<!-- <button onclick="window.location.href='../home3.html'">BACK TO DASHBOARD</a></button><br> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
</body> 
</html>