<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $res_name = $_POST['res_name'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;

        $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `res_name` = '$res_name' AND `username` = '$username' AND `res_id` != '".$_SESSION['res_id']."' ");

        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('ชื่อผู้ใช้หรือ ร้านอาหารซ้ำ กรุณาเปลี่ยนใหม่'); window.location = 'profile.php';</script>";
        } else {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $filepath)){
                $sql = mysqli_query($conn, 
                "UPDATE `restaurant` SET 
                `res_name` = '$res_name',
                `firstname` = '$firstname',
                `lastname` = '$lastname',
                `img` = '$filename',
                `username` = '$username',
                `address` = '$address',
                `phone` = '$phone'
                WHERE `res_id` = '".$_SESSION['res_id']."' ");
            } else {
                $sql = mysqli_query($conn, 
                "UPDATE `restaurant` SET 
                `res_name` = '$res_name',
                `firstname` = '$firstname',
                `lastname` = '$lastname',
                `username` = '$username',
                `address` = '$address',
                `phone` = '$phone'
                WHERE `res_id` = '".$_SESSION['res_id']."' ");
            }
    
            if($sql){
                echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = 'profile.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'profile_edit.php';</script>";
            }
        }
    }

?>