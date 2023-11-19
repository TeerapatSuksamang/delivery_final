<?php

    include_once '../config/db.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `username` = '$username' AND `password` = '$password' ");
        $row = mysqli_fetch_array($select);

        if(!empty($row)){
            if($row['status'] == 0 ){
                echo "<script>alert('บัญชีนี้กำลังรออนุมัติการใช้งาน'); window.location = 'login.php';</script>";
            } else {
                session_start();
                $_SESSION['res_id'] = $row['res_id'];
                header("location: index.php");
            }
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); window.location = 'login.php';</script>";
        }
    }

?>