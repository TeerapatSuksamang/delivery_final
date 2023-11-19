<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานสรุปยอดขาย</title>

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
    
        $re = "active";
        include 'nav.php';
    
    ?>

    <div class="container">
        <h1 class="text-center mt-5 mb-3">รายงานสรุปยอดขาย วัน/เดือน/ปี</h1>
        <form action="report.php" method="post">
            <div class="d-flex gap-3">
                <input type="date" class="form-control mb-3" name="date1">
                <input type="date" class="form-control mb-3" name="date2">
                <input type="submit" value="ค้นหา" name="submit" class="btn btn-primary mb-3">
            </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $date1 = $_POST['date1'];
                $date2 = $_POST['date2'];

                if($date1 != '' & $date2 != ''){
                    $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` = 5 AND `date` BETWEEN '$date1' AND '$date2' AND `res_id` = '".$_SESSION['res_id']."' ");
                    echo "<p style='color: green;'>ค้นหาจากวันที่ $date1 ถึง $date2 </p>";
                } else {
                    $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` = 5 AND `res_id` = '".$_SESSION['res_id']."' ");
                }
            } else {
            $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `status` = 5 AND `res_id` = '".$_SESSION['res_id']."' ");
            } ?>
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
                    <th>วันที่</th>
                    <th>รายละเอียด</th>
                </tr>

                <?php
                    while($row = mysqli_fetch_array($select)){
                        $total_price += $row['sumprice'];
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
                    <td><?php echo $row['date'] ?></td>
                    <td><a href="show_print.php?order_id=<?php echo $row['order_id']; ?>" class="btn btn-primary">พิมพ์ใบเสร็จ</a></td>
                </tr>
                <?php } ?>
            </table>
            <p style="color: red;" class="float-end">ราคารวมทั้งสิ้น <?php echo $total_price ?> บาท</p>
        </div>
    </div>
</body>
</html>