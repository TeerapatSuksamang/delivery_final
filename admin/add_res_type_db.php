<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $res_type = $_POST['res_type'];
        
        $temp = explode('.' , $_FILES['img']['name']);
        $filename = rand() . '.' . end($temp);
        $filepath = "../../upload/" . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], $filepath)

        $select = mysqli_query($conn, "SELECT * FROM `restaurant_type` WHERE `res_type` = '$res_type' ");

        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('มีประเภทร้านอาหารนี้แล้ว'); window.location = 'add_res_type.php';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO `restaurant_type`(`res_type`, `img`) VALUES ('$res_type', '$filename') ");

            if($sql){
                echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location = 'profile.php';</script>";
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'profile_edit.php';</script>";
            }
        }
    }

?>