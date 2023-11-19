<?php

    include_once '../config/db.php';
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $filepath);

        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' ");
        
        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('ชื่อผู้ใช้ซ้ำ กรุณาเปลี่ยนใหม่'); window.location = 'register.php';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO `user`(`firstname`, `lastname`, `img`, `username`, `password`, `address`, `phone`, `status`) 
            VALUES ('$firstname', '$lastname', '$filename', '$username', '$password', '$address', '$phone', 0) " );

            if($sql){
                echo "<script>alert('สมัครใช้งานสำเร็จ กรุณารอการอนุมัติการใช้งาน'); window.location = 'login.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'register.php';</script>";
            }
        }
    }

?>