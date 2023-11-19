<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>

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
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">ข้อมูลผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item">
                        <a href="history.php" class="nav-link">ประวัติการสั่งอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a href="status.php" class="nav-link">สถานะ</a>
                    </li>
                </ul>
                <form action="index.php" class="d-flex" method="post">
                    <input type="search" class="form-control me-2" placeholder="ค้นหาร้านอาหาร" name="text">
                    <button class="btn btn-primary me-2" name="submit">ค้นหา</button>
                </form>
                <hr class="text-light">
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <h1 class="text-center mb-3">ร้านอาหาร</h1>
            <?php
                if(isset($_POST['submit'])){
                    $text = $_POST['text'];
                    $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `status` = 1 AND `res_name` LIKE '%$text%' ");
                } else {
                    $select = mysqli_query($conn, "SELECT * FROM `restaurant` WHERE `status` = 1");
                }

                while($row = mysqli_fetch_array($select)){
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="card-img-top overflow-hidden" style="height: 300px;">
                        <img src="../upload/<?php echo $row['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title"><?php echo $row['res_name'] ?></h2>
                        <h5 class="card-text">ประเภทร้านอาหาร : <?php echo $row['res_type'] ?></h5>
                        <p class="card-text">ที่อยู่ : <?php echo $row['address'] ?> <br>
                            เบอร์โทรศัพท์ : <?php echo $row['phone'] ?>
                        </p>

                        <a href="see_restaurant.php?see_res_id=<?php echo $row['res_id'] ?>&res_name=<?php echo $row['res_name'] ?>" class="btn btn-warning">ดูร้านอาหาร</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>