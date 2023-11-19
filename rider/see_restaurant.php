<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูร้านอาหาร</title>

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
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #3F72AF;">
        <div class="container-fluid">
            <a href="" class="navbar-brand">Delivery</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="hamburger">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="index.php" class="btn btn-warning me-2">ย้อนกลับ</a>
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mt-5 mb-3">รับออเดอร์</h1>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped shadow-sm text-center">
                <tr>
                    <th>ชื่อผู้สั่ง</th>
                    <th>ที่อยู่ผู้สั่ง</th>
                    <th>เบอร์โทรผู้สั่ง</th>
                    <th>เมนูอาหาร</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>จัดการ</th>
                </tr>

                <?php
                    if(isset($_GET['see_res_id'])){
                        $_SESSION['see_res_id'] = $_GET['see_res_id'];
                    }
                    $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` = 0 AND `res_id` = '".$_SESSION['see_res_id']."' ");
                    while($row = mysqli_fetch_array($select)){
                ?>
                <tr valign="middle">
                    <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td>
                    <center>
                            <div class="rounded overflow-hidden mb-2" style="height: 100px; width: 100px;">
                                <img src="../upload/<?php echo $row['food_img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                            </div>
                            <p><?php echo $row['food_name'] ?></p>
                        </center>
                    </td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['quality'] ?></td>
                    <td><?php echo $row['sumprice'] ?></td>
                    <td>
                        <a href="update_status.php?order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary">รับออเดอร์</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>