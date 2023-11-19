<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $food_name = $_POST['food_name'];
        $see_res_id = $_POST['see_res_id'];
        $food_img = $_POST['food_img'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $sumprice = $_POST['sumprice'];
        $user_id = $_POST['user_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $sql = mysqli_query($conn, "INSERT INTO `food_order`(`res_id`, `food_name`, `food_img`, `price`, `quality`, `sumprice`, `firstname`, `lastname`, `address`, `phone`, `user_id`, `rider_id`, `date`, `time`, `status`) 
        VALUES ('$see_res_id','$food_name','$food_img','$price','$qty','$sumprice','$firstname','$lastname','$address','$phone','$user_id', 0, '$date', '$time', 0) ");

        if($sql){
            echo "<script>alert('สั่งซื้อสำเร็จ กรุณารอรับอาหาร'); window.location = 'status.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'add_cart.php';</script>";
        }
    }

?>