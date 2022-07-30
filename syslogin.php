<?php

    include '../connection.php';
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM ref_login
                WHERE username = '$username' 
                AND password = SHA1('$password')";

        $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) != 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                $_SESSION['level'] = $row['level'];
                header('location: home3.html');
            } else if($username != 'username' && $password != 'password') {
                $error = "Username atau password salah";
        }
    }
?>