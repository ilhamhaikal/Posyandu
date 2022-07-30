<?php
  session_start();
  if(!isset($_SESSION['username_petugas'])){
    header("location: http://localhost/Aplikasi_EPosyandu/index.php");
  }
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bantuan.css">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    <title>Bantuan</title>
  </head>
  <body>
    <?php
        include "../sidebar.html";
    ?>
    <div class="content page-scroll" style="margin-left: 340px; margin-top: 10px; margin-right: 50px; width: 60%;">
            <div id="v" style="height: 150px;">
            </div>
        <section id="about-me" class="py-5" style="background-color: #fdfdfd;">
            <div id="atas" style="height: 0px;">
            </div>
            <div class="container">
                <center><h1 id="bantuan">Bantuan</h1></center>
                <hr style="border-bottom: 3px solid #0f7af9; max-width: 100px; display: block;"><br>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7">
                        <blockquote>
                            <p>
                                BANTUAN ini memberikan jawaban atas pertanyaan dasar tentang E-POSYANDU. Lihat Bantuan Lanjutan kami untuk informasi teknis lebih lanjut.
                            </p>
                            <h4>
                                Bantuan Dasar:
                            </h4>
                            <ol>
                                <a href="#t01"><li> Apa Itu E-POSYANDU Melati?</li></a>
                                <a href="#t03"><li>Apa Kelebihan E-POSYANDU dibandingkan pendataan manual</li></a>
                                <a href="#t05"><li>Apakah E-POSYANDU Kompatible dengan smartphone saya?</li></a>
                            </ol>
                            <h4>
                                Bantuan Lanjutan:
                            </h4>
                            <ol>
                                <a href="#t07"><li>Bagaimana cara melihat data?</li></a>
                                <a href="#t09"><li>Bagaimana cara menambah data?</li></a>
                                <a href="#t11"><li>Bagaimana cara mengedit data?</li></a>
                                <a href="#t13"><li>Bagaimana cara menghapus data?</li></a>
                                <a href="#t15"><li>Bagaimana jika kita ingin melihat data lain?</li></a>
                            </ol><hr style="height: 2px; background-color: black;">

                            <div id="t01" style="height: 300px;"></div>

                            <div>
                                <h4 id="t02">Apa Itu E-POSYANDU?</h4>
                                <p>E-Posyandu adalah aplikasi berbasis web yang bermanfaat sebagai perantara untuk melakukan pendataan secara praktis. </p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t03" style="height: 300px;"></div>

                            <div id="t04">
                                <h4>Apa Kelebihan E-POSYANDU dibandingkan pendataan manual</h4>
                                <p>Kelebihannya untuk memudahkan proses pendataan posyandu sehingga menjadi lebih cepat dan mudah.</p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t05" style="height: 300px;"></div>

                            <div id="t06">
                                <h4>Apakah E-POSYANDU Kompatible dengan smartphone saya?</h4>
                                <p>Tidak, untuk saat ini website E-Posyandu hanya tersedia untuk pengguna laptop atau pc saja dikarenakan website masih dalam tahap perkembangan. </p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t07" style="height: 300px;"></div>

                            <div id="t08">
                                <h4>Bagaimana cara melihat data?</h4>
                                <p>Caranya adalah dengan meng-klik icon atau gambar yang tertera pada dashboard atau halaman utama. </p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t09" style="height: 300px;"></div> 

                            <div id="t10">
                                <h4>Bagaimana cara menambah data?</h4>
                                <p>Caranya adalah dengan meng-klik icon atau gambar yang tertera pada dashboard atau halaman utama. Lalu, setelah muncul tampilan tabel klik button atau tombol "Tambah Data....". </p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t11" style="height: 300px;"></div>

                            <div id="t12">
                                <h4>Bagaimana cara mengedit data?</h4>
                                <p>Caranya adalah dengan meng-klik icon atau gambar yang tertera pada dashboard atau halaman utama. Lalu,setelah muncul tampilan tabel klik button atau tombol "EDIT" pada kolom aksi. </p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t13" style="height: 300px;"></div>

                             <div id="t14">
                                <h4>Bagaimana cara menghapus data?</h4>
                                <p>Caranya adalah dengan meng-klik icon atau gambar yang tertera pada dashboard atau halaman utama. Lalu,setelah muncul tampilan tabel klik button atau tombol "DELETE" pada kolom aksi.</p>
                            </div><hr style="height: 2px; background-color: black;">
                             <div id="t15" style="height: 300px;"></div>

                            <div id="t16">
                                <h4>Bagaimana jika kita ingin melihat data lain?</h4>
                                <p>Caranya adalah dengan meng-klik icon atau gambar yang tertera pada dashboard atau halaman utama. Lalu, setelah muncul tampilan tabel yang di klik tadi anda dapat memlilih tabel data pada sidebar atau tampilan pada samping halaman.</p>
                            </div><hr style="height: 2px; background-color: black;">
                            <div id="t17" style="height: 300px;"></div> 


                        </blockquote>
                        
                    </div>
                </div>
            </div>
        </section>
        <div id="atas" style="height: 100px;">
                            </div>
        <div>
            <a href="#v"><button type="button" class="btn shadow-lg p-2 bg-primary" style="cursor: pointer; position:fixed; left:90%; bottom: 20px; background-color: #0066ff; width: 40px; height: 40px; border-radius: 100%; text-align: center; color: white; margin-top: ;">/\</button></a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
  </body>
</html>