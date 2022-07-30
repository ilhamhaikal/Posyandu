<?php
session_start();
if (!isset($_SESSION['username_admin'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <html lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/icon/logoremove.png" type="image/x-icon">
  <title>E-Posyandu Melati</title>
  <style type="text/css">
    .bawahnav {
      background-image: url(img/Menu/bg1.png);
      background-attachment: scroll;
      background-size: cover;
      background-origin: inherit;
    }

    #judul {
      font-size: 35px;
      margin: 0px 0px 0px 18px;
      font-family: "futura Md BT";
      color: black;
    }

    #logonav {
      margin-left: 30px;
    }

    .t-inline-block {
      font-size: 50px;
    }

    #box {
      border: none;
    }

    .box {
      padding: 20px;
      margin-bottom: 10px;
    }

    #content {
      position: absolute;
      align-content: center;
    }

    @media screen and (max-height: 640px) {
      #wraper {
        width: 640px;
        position: relative;
      }

      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }

      .card-img-top {
        width: 50px;
      }
    }
  </style>
</head>

<body>
  <div id="wrapper">
    <div id="container">
      <nav class="navbar bg-light">
        <a class="navbar-brand" onclick="window.location.href='home3.php'">
          <img src="img/icon/logoremove.png" width="80px" height="80px" class="align-center" id="logonav">
          <p class="d-inline-block align-middle" id="judul">E-Posyandu Melati</p>
        </a>
        <div class="nav-item dropleft">
          <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/login.png" width="70px"></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="AccountAdmin/formEditAccountAdmin.php">Edit Account</a>
            <a class="dropdown-item" href="Crud_Account/accountPetugas.php">Account User</a>
            <a class="dropdown-item" href="HistoryVaksin/historyVaksin.php">Riwayat Vaksin Anak</a>
            <a class="dropdown-item" href="kritiksaran/crudkritiksaran.php">Kritik dan Saran</a>
            <a class="dropdown-item" href="tentang/tentangposyandu.php">Tentang Posyandu</a>
            <a class="dropdown-item" href="Bantuan/bantuan.php">Bantuan</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
      </nav>
    </div>
    <div id="container align-self-center" class="bawahnav">
      <div class="box">
        <div class="row justify-content-lg-center">
          <div class="col-md-3">
            <a href="Crud_Imunisasi/crudImunisasi.php"><img src="img/Menu/dataimun.png" class="card-img" width="100px" /></a>
          </div>
          <div class="col-md-3">
            <a href="Crud_Vaksin/crudVaksin.php"><img src="img/Menu/datavaksin.png" class="card-img" width="100px" /></a>
          </div>
          <div class="col-md-3">
            <a href="Crud_Anak/crudAnak.php"><img src="img/Menu/dataanak.png" class="card-img" width="100px" /></a>
          </div>
        </div>
        <br>
        <div class="row justify-content-lg-center">
          <div class="col-md-3">
            <a href="Crud_Ibu/crudIbu.php"><img src="img/Menu/dataibu.png" class="card-img" width="100px" /></a>
          </div>
          <div class="col-md-3">
            <a href="Crud_Petugas/crudPetugas.php"><img src="img/Menu/datapetugass.png" class="card-img" width="100px" /></a>
          </div>
          <div class="col-md-3">
            <a href="Crud_Posyandu/crudPosyandu.php"><img src="img/Menu/dataposyanduu.png" class="card-img" width="100px" /></a>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-light text-start">
      <!-- Grid container -->
      <div class="container p-2">
        <!--Grid row-->
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase"><?php
                                        include 'connection.php';
                                        $no = 1;
                                        $data = mysqli_query($conn, "select * from ref_posyandu");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                <tr>
                  <td><?php echo $d['nama_posyandu']; ?><br></td>
                  <td><?php echo $d['alamat_posyandu']; ?></td>
                  <td>Kelurahan <?php echo $d['kel_posyandu']; ?></td>
                  <td>, Kecamatan <?php echo $d['kec_posyandu']; ?>,</td>
                  <td><?php echo $d['kota_kab_posyandu']; ?></td>
                </tr>
              <?php
                                        }
              ?>
            </h5>
            <p>
              E-Posyandu adalah sebuah website yang dirancang sedemikian rupa untuk pendataan data imunisasi yang mempermudah petugas posyandu dalam melakukan pendataan.
            </p>
          </div>
          <span id="muncul"></span>
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <br><br><br><br><br><br>
            <p class="text-dark text">© 2022 Copyright: ___
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var nama_posyandu;
    var alamat_posyandu;
    var kel_posyandu;
    var kec_posyandu;
    var kota_kab_posyandu;
    var posyandu;

    $(document).ready(function() $("#content").ready(function() {
        $.ajax({
            type: "GET",
            url: "../api/Posyandu/read.php",
            data: {
              func_posyandu: "ambil_data_posyandu"
            },
            cache: false, success: function(msg) { data = msg.records; $("#content").val(); });  }); });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>