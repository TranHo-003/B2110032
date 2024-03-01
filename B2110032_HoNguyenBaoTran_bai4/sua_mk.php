<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Nhập mật khẩu cũ: <input type="password" name="pass"><br>
        Nhập mật khẩu mới: <input type="password" name="newpass"> <br>
        Nhập lại mật khẩu mới: <input type="password" name="renewpass"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "qlbanhang";

        $id = $_SESSION['id'];
        $mkcu = $_SESSION["password"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "UPDATE customers SET password = '".md5($_POST["newpass"])."' WHERE id = '".$id."'";
            $conn = new mysqli($servername,$username,$pass,$dbname);
            if($conn->connect_error){
                die("Ket noi that bai: " .$conn->connect_error);
            } 

            if($mkcu == md5($_POST["pass"])){
                    if( md5($_POST["newpass"]) !== $mkcu){
                        if(($_POST["newpass"] == $_POST["renewpass"])){
                            if($conn->query($sql) == TRUE){
                                echo "<script>
                                alert('Đổi mật khẩu thành công');
                                window.location.href = 'login.php';
                              </script>";
                        }
                        }else{
                            echo "<script>alert('Mật khẩu mới phải giống nhau')</script>";
                        }
                        
                    }else{
                        echo "<script>alert('Mật khẩu mới phải khác mật khẩu cũ')</script>";

                    }
            }else{
                echo "<script>alert('Mật khẩu cũ không chính xác')</script>";
            }
        }
    ?>
   
</body>
</html>