<?php

    include_once 'session.php';
    if(isset($_GET['res_id'])){
        $res_id = $_GET['res_id'];

        $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `res_id` = '$res_id' ");
        $row = mysqli_fetch_array($select);

        $status = 0;
        if($row['status'] == 0 ){
            $status = 1;
        } 

        $sql = mysqli_query($conn, "UPDATE `restaurant` SET `status` = '$status' WHERE `res_id` = '$res_id' ");

        if($sql){
            echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location = 'res_approve.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'res_approve.php';</script>";
        }
    }

?>