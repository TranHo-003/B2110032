<?php
    session_start();
    //loai bo tat ca cac bien session
   session_unset();
   // huy session
   session_destroy(); 
   header('Location: login.php');
?>