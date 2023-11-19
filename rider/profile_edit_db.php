<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../upload/" . $filename;

        if(move_uploaded_file($_FILES['img']['tmp_name'], $filepath)){
            $sql = mysqli_query($conn, 
            "UPDATE `rider` SET 
            `firstname` = '$firstname',
            `lastname` = '$lastname',
            `img` = '$filename',
            `username` = '$username',
            `address` = '$address',
            `phone` = '$phone'
            WHERE `rider_id` = '".$_SESSION['rider_id']."' ");
        } else {
            $sql = mysqli_query($conn, 
            "UPDATE `rider` SET 
            `firstname` = '$firstname',
            `lastname` = '$lastname',
            `username` = '$username',
            `address` = '$address',
            `phone` = '$phone'
            WHERE `rider_id` = '".$_SESSION['rider_id']."' ");
        }

        if($sql){
            echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location = 'profile.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'profile_edit.php';</script>";
        }
    }

?>