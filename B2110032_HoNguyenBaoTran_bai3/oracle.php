<?php
    $hostname = 'localhost'; 
    $port = '1521'; 
    $servicename = 'orcl'; 
    $username = 'sys'; 
    $password = '1234'; 
    // Tạo chuỗi kết nối
    $conn_str = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $hostname)
                (PORT = $port))(CONNECT_DATA = (SERVICE_NAME = $servicename)))";

    // Kết nối đến Oracle với quyền SYSDBA
    $conn = oci_connect($username, $password, $conn_str, 'AL32UTF8', OCI_SYSDBA);

    // Kiểm tra kết nối với quyền SYSDBA
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    } else {
        echo "Kết nối thành công với quyền SYSDBA! <br>";

        // Thực hiện truy vấn SELECT
        // Truy vấn bảng Students từ schema Test1
        $query = "SELECT * FROM Test1.Students"; 

        // Thực hiện truy vấn
        $result = oci_parse($conn, $query);
        oci_execute($result);

        // Lặp qua kết quả và hiển thị thông tin
        while ($row = oci_fetch_assoc($result)) {
            print_r($row);
            echo '<br>';
        }
        // Đóng kết nối
        oci_close($conn);
    }
?>
