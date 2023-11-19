<?php

    include_once 'session.php';
    if(isset($_POST['submit'])){
        $text = $_POST['text'];
        $user_id = $_SESSION['user_id'];
        $food_id = $_SESSION['food_id'];

        $sql = mysqli_query($conn, "INSERT INTO `review`(`text`, `user_id`, `food_id`) VALUES ('$text', '$user_id', '$food_id') ");

        if($sql){
            header("location: review.php");
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'review.php';</script>";
        }
    }

?>