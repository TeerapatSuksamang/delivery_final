<?php

    include_once 'session.php';
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];

        $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `order_id` = '$order_id' ");
        $row = mysqli_fetch_array($select);
        $status = $row['status'];

        if($status == 0){
            $status = 1;
        } else if($status == 1){
            $status = 2;
        } else if($status == 2){
            $status = 3;
        } else if($status == 3){
            $status = 4;
        } else if($status == 4){
            $status = 5;
        }

        $sql = mysqli_query($conn, "UPDATE `food_order` SET `status` = '$status' WHERE `order_id` = '$order_id' ");

        if($sql){
            echo "<script>alert('อัพเดตสถานะสำเร็จ'); window.location = 'status.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'status.php';</script>";
        }

    }

?>