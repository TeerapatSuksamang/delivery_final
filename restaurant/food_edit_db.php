<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $food_id = $_POST['food_id'];
        $food_name = $_POST['food_name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];

        $new_discount = ($discount * $price) / 100;
        $new_price = $price - $new_discount;

        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp); 
        $filepath = "../upload/" . $filename;

        $select = mysqli_query($conn, "SELECT * FROM `food` WHERE `food_id` != '$food_id' AND `food_name` = '$food_name' ");

        if(mysqli_num_rows($select) > 0 ){
            echo "<script>alert('มีอาหารนี้แล้ว'); window.location = 'add_food.php';</script>";
        } else {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $filepath)){
                $sql = mysqli_query($conn, "UPDATE `food` SET
                `food_name`='$food_name',
                `img`='$filename',
                `price`='$price',
                `discount`='$discount',
                `new_price`='$new_price'
                WHERE `food_id` = '$food_id' ");
            } else {
                $sql = mysqli_query($conn, "UPDATE `food` SET
                `food_name`='$food_name',
                `price`='$price',
                `discount`='$discount',
                `new_price`='$new_price'
                WHERE `food_id` = '$food_id' ");
            }
            

            if($sql){
                echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = 'index.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'add_food.php';</script>";
            }
        }
    }

?>