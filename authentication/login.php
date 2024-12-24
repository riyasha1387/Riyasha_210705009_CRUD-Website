<?php
include "../koneksi.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query untuk mencari user berdasarkan usernmae
    $sql =" SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("s", $username);
    $stmt-> execute();
    $result = $stmt->get_result();

    if ($result -> num_rows > 0) {
        $user = $result -> fetch_assoc();

        //bandigkan password dengan username
        if ($password == $user ['password']){
                $_SESSION['username'] = $username;
                echo "Berhasil Login";
                exit;
        }else{
                echo"password salah";
        }
    }else{
        echo "username tidak terdaftar";

    }
    
    $stmt->close();
    }
    $conn->close();
?>