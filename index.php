<DOCTYPE! html>
  <html lang="en">

  <head>
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Login</title>
    <style type="text/css">
      body {
        background: url(img/Menu/bggg2.png);
        background-repeat: repeat-y;
        background-size: 100%;
        overflow-y: hidden;

      }

      #container {
        overflow: hidden;
      }

      #Login {
        float: left;
        margin-top: 5px;
      }

      #Mamah {
        padding-left: 700px;
        padding-top: 180px;
      }

      .form1 {
        margin: -415px 205px;
      }

      @media screen and (max-width: 720px) {
        #Mamah {
          display: none;
        }
      }
    </style>
  </head>

  <body>
    <div id="wrapper">
      <div id="container">
        <div id="Login">
          <img src="img/Login/Kotak Login-01.png" style="width: 600px; margin-left: 45px; margin-bottom: 80px;" />
          <div class="form1">
            <form class="form-horizontal" name="formlogin" onsubmit="return validation()">
              <table class="username">
                <tr>
                  <td><input type="text" name="username" id="username" placeholder="username" class="" style="height: 42px; width: 130%; margin-left: 20px; margin-top: 3px; border: none;"></td>
                </tr>

              </table>

              <table class="password">
                <tr>
                  <td><input type="password" name="password" id="password" placeholder="password" style="height: 42px; width: 130%; margin-left: 20px; margin-top: 16px; border: none;"></td>
                </tr>
              </table>

              <table class="button">
                <tr>
                  <td colspan="3"><button type="button" id="tombollogin" style="width: 100px; height: 30px; margin-top: 17px; margin-left: 100px; background-color: #0066ff; border-radius: 5px; border-color: #0066ff; color: white;">Login</button></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <div id="Mamah">
          <img src="img/Login/Mamah_.png" style="width: 600px; margin: -150px 45px 0px -80px;">
        </div>

      </div>
    </div>
    <!-- <footer class="bg-light text-start">
        <div id="box">
            style="width: 1350px; height:120px; border-radius: 10px;"
           Grid container 
        <div class="container p-2">
            Grid row
        <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <center><h5 class="text-uppercase">POSYANDU RW.10 KELURAHAN PELINDUNG HEWAN</h5></center>
                <p style="margin-left: 60px">
                  Pos Pelayanan Keluarga Berencana - Kesehatan Terpadu adalah kegiatan kesehatan dasar yang diselenggarakan dari, oleh dan untuk masyarakat yang dibantu oleh petugas kesehatan. Posyandu merupakan salah satu upaya kesehatan bersumberdaya masyarakat.
                </p>
        </div>
        <center><div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">Naon team, PT. Tristek edia Kreasindo</a>
        </div></center>
        </div>
        </div>
      </footer> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var username;
      var password;
      var data_login;

      $(document).ready(function() {
        $("#tombollogin").click(function() {
          username = $("#username").val();
          password = $("#password").val();

          data_login = {
            "username": username,
            "password": password
          };

          $.ajax({
            type: "POST",
            url: "api/Login/syslogin.php",
            data: {
              data_login: data_login
            },
            cache: false,
            success: function(msg) {
              if (msg.message == "admin berhasil login") {
                window.location.href = "home3.php";
              } else if (msg.message == "petugas berhasil login") {
                window.location.href = "Petugas/home3.php";
              } else {
                alert("username dan password tidak sesuai");
              }
            }

          });
        });
      });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </script>
  </body>

  </html>