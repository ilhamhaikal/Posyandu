<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/icon/logoremove.png" type="image/x-icon">

    <style type="text/css">
      body{
        height: 100%;
      }
      #judul{
        font-size: 35px;
        margin: 0px 0px 0px 20px;
        font-family: Futura Md BT;
        color: black;
      }
      #logonav{
        margin: 0px 0px 0px 30px;

      }
      .navbar{
        list-style: none;
        height: auto;
        width: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black; 
        overflow-y: visible;
      }
      .sidenav {
        list-style: none;
        height: 100%;
        width: 190px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black; 
        overflow-x: hidden;
        padding-top: 20px;
        margin-top: 100px;
      }

      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 17px;
        color: black;
        display: block;
      }

      .sidenav a:hover {
        color: #0071BD;
      }

      .sidenav a{
        color: black;
        text-decoration: none;
        display: block;
      }

      .sidenav li {
        list-style: none;
        color: black;
      }
      .sidenav li a:hover{
        color: blue;
      }
      #content1{
        margin-right: 50px;
      }
      #sidenav{
          height: 100%;
          width: 160px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          padding-top: 20px;
        }   
     </style>
</head>
<body>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/icon/logoremove.png" type="image/x-icon">

	   <title>Tampilan Data</title>
     <style type="text/css">
      body{
        height: 100%;
      }
      #judul{
        font-size: 35px;
        margin: 0px 0px 0px 20px;
        font-family: Futura Md BT;
        color: black;
      }
      #logonav{
        margin: 0px 0px 0px 30px;

      }
      .navbar{
        list-style: none;
        height: auto;
        width: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black; 
        overflow-y: visible;
      }
      .sidenav {
        list-style: none;
        height: 100%;
        width: 190px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black; 
        overflow-x: hidden;
        padding-top: 20px;
        margin-top: 100px;
      }

      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 17px;
        color: black;
        display: block;
      }

      .sidenav a:hover {
        color: #0071BD;
      }

      .sidenav a{
        color: black;
        text-decoration: none;
        display: block;
      }

      .sidenav li {
        list-style: none;
        color: black;
      }
      .sidenav li a:hover{
        color: blue;
      }
      #content1{
        margin-right: 50px;
      }
      #sidenav{
          height: 100%;
          width: 160px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          padding-top: 20px;
        }   
     </style>
</head>
<body>
  <div id="container" >
    <nav class="navbar bg-light">
      <a class="navbar-brand">
        <img src="img/Menu/logoremove.png" width="80px" height="80px" class="align-center" id="logonav" onclick= "window.location.href ='home3.php'">
        <p class="d-inline-block align-middle" id="judul">E-Posyandu </p>
      </a> 
      <div class="nav-item dropleft">
        <a class="nav-link " href=".dropdown-menu" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/login.png" width="70px"></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profil/profile.php">Profil</a>
          <a class="dropdown-item" href="#">Bantuan</a>
          <a class="dropdown-item" href="bantuan/formbantuan.php">Kritik dan Saran</a>
          <a class="dropdown-item" href="tentang/tentangposyandu.php">Tentang Posyandu</a>
          <a class="dropdown-item" href="accountPetugas.php">Account Petugas</a>
          <!-- <a class="dropdown-item" href="../tentang/tentangeposyandu.php">Tentang E-Posyandu</a> -->
          <a class="dropdown-item" onclick= "window.location.href ='../logout.php'">Logout</a>
        </div>
      </div>
    </nav>
  	<div class="sidenav bg-light" id="sidebar">
 
         <a href="home3.php">Menu Utama</a>
           <ul>
            <li><a href="Crud_Imunisasi/crudImunisasi.php">Data Imunisasi</a></li>
            <li><a href="Crud_Vaksin/crudVaksin.php">Data Vaksin</a></li>
            <li><a href="Crud_Anak/crudAnak.php">Data Anak</a></li>
            <li><a href="Crud_Ibu/crudIbu.php">Data Ibu</a></li>
            <li><a href="Crud_Petugas/crudpetugas.php">Data Petugas</a></li>
            <li><a href="Crud_Posyandu/crudposyandu.php">Data Posyandu</a></li>
            </ul>
          <a href="tentang/tentangposyandu.php">Tentang Posyandu</a>
          <!-- <a href="../tentang/tentangeposyandu.php">Tentang E-Posyandu</a> -->
    </div>


  </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>