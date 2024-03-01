<?php
    $target_dir = 'uploads/';
    $target_file = $target_dir .basename($_FILES['file']['name']);
    $uploadok = 1;
    $fileType = strtotime(pathinfo($target_file, PATHINFO_EXTENSION));

    $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(isset($_POST["submit"])){
        if(in_array($_FILES["file"]["type"],$mimes)){
            $uploadok = 1;
        }else{
            $uploadok = 0;
        }
    
    }

    if($uploadok == 0){
        echo "Khong the upload duoc file";
    }else{
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
            echo "File " .htmlspecialchars(basename($_FILES["file"]["name"])). "da duoc upload";
            echo "<br>";
            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "qlbanhang";

            $conn = new mysqli($servername,$username,$pass,$dbname);
            if($conn->connect_error){
                die("Ket noi that bai");
            }

            $csv = array();
            $name_csv = $_FILES["file"]["name"];
            $lines = file($name_csv,FILE_IGNORE_NEW_LINES);
            //dua du lieu tu file csv vao mang:
            foreach ($lines as $key => $value)
            {
                 $csv[$key] = str_getcsv($value); 
            }

            foreach($csv as $gt){
                $sql = "INSERT INTO customers 
                    VALUES( '".$gt[0]."',  '".$gt[1]."','".$gt[2]."', '".DateTime::createFromFormat('d/m/Y',$gt[3])->format('Y-m-d')."',
                     '".DateTime::createFromFormat('d/m/Y',$gt[4])->format('Y-m-d')."' , '".md5($gt[5])."',  '".$gt[6]."') ";
                $conn->query($sql);
            }
           ;
            //in mang
            echo '<pre>';
            print_r($csv);
            echo '</pre>';
        }
    }
?>