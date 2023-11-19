<?php

    include_once 'session.php';
    if(isset($_GET['food_type_id'])){
        $food_type_id = $_GET['food_type_id'];

        $sql = mysqli_query($conn, "DELETE FROM `food_type` WHERE `food_type_id` = '$food_type_id' ");

        if($sql){
            echo "<script>alert('ลบหมวดหมู่อาหารสำเร็จ'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'index.php';</script>";
        }
    } else if(isset($_GET['food_id'])){
        $food_id = $_GET['food_id'];

        $sql = mysqli_query($conn, "DELETE FROM `food` WHERE `food_id` = '$food_id' ");

        if($sql){
            echo "<script>alert('ลบหมวดหมู่อาหารสำเร็จ'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'index.php';</script>";
        }
    }

?>