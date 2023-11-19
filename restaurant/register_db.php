<?php

    include_once '../config/db.php';
    if(isset($_POST['submit'])){
        $res_name = $_POST['res_name'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $res_type = $_POST['res_type'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $filepath);

        $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `res_name` = '$res_name' AND `username` = '$username' ");
        
        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('ชื่อร้านอาหาร หรือผู้ใช้ซ้ำ กรุณาเปลี่ยนใหม่'); window.location = 'register.php';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO `restaurant`(`res_name`, `firstname`, `lastname`, `img`, `username`, `password`, `address`, `phone`, `res_type`, `status`) 
            VALUES ('$res_name', '$firstname', '$lastname', '$filename', '$username', '$password', '$address', '$phone','$res_type', 0) " );

            if($sql){
                echo "<script>alert('สมัครใช้งานร้านอาหารสำเร็จ กรุณารอการอนุมัติการใช้งาน'); window.location = 'login.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'register.php';</script>";
            }
        }
    }

?>