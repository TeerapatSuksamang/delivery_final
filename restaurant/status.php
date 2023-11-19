<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะ</title>

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
    <?php
    
        $sta = "active";
        include 'nav.php';
    
    ?>

    <div class="container-fluid">
        <h1 class="text-center mt-5 mb-3">สถานะ</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm text-center">
                <tr>
                    <th>ชื่อผู้สั่ง</th>
                    <th>ที่อยู่ผู้สั่ง</th>
                    <th>เบอร์โทรผู้สั่ง</th>
                    <th>รายการอาหาร</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>สถานะ</th>
                </tr>

                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` BETWEEN 1 AND 5 AND `res_id` = '".$_SESSION['res_id']."' ");
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
                        <?php if($row['status'] == 2 ){ ?>
                            <a href="update_status.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-success">ยืนยันการทำอาหารเสร็จสิ้น</a>
                        <?php } else if($row['status'] == 3 ){ ?>
                            <p class="alert alert-warning">รอผู้ส่งจัดส่ง</p>
                        <?php } else if($row['status'] == 4 ){ ?>
                            <p class="alert alert-primary">ผู้ส่งกำลังจัดส่ง</p>
                        <?php } else if($row['status'] == 5 ){ ?>
                            <p class="alert alert-success">จัดส่งและชำระเงินเสร็จสิ้น</p>
                        <?php } else ?>
                    </td>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>