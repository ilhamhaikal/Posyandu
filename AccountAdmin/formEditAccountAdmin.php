<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../tambahcss.css">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    
</head>
<body style="background-image: url(../img/Menu/bg1.png); background-repeat: repeat-y;">
    <?php
         include "../sidebar.html";
    ?>
    <fieldset>
        <form class="form-horizontal shadow p-3 mb-5 bg-body rounded bg-light">
            <h3>Edit Account</h3><br>

                        <div class="form-group">
                            <label for="username" id="label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>

                        <div class="form-group"> 
                            <label for="current_password" id="label">Current Password</label>
                            <input type="password" class="form-control" id="current_password">
                        </div>
                        <div class="form-group"> 
                            <label for="new_password" id="label">New Password</label>
                            <input type="password" class="form-control" id="new_password">
                        </div>
                        <div class="form-group"> 
                            <label for="confirm_password" id="label">Confrim Password</label>
                            <input type="password" class="form-control" id="confirm_password">
                        </div>
                        <table>
                            <div class="form-group row">
                                  <button onclick="window.location.href='../home3.php'" type="button" class="btn btn-success col-form">KEMBALI</button>
                                  <button type="button" class="btn btn-success col-form" id="tupdate">PERBARUI</button>
                                  <span id="status"></span>
                              </div>
                            </table>
                        </form>
                    </fieldset>
               </table>
                <!-- Nama account :<br> 
                <input type="text" id="nama_account"><p>
                NIK account  :<br> 
                <input type="text" id="nik_account"><p> 
                Tempat Lahir :<br> 
                <input type="text" id="tempat_lahir_anak"><p> 
                Tanggal Lahir : (YYYY/MM/DD)<br> 
                <input type="date" id="tgl_lahir_anak" size="30"><p>
                Usia :<br>
                <input type="text" id="usia_anak"><p>
                Jenis Kelamin :<br>
                <input type="radio" value="L" id="laki" name="jk_anak">Laki - Laki<p>
                <input type="radio" value="P" id="perempuan" name="jk_anak">Perempuan<p>
                <button type="button" id="tupdate">UPDATE</button> 
                    <button onclick="window.location.href='crudAnak.php'" type="button"> KEMBALI </button>
                    <span id="status"></span> -->


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var username;
        var password;
        var current_password;
        var new_password;
        var confirm_password;
        var nama_petugas;
        var data_account;

    $(document).ready(function () {
        $(document).ready(function(){

            //$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");
            // $("#id_petugas").load("http://localhost/Aplikasi_EPosyandu/api/AccountPetugas/read_one.php", "func_account=ambil_option_petugas");

            $.ajax({
                type : "GET",
                url: "http://localhost/Aplikasi_EPosyandu/api/AccountPetugas/read_one.php",
                data: {func_account : "ambil_single_data_admin", id_login: "<?php echo $_SESSION['id_login_admin']?>"},
                cache: false,
                success: function(msg){
                    //karna di server pembatas setiap data adalah |
                    //maka kita split dan akan membentuk array
                    data = msg;

                    username = data['username'];

                    $("#username").val(username);
                }
            });

            // $("#id_petugas").change(function(){
            //     id_petugas = $(this).children("option:selected").val();
            // });

            $("#tupdate").click(function(){
                username = $("#username").val();
                current_password = $("#current_password").val();
                new_password = $("#new_password").val();
                confirm_password = $("#confirm_password").val();

                //data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
                data_account_admin = {
                    "username" : username,
                    "current_password" : current_password,
                    "new_password" : new_password,
                    "confirm_password" : confirm_password
                };  

                
                $("#loading").show();
                $.ajax({
                type : "POST",
                url : "http://localhost/Aplikasi_EPosyandu/api/AccountPetugas/update.php",
                data : {func_account : "update_data_account_admin", data_account_admin : data_account_admin, id_login: "<?php echo $_SESSION['id_login_admin']?>"},
                cache : false,
                success : function(msg){
                    if(msg.message=="account was updated."){
                        alert("Data account berhasil Diperbarui");
                        window.location.href="../home3.php";
                    }else{
                        $("#status").html("ERROR. . . ");
                    }
                    $("#loading").hide();
                }
            });
            });
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>