<?php
    $seververname = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($seververname,$username,$password);
    // Check connection
    if($conn->connect_error){
        //hien thi loi neu ket noi khong duoc
        die("Conection failed: " .$conn->connect_error);
    }
    //neu ket noi thanh cong
    echo "Connected successfully";

    $conn->options()
   
?>