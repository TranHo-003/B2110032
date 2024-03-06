<!DOCTYPE html>
<html lang="en">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    $id = $_POST["id"];
    $sql = "SELECT st.id as id, st.fullname as fullname, st.email as email, st.Birthday as Birthday, mj.id as idmj,
             mj.name_major as name_major
            FROM student st JOIN major mj ON st.major_id = mj.id
            WHERE st.id = '".$id."'";

    $majors = "SELECT id as id_nganh , name_major FROM major";
    $result_mj = $conn->query($majors);

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<body>
    <?php print_r($row) ?>
    <form action="sua.php" method="post">
        ID: <input type="text" name="id" value="<?php echo $row['id']; ?>"> <br>
        Name: <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"> <br>
        E-mail: <input type="text" name="email" value="<?php echo $row['email']; ?>"> <br>
        Birthday: <input type="date" name="birth" value="<?php echo $row['Birthday']; ?>"> <br>
        Tên ngành: <select name='manganh' id='mn'>
                    <?php
                            while($row_mj = $result_mj->fetch_assoc()){
                                echo "<option value='".$row_mj['id_nganh']."'>".$row_mj['name_major']."</option>";
                            
                            }
                        ;
                    ?>
                  </select><br>
        <!-- Tên ngành: <input type="text" name="tennganh" value="<?php echo $row['name_major']; ?>"> <br> -->
        <input type="submit">
    </form>

  
</body>
</html>
