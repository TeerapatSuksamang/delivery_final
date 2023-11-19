<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $food_id = $_POST['food_id'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];

        $new_discount = ($discount * $price) / 100;
        $new_price = $price - $new_discount;

        $sql = mysqli_query($conn, "UPDATE `food` SET `discount` = '$discount', `new_price` = '$new_price' WHERE `food_id` = '$food_id' ");

        if($sql){
            echo "<script>alert('เพิ่มส่วนลดสำเร็จ'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'food_discount.php';</script>";
        }
    }

?>