<!DOCTYPE html>
<html lang="en">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connect failed: " .$conn->connect_error);
    }
    $id = $_POST['id'];
    $sql = "SELECT * FROM major where id = '".$id."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<body>
    <form action="major_edit_save.php" method="post">
        ID: <input type="text" value="<?php echo $row['id']?>" name="id"><br>
        Tên ngành: <input type="text" value="<?php echo $row['name_major']?>" name="tennganh"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>