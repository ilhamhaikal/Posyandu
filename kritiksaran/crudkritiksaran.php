<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    <title>KRITIK DAN SARAN</title>
    <style type="text/css">
      body{
        font-family: "Futura Md BT";
        background-image: url(../img/Menu/bggg.png);
        background-size: cover;
        background-repeat: repeat-y;
      }
      #button{
        color: white;
      }
    </style>

</head>
<body>
  <?php
   include "../sidebar.html"; 
  ?>
  <div id="content1" style="margin-left: 230px; margin-top: 130px;">
    <h1>Kritik dan Saran</h1>
    <!-- <table id="ttable"border="1" >
      <button onclick="window.location.href='form_tambah_vaksin.php'">Tambah Data Vaksin</button> -->
      <table id="ttable" border="0" class="table table-hover table-light table-striped">
        <thead class="bg-dark">
            <tr class="text-white">
                <th width="10%">id_kritik</th>
                <th width="40%">Nama</th>
                <th width="40%">Email</th>
                <th width="40%">Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="content">
        </tbody>
      </table>
      <br>
      <div id="contentPagination"></div>
      <br>
      <button type="button" onclick="window.location.href='../home3.php'" class="btn shadow-lg p-2 bg-success rounded" id="buttonn" style="color: white;">Kembali</button><br><br>
      <span id="status"></span>
      <div class="modal fade" id="contohModalScroll" tabindex="-1" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contohModalScrollableTitle">Kritik dan Saran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class='modal-body'> 
        <p id='pesan'></p>
      </div>
    </div>
  </div>
      
      
   </div><!-- 
  <button type="button" onclick="window.location.href='../home.html'">BACK TO DASHBOARD</button> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_kritik;
    var nama;
    var email;
    var saran;
    var jumlahHalaman;
    var halamanAktif;
    $(document).ready(function() {
      $("#ttable").val();
    });


	  function getAllData(){
      $.ajax({
		  type : "GET",	
          url : "../api/KritikSaran/read.php",
          data : {page : "<?php $page = isset($_GET['page']) ? $_GET['page'] : 1; echo $page ?>"},
          cache : false,
          success : function(msg){
          data = msg.records;
          jumlahHalaman = msg['jumlahHalaman'];
          halamanAktif = parseInt(msg['halamanAktif']);
          console.log(data);
          console.log(jumlahHalaman);
          console.log(halamanAktif);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td class='text-center'>"+element.id_kritiksaran+"</td>"+
              "<td>"+element.nama_kritiksaran+"</td>" +
              "<td>"+element.email_kritiksaran+"</td>"+
              "<td>"+element.tanggal+"</td>"+
              '<td><button value="' + element.id_kritiksaran+'" id="row_clicked" type="button" class="btn btn-primary" data-toggle="modal" data-target="#contohModalScroll">VIEW</button></td>' 
              
            //   '<td><button class="tdelete btn btn-danger" style="padding: 0px 10px 0px 10px;" value="'+element.id_vaksin+'"  >DELETE</button></td>'
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
            $(".btn").click(function(){

              $.ajax({
                type : "GET",
                url: "../api/KritikSaran/ambil_kritik.php",
                data : {id_kritik : $(this).val()},
                cache : false,
                success : function(msg){
                  data = msg;
                  saran = data['pesan_kritik'];

                  $("#pesan").html(saran);
                }
              });

            });
          }
        });
      }
      getAllData();


    //   $(document).on('click', '.tdelete', function(){
    //     var yakin = confirm("Apakah anda yakin ingin menghapus data ? ");
    //     if(yakin == true){
    //       $.ajax({
    //       type : "POST",
	// 				url : "http://localhost/Aplikasi_EPosyandu/api/Vaksin/delete.php",
	// 				data : {func_vaksin : "delete", id_vaksin : $(this).val()},
	// 				cache: false,
	// 				success: function(msg){
	// 					if (msg.message=="vaksin was deleted.") {
    //           getAllData();
	// 					} else {
	// 						$("#status").html("EROR. . .");
	// 					}
	// 					$("#loading").hide();
	// 				}
	// 			});
    //     }
    //     else{
    //       alert("data tidak jadi dihapus");
    //     }
			
			// });


  </script>

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>