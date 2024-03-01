<?php
    session_start();
    $severname = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "qlbanhang";

    $conn = new mysqli($severname,$username,$pass,$dbname);
    if($conn->connect_error){
        die("Ket noi that bai: " .$conn->error);
    }

    $sql = "SELECT id, fullname, email,password FROM customers 
            WHERE email = '".$_POST["email"]."' AND password = '".md5($_POST["pass"])."' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
         $row = $result->fetch_assoc();
        // $cookie_name = "user";
        // $cookie_value = $row["email"];

        // setcookie($cookie_name,$cookie_value,time() + (86400/24), "/");
        // setcookie("fullname",$row["fullname"],time() + (86400/24),"/");
        // setcookie("id",$row["id"], time() + (86400/24),"/");
        // header('Location: homepage.php');

        $_SESSION["name"] = "user";
        $_SESSION["value"] = $row["email"];
        $_SESSION["fullname"] = $row["fullname"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        header('Location: homepage.php');

    }else{
        echo "Error: " .$sql . "<br>" .$conn->error;
        header('Refresh: 3,url=login.php');
    }
    $conn->close();

?>