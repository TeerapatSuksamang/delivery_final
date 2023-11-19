<?php

    include_once 'session.php';
    if(isset($_GET['rider_id'])){
        $rider_id = $_GET['rider_id'];

        $select = mysqli_query($conn, "SELECT * FROM `rider` WHERE `rider_id` = '$rider_id' ");
        $row = mysqli_fetch_array($select);

        $status = 0;
        if($row['status'] == 0 ){
            $status = 1;
        } 

        $sql = mysqli_query($conn, "UPDATE `rider` SET `status` = '$status' WHERE `rider_id` = '$rider_id' ");

        if($sql){
            echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location = 'rider_approve.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'rider_approve.php';</script>";
        }
    }

?>