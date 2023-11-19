<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $food_name = $_POST['food_name'];
        $price = $_POST['price'];
        $food_type = $_POST['food_type'];

        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $filepath);

        $select = mysqli_query($conn, "SELECT * FROM `food` WHERE `food_name` = '$food_name' ");

        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('มีอาหารนี้แล้ว'); window.location = 'add_food.php';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO `food`(`food_name`, `img`, `price`, `discount`, `new_price`, `food_type`, `res_id`)
            VALUES ('$food_name', '$filename', '$price', 0, 0, '$food_type', '".$_SESSION['res_id']."') ");

            if($sql){
                echo "<script>alert('เพิ่มอาหารสำเร็จ'); window.location = 'index.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'add_food.php';</script>";
            }
        }
    }

?>