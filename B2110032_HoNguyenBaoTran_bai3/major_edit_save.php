<?php
     $servername = "localhost";
     $username = "root";
     $pass = "";
     $dbname = "qlsv";
 
     $conn = new mysqli($servername,$username,$pass,$dbname);
 
     if($conn->connect_error){
         die("Connection falied: ".$conn->connect_error);
     }
     $id = $_POST['id'];
     $sql = "UPDATE major 
             SET id = '".$_POST['id']."', name_major ='".$_POST['tennganh']."'
            ";
    $sql = $sql . "WHERE id = '".$id."'";
     if($conn->query($sql) === TRUE){
        header("Location: major_index.php");
     }else{
        echo "Error: " .$sql . "<br>" .$conn->error;
     }
     $conn->close();
?>