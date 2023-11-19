<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีวิวอาหาร</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <style>
        @font-face {
            font-family: "Prompt";
            src: url("../font/Prompt-Regular.ttf") format("truetype");
        }
        body{
            font-family: "Prompt";
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #594545;">
        <div class="container-fluid">
            <a href="" class="navbar-brand">Delivery</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="hamburger">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="see_restaurant.php" class="btn btn-warning me-2">ย้อนกลับ</a>
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mt-5 mb-3">รีวิวอาหาร</h1>
        <form action="review_db.php" class="card shadow p-4" method="post">
            <div class="d-flex gap-3">
                <input type="text" class="form-control" placeholder="เพิ่มรีวิวของคุณ" name="text">
                <button type="submit" class="btn btn-primary" name="submit">โพสต์</button>
            </div>
        </form>

        <h3 class="my-5">รีวิวของสมาชิกท่านอื่น</h3>
        <?php
            if(isset($_GET['food_id'])){
                $_SESSION['food_id'] = $_GET['food_id'];
            }
            $select = mysqli_query($conn, "SELECT * FROM `review` WHERE `food_id` = '".$_SESSION['food_id']."' ");
            while($row = mysqli_fetch_array($select)){
                $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '".$row['user_id']."' ");
                $row_user = mysqli_fetch_array($select_user);
        ?>
        <div class="card shadow p-4 mb-3">
            <div style="display: inline;">
                <img src="../upload/<?php echo $row_user['img'] ?>" class="rounded-circle mb-3" style="border: 1px solid black; height: 60px; width: 60px; display: inline;">
                <h4 style="display: inline;"><?php echo $row_user['username'] ?></h4>
            </div>
            <input type="text" class="form-control mb-2" value="<?php echo $row['text'] ?>" readonly>
        </div>
        <?php } ?>
    </div>
</body>
</html>