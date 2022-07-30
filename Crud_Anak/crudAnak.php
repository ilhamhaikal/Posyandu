     <?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ../index.php");
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsd elivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<title>DATA ANAK</title>
  <style type="text/css">
    body{ 
      font-family: "Futura Md BT";
      background-image: url(../img/Menu/bg1.png);
      background-size: cover; 
      background-repeat: repeat-y;
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
  <div id="wrapper">
    <div id="container">
      <div id="content1" style="margin-left: 230px; margin-top: 130px;">
          <h1>Data Anak</h1>
          <button type="button" onclick="window.location.href='tambah_anak.php'" class="btn shadow-sm p-2 bg-success rounded" id="button" style="margin-top: 10px;">Tambah Data Anak</button><br><br>
          		<table id="ttable"border="0" class="table table-hover table-light table-striped">
              <thead class="bg-dark">
                  <tr class="text-white text-center">
                      <th class="align-middle">ID Anak</th>
                      <th class="align-middle">Nama Anak</th>
                      <th class="align-middle">NIK Anak</th>
                      <th class="align-middle">Tempat Lahir</th> 
                      <th class="align-middle">Tanggal Lahir</th>
                      <th class="align-middle" width="9%">Usia</th>
                      <th class="align-middle">Jenis Kelamin</th>
                      <th width="5%" class="align_middle">Nama Ibu</th>
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
  <button type="button" onclick="window.location.href='../home3.php'" class="btn shadow-sm p-2 bg-success rounded" id="button">Kembali</button>

<!--   <span id="status"></span><br><br>
  <button type="button" onclick="window.location.href='../home.html'">BACK TO DASHBORAD</button>
 -->
<br> 
</div>
  </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_anak;
    var nama_anak;
    var tempat_lahir_anak;
    var tgl_lahir_anak;
    var usia_anak;
    var jk_anak;
    var id_ibu;
    var jumlahHalaman;
    var halamanAktif;
    var data_anak;
    $(document).ready(function() {
      $("#ttable").val();
    });


	  function getAllData(){
      $.ajax({
		      type : "GET",	
          url : "../api/Anak/read.php",
          data : {page : "<?php $page = isset($_GET['page']) ? $_GET['page'] : 1; echo $page ?>"},
          cache : false,
          success : function(msg){
            console.log(msg);

          data = msg.records;
          jumlahHalaman = msg['jumlahHalaman'];
          halamanAktif = parseInt(msg['halamanAktif']);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td class='text-center'>"+element.id_anak+"</td>"+
              "<td>"+element.nama_anak+"</td>" +
              "<td>"+element.nik_anak+" </td>"+
              "<td>"+element.tempat_lahir_anak+" </td>" +
              "<td>"+element.tgl_lahir_anak+"</td>" +
              "<td>"+element.usia_anak+" Bulan</td>" +
              "<td class='text-center'>"+element.jk_anak+"</td>"+
              "<td>"+element.id_ibu+"</td>"+ 
              '<td><button onclick="window.location.href=\'formEditAnak.php?id_anak='+ element.id_anak +'\'"class="btn btn-info" style="padding: 0px 10px 0px 10px;">EDIT</button></td>' +
              '<td><button class="tdelete btn btn-danger" style="padding: 0px 10px 0px 10px;" value="'+element.id_anak+'">HAPUS</button></td>'
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
      $("#id_anak").change(function() {
        id_anak = $("#id_anak").val();
      });

      $(document).on('click', '.tdelete', function(){
        var yakin = confirm("Apakah anda yakin ingin menghapus data ? ")
        console.log($(this).val());
        if(yakin == true){
          $.ajax({
          type : "POST",
					url : "../api/Anak/delete.php",
					data : { func_anak : "delete", id_anak : $(this).val()},
					cache: false,
					success: function(msg){
            console.log(msg);
						if (msg.status==200) {
              getAllData();
              location.reload();
						}
						$("#loading").hide();
					}
				});
        }else{
          alert("data tidak jadi dihapus");
          }
				
			});
  


  </script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body> 
</html>