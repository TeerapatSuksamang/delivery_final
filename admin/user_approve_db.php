<?php

    include_once 'session.php';
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];

        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$user_id' ");
        $row = mysqli_fetch_array($select);

        $status = 0;
        if($row['status'] == 0 ){
            $status = 1;
        } 

        $sql = mysqli_query($conn, "UPDATE `user` SET `status` = '$status' WHERE `user_id` = '$user_id' ");

        if($sql){
            echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location = 'user_approve.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'user_approve.php';</script>";
        }
    }

?>