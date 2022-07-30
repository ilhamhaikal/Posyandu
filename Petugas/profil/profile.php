<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: index.php");
  }
?>
<html>
    <head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../tambahcss.css">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
	<title>Profil</title>
	
</head>
<body style="background-image: url(../img/Menu/bggg.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Data Profil</h3><br>
            <div class="form-group">
                <label for="nama_petugas" id="label">Nama </label>
                <input class="form-control" type="text" aria-label="readonly input example" id="nama_petugas" readonly>
            </div>

            <!-- <div class="form-group">
                <label for="jabatan_petugas" id="label">Jabatan Petugas</label>
                <input class="form-control" type="text" aria-label="readonly input example" id="jabatan_petugas" readonly>
            </div> -->

            <div class="form-group">
                <label for="jk_petugas" id="label">Jenis Kelamin</label>
                <input class="form-control" type="text" aria-label="readonly input example" id="jk_petugas" readonly>
            </div>
           

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="tempat_lahir_petugas" id="label">Tempat Lahir</label>
                   <input class="form-control" type="text" aria-label="readonly input example" id="tempat_lahir_petugas" readonly>
                </div>

                <div class="form-group col-md-7">
                    <label for="tgl_lahir_petugas" id="label">Tanggal Lahir</label>
                    <input class="form-control" type="date" aria-label="readonly input example" id="tgl_lahir_petugas" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat_petugas" id="label">Alamat</label>
               <input class="form-control" type="text" aria-label="readonly input example" id="alamat_petugas" readonly>
            </div>

            <div class="form-group">
                <label for="no_telp_petugas" id="label">No Telepon</label>
                <input class="form-control" type="text" aria-label="readonly input example" id="no_telp_petugas" readonly>
            </div>

            <!-- <div class="form-group">
                <label for="status_petugas" id="label">Status Petugas</label>
                <input class="form-control" type="text" aria-label="readonly input example" id="status_petugas" readonly>
            </div> -->
	
        <div class="form-group row">
        
        <button onclick="window.location.href='../home3.php'" type="button" class="btn btn-success col-form"> KEMBALI </button>
        <button onclick="window.location.href='../Crud_Account/formEditAccount.php'" type="button" class="btn btn-success col-form"> EDIT ACCOUNT </button>
        <span id="status"></span>
    </div>
</form></fieldset>


    <script type="text/javascript">
        var nama_petugas;
       // var jabatan_petugas;
        var jk_petugas;
        var tempat_lahir_petugas;
        var tgl_lahir_petugas;
        var alamat_petugas;
        var no_telp_petugas;
        //var status_petugas;
        
        $(document).ready(function(){
            $.ajax({
                    type : "GET",
                    url: "http://localhost/Aplikasi_EPosyandu/api/Petugas/read_one.php",
                    data: {func_petugas : "ambil_login_profile"},
                    cache: false,
                    success: function(msg){
                        //karna di server pembatas setiap data adalah |
                        //maka kita split dan akan membentuk array
                        data = msg;
                        nama_petugas = data['nama_petugas'];
                        jabatan_petugas = data['jabatan_petugas'];
                       // 
                        jk_petugas = data['jk_anak'] == "L" ? "Laki-laki" : "Perempuan";

                        tempat_lahir_petugas = data['tempat_lahir_petugas'];
                        tgl_lahir_petugas = data['tgl_lahir_petugas'];
                        alamat_petugas = data['alamat_petugas'];
                        no_telp_petugas = data['no_telp_petugas'];
                       // status_petugas = data['status_petugas'];

                        //masukan ke masing - masing textfield
                        $("#nama_petugas").val(nama_petugas);
                       // $("#jabatan_petugas").val(jabatan_petugas);
                        $("#jk_petugas").val(jk_petugas);
                        $("#tempat_lahir_petugas").val(tempat_lahir_petugas);
                        $("#tgl_lahir_petugas").val(tgl_lahir_petugas);
                        $("#alamat_petugas").val(alamat_petugas);
                        $("#no_telp_petugas").val(no_telp_petugas);
                       // $("#status_petugas").val(status_petugas);
                    
                    }
            });
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


</body>
</html>