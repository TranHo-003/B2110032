<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername,$username,$pass,$dbname);

    if($conn->connect_error){
        die("Connection falied: ".$conn->connect_error);
    }
    $sql = "SELECT * FROM major";
    $result = $conn->query($sql);
?>
<h1>Bảng dữ liệu các ngành</h1>
<table border="1">
    <tr>
        <th>Mã ngành</th>
        <th>Tên ngành</th>
        <th colspan="2">Hành động</th>
    </tr>
    <?php
        while($kq = $result->fetch_assoc()){
            echo "<tr>
                    <td>" .$kq['id']. "</td>
                    <td>" .$kq['name_major']. "</td>
                    <td>" 
    ?>
                        <form action="major_edit.php" method="post">
                            <input type="submit" value="Sửa">
                            <input type="hidden" value="<?php echo $kq['id'];?>" name="id">
                        </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                        <form action="major_xoa.php" method="post">
                            <input type="submit" value="Xóa">
                            <input type="hidden" value="<?php echo $kq['id'];?>" name="id">
                        </form>
                    <?php 
                    echo "</td>
                </tr>";
        }
echo "<table>";

                    ?>  
