<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        
        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['user_id']."' ");
        $row = mysqli_fetch_array($select);

        if($old_password == $row['password']){
            $sql = mysqli_query($conn, "UPDATE `user` SET `password` = '$new_password' WHERE `user_id` = '".$_SESSION['user_id']."' ");

            if($sql){
                echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location = 'profile.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'password_edit.php';</script>";
            }
        } else {
            echo "<script>alert('รหัสผ่านเก่าไม่ถุกต้อง'); window.location = 'password_edit.php';</script>";
        }
    }

?>