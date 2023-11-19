<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>

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
                <a href="index.php" class="btn btn-warning me-2">ย้อนกลับ</a>
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <h1 class="text-center mb-3">หมวดหมู่อาหาร ร้าน <?php echo $_GET['res_name'] ?></h1>
            <?php
                if(isset($_GET['see_res_id'])){
                    $_SESSION['see_res_id'] = $_GET['see_res_id'];
                }
                $select = mysqli_query($conn, "SELECT * FROM `food_type` WHERE `res_id` = '".$_SESSION['see_res_id']."' ");
                while($row = mysqli_fetch_array($select)){
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <div class="card-img-top overflow-hidden" style="height: 300px;">
                        <img src="../upload/<?php echo $row['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title"><?php echo $row['food_type'] ?></h2>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <h1 class="my-3">รายการอาหาร</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm text-center">
                <tr>
                    <th>ชื่ออาหาร</th>
                    <th>รูปภาพ</th>
                    <th>ราคา</th>
                    <th>หมวดหมู่อาหาร</th>
                    <th>จัดการ</th>
                </tr>

                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `food` WHERE `res_id` = '".$_SESSION['see_res_id']."' ");
                    while($row_food = mysqli_fetch_array($select)){
                ?>
                <tr valign="middle">
                    <td><?php echo $row_food['food_name'] ?></td>
                    <td>
                        <center>
                            <div class="rounded overflow-hidden" style="height: 100px; width: 100px;">
                                <img src="../upload/<?php echo $row_food['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                            </div>
                        </center>
                    </td>
                    <td>
                        <?php if($row_food['discount'] != 0 ){ ?>
                        <?php echo $row_food['price'] ?> บาท <br>
                        ส่วนลด <?php echo $row_food['discount'] ?> % <br>
                        <p style="color: red;">ลดเหลือ <?php echo $row_food['new_price'] ?> บาท</p>
                        <?php } else { echo $row_food['price'] ?>
                            บาท
                        <?php } ?>
                    </td>
                    <td><?php echo $row_food['food_type'] ?></td>
                    <td>
                        <a href="add_cart.php?food_id=<?php echo $row_food['food_id'] ?>" class="btn btn-success mb-2">สั่งอาหาร</a>
                        <a href="review.php?food_id=<?php echo $row_food['food_id'] ?>" class="btn btn-primary mb-2">ดูรีวิว</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>