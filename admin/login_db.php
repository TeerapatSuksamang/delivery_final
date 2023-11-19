<?php

    include_once '../config/db.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' ");
        $row = mysqli_fetch_array($select);

        if(!empty($row)){
            session_start();
            $_SESSION['admin_id'] = $row['admin_id'];
            header("location: profile.php");
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); window.location = 'login.php';</script>";
        }
    }

?>