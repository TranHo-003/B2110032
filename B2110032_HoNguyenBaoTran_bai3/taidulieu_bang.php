<?php
    $seververname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    //create connection
    $conn = new mysqli($seververname,$username,$password,$dbname);
    //check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    // tao chuoi luu cau lenh sql
    $sql = "SELECT * FROM Student";
    //thuc thi cau lenh sql va dua doi tuong vao $result
    $result  = $conn->query($sql);

    if($result->num_rows>0){
        //cach 1: show du lieu nhu bien
        //show gia tri trong mang
        print_r($result);
        echo '<br>';
        echo '<br>';

        //Cach 2: show theo tung dong voi for
        while($row = $result->fetch_assoc()){
            echo "id: " .$row["id"]. " - Ho Ten: " .$row["fullname"]. "- Email" .$row["email"]. 
                    ' - Ngay sinh: ' .$row["Birthday"] . '<br>';
        }
        echo '<br>';
        echo '<br>';
        //xoa ket qua cu tu o tren
        $result->free_result();

        //Cach 3: trinh bay voi bang html
        //load du lieu moi len dua vao bien result

        $result = $conn->query($sql);
        $result_all = $result->fetch_all();
        print_r($result_all);
        // trinh bay du lieu trong 1 bang html
        //tieu de bang
        echo "<table border=1> 
                            <tr>
                                <th>ID</th>
                                <th>Ho Ten</th>
                                <th>email</th>
                                <th>Ngay sinh</th>
                            </tr>
        ";
        // output data of each row
        foreach($result_all as $row ){
            //dinh dang de hien thi ngay thang theo dd-mm-yyyy
            $date = date_create($row[3]);
            echo "<tr>
                    <td>" .$row[0]. "</td>
                    <td>" .$row[1]. "</td>
                    <td>" .$row[2]. "</td>
                    <td>" .$date->format('d-m-Y') . "</td>
                <tr>";
        }
        echo "</table>";

                $result->free_result();

        // cách 4 fetch_row
        echo "<br>Sử dụng fetch_row()<br>";
        $result = $conn->query($sql);
        while($value = $result->fetch_row()){
            echo "id: " .$value[0]. " - Ho Ten: " .$value[1]. "- Email: " .$value[2]. 
            ' - Ngay sinh: ' .$value[3] . '<br>';
        }
       
        // cách 5 fetch_array
        echo "<br>Sử dụng fetch_array()<br>";
        $result = $conn->query($sql);
        while($value = $result->fetch_array()){
            echo "id: " .$value["id"]. " - Ho Ten: " .$value["fullname"]. "- Email: " .$value["email"]. 
            ' - Ngay sinh: ' .$value["Birthday"] . '<br>';
        }

         // cách 6 fetch_object
         echo "<br>Sử dụng fetch_object()<br>";
         $result = $conn->query($sql);
         while($value = $result->fetch_object()){
             echo "id: " .$value->id. " - Ho Ten: " .$value->fullname. "- Email: " .$value->email. 
             ' - Ngay sinh: ' .$value->Birthday. '<br>';
         }

    }else{
        echo "0 ket qua tra ve";
    }
    $conn->close();
?>