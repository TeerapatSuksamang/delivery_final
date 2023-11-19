<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รับรายการอาหาร</title>

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
    
        $order = "active";
        include 'nav.php';
    
    ?>

    <div class="container-fluid">
        <h1 class="mt-5 mb-3">รับรายการอาหาร</h1>
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
                    <th>รับรายการ</th>
                </tr>

                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` BETWEEN 0 AND 1 AND `res_id` = '".$_SESSION['res_id']."' ");
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
                        <?php if($row['status'] == 0 ){ ?>
                            <p class="alert alert-secondary">รอผู้ส่งรับออร์เดอร์</p>
                        <?php } else { ?>
                        <a href="update_status.php?order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary">ทำอาหาร</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>