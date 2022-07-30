<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA POSYANDU</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
      <style type="text/css">
        body{
          font-family: "Futura Md BT";
          background-image: url(../img/Menu/bg1.png);
          background-repeat: repeat-y;
          background-size: cover;
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
    <h1>Data Posyandu</h1>
    <button type="button" onclick="window.location.href='formTambahPosyandu.php'" class="btn shadow-sm p-2 bg-success rounded" id="button" style="margin-top: 10px;">Tambah Data Posyandu</button>
    <br><br>
    <table id="ttable" border="0" class="table table-hover table-light table-striped">
      <thead class="bg-dark">
        <tr class="text-white text-center align-middle">
            <th>ID Posyandu</th>
            <th>Nama Posyandu</th>
            <th>Alamat Posyandu</th>
            <th>Kelurahan Posyandu</th>
            <th>Kecamatan Posyandu</th>
            <th>Kota/Kabupaten Posyandu</th>
            <th colspan="2" style="text-align: center;" class="align-middle">Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
  <span id="status"></span>
  <button type="button" onclick="window.location.href='../home3.php'" class="btn shadow-sm p-2 bg-success rounded" id="button">Kembali</button><br><br>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_posyandu;
    var nama_posyandu;
    var alamat_posyandu;
    var kel_posyandu;
    var kec_posyandu;
    var kota_kab_posyandu;
    var posyandu;
    $(document).ready(function() {
      $("#ttable").val();
    });


	  function getAllData(){
      $.ajax({
		  type : "GET",	
          url : "../api/Posyandu/read.php",
          data : {func_posyandu : "ambil_data_posyandu"},
          cache : false,
          success : function(msg){
          data = msg.records;
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td class='text-center'>"+element.id_posyandu+"</td>"+
              "<td>"+element.nama_posyandu+"</td>" +
              "<td>"+element.alamat_posyandu+"</td>"+
              "<td>"+element.kel_posyandu+"</td>" +
              "<td>"+element.kec_posyandu+"</td>" +
              "<td>"+element.kota_kab_posyandu+"</td>" +
              '<td><button onclick="window.location.href=\'formEditPosyandu.php?id_posyandu='+ element.id_posyandu +'\'" class="btn btn-info" style="padding: 0px 10px 0px 10px;">EDIT</button></td>' +
              '<td><button class="tdelete btn btn-danger" style="padding: 0px 10px 0px 10px;" value="'+element.id_posyandu+'">HAPUS</button></td>'
              content+="</tr>";
            }

            content+="</tr>";
            $("#content").html(content);
          }
        });
      }
      getAllData();
      $("#id_imun").change(function() {
        id_imun = $("#id_imun").val();
      });

      $(document).on('click', '.tdelete', function(){
        var yakin = confirm("Apakah anda yakin ingin menghapus data ?");
        if(yakin == true){
          $.ajax({
          type : "POST",
					url : "../api/Posyandu/delete.php",
					data : {func_posyandu : "delete", id_posyandu : $(this).val()},
					cache: false,
					success: function(msg){
						if (msg.message=="posyandu was deleted.") {
              getAllData();
						} else {
							$("#status").html("EROR. . .");
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