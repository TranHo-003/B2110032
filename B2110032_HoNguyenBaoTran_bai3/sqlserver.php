<?php
$serverName = "MSI\SQLEXPRESS";
$connectionOptions = array("Database" => "QL_BANHANG");

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Kết nối thành công <br>";  // Hiển thị thông báo kết nối thành công

    // truy vấn dữ liệu
    $sql = "SELECT * FROM Ban";
    $result = sqlsrv_query($conn, $sql);

    if ($result === false) {
        // Xử lý lỗi nếu truy vấn không thành công
        die(print_r(sqlsrv_errors(), true));
    }
    // Lặp qua kết quả và hiển thị thông tin
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
        echo '<br>';
    }
    sqlsrv_close($conn);
} else {
    echo "Kết nối thất bại"; 
}
?>
