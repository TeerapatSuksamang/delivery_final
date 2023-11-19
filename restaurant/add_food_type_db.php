<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $food_type = $_POST['food_type'];
        $res_id = $_SESSION['res_id'];

        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $filepath);

        $select = mysqli_query($conn, "SELECT * FROM `food_type` WHERE `food_type` = '$food_type' ");

        if(mysqli_num_rows($select)){
            echo "<script>alert('มีหมวดหมู่อาหารนี้แล้ว'); window.location = 'add_food_type.php';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO `food_type`(`food_type`, `img`, `res_id`) VALUES ('$food_type', '$filename', '$res_id') ");

            if($sql){
                echo "<script>alert('เพิ่มหมวดหมู่อาหารสำเร็จ'); window.location = 'index.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'add_food_type.php';</script>";
            }
        }
    }

?>