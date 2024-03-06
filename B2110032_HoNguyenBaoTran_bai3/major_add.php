<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername,$username,$pass,$dbname);
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    $sql = "INSERT INTO major VALUES
                            ('7480104','Hệ Thống Thông Tin'),
                            ('7480201','Công Nghệ Thông Tin'),
                            ('7340115', 'Marketing')
                            ";
    if($conn->query($sql) === TRUE){
        echo "Thêm dữ liệu thành công";
    }else{
        echo ("Lỗi: " .$conn->error);
    }
    $conn->close();
?>