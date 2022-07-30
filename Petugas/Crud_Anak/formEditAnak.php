<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: index.php");
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
            <h3>Edit Data Anak</h3><br>
                        <div class="form-group">
                            <label for="nama_anak" id="label">Nama Anak</label>
                            <input type="text" class="form-control" id="nama_anak">
                        </div>

                        <div class="form-group">
                            <label for="nik_anak" id="label">NIK Anak</label>
                            <input type="text" class="form-control" id="nik_anak">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tempat_lahir_anak" id="label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir_anak">
                            </div>

                            <div class="form-group col-md-7">
                                <label for="tgl_lahir_anak" id="label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_anak">
                            </div>
                        </div>

                        <div class="form-group"> 
                            <label for="usia_anak" id="label">Usia Anak</label>
                            <input type="text" class="form-control" id="usia_anak">
                        </div>
                        <div class="row">
                            <label class="col-form-label col-sm-4 " id="label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" value="L" id="laki" name="jk_anak">
                                  <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="P" id="perempuan" name="jk_anak">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <label for="id_ibu" id="label">Nama Ibu</label>
                            <select class="form-control" id="id_ibu"></select>
                        </div>
                        <table>
                            <div class="form-group row">
                                  <button onclick="window.location.href='crudAnak.php'" type="button" class="btn btn-success col-form">KEMBALI</button>
                                  <button type="button" class="btn btn-success col-form" id="tupdate">PERBARUI</button>
                                  <span id="status"></span>
                              </div>
                            </table>
                        </form>
                    </fieldset>
               </table>
                <!-- Nama Anak :<br> 
                <input type="text" id="nama_anak"><p>
                NIK Anak  :<br> 
                <input type="text" id="nik_anak"><p> 
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
        var nik_anak;
        var nama_anak;
        var tempat_lahir_anak;
        var tgl_lahir_anak;
        var usia_anak;
        var jk_anak;
        var id_ibu;
        var data_anak;

    $(document).ready(function () {
        $(document).ready(function(){

            //$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");
            $("#id_ibu").load("../../api/Anak/read_one.php", "func_anak=ambil_option_ibu");

            $.ajax({
                    type : "GET",
                    url: "../../api/Anak/read_one.php",
                    data: {func_anak : "ambil_single_data", id_anak: "<?php echo $_GET['id_anak']?>"},
                    cache: false,
                    success: function(msg){
                        //karna di server pembatas setiap data adalah |
                        //maka kita split dan akan membentuk array
                        data = msg;
                        nama_anak = data['nama_anak'];
                        nik_anak = data['nik_anak'];
                        tempat_lahir_anak = data['tempat_lahir_anak'];
                        tgl_lahir_anak = data['tgl_lahir_anak'];
                        usia_anak = data['usia_anak'];
                        jk_anak = data['jk_anak'];
                        id_ibu = data['id_ibu'];

                        //masukan ke masing - masing textfield
                        $("#nik_anak").val(nik_anak);
                        $("#nama_anak").val(nama_anak);
                        $("#tempat_lahir_anak").val(tempat_lahir_anak);
                        $("#tgl_lahir_anak").val(tgl_lahir_anak);
                        $("#usia_anak").val(usia_anak);
                        if (jk_anak == 'L'){
                            $("#laki").prop("checked", true);
                            $("#perempuan").prop("checked", false);
                        } else {
                            $("#perempuan").prop("checked", true);
                            $("#laki").prop("checked", false);
                        }
                        $("#id_ibu").val(id_ibu);
                    }
            });

            $("#id_ibu").change(function(){
                    id_ibu = $(this).children("option:selected").val();
                });

            $("#tupdate").click(function(){
                nik_anak = $("#nik_anak").val();
                nama_anak = $("#nama_anak").val();
                tempat_lahir_anak = $("#tempat_lahir_anak").val();
                tgl_lahir_anak = $("#tgl_lahir_anak").val();
                usia_anak = $("#usia_anak").val();
                jk_anak = $("#jk_anak").val();

                //data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
                data_anak = {
                    "nik_anak" : nik_anak,
                    "nama_anak" : nama_anak,
                    "tempat_lahir_anak" : tempat_lahir_anak,
                    "tgl_lahir_anak" : tgl_lahir_anak,
                    "usia_anak" : usia_anak,
                    "jk_anak" : document.getElementById('laki').checked ? 'L':'P',
                    "id_ibu" : id_ibu
                };  

                
                $("#loading").show();
                $.ajax({
                type : "POST",
                url : "../../api/Anak/update.php",
                data : {func_anak : "update_data_anak", data_anak : data_anak, id_anak : "<?php echo $_GET['id_anak']?>"},
                cache : false,
                success : function(msg){
                    if(msg.message=="anak was updated."){
                        alert("Data Anak berhasil Diperbarui");
                        window.location.href="crudAnak.php";
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