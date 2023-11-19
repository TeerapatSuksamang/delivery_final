<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติร้านอาหาร</title>

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
    
        $res = "active";
        include 'nav.php';
    
    ?>

    <div class="container-fluid">
        <div class="row mt-5">
            <h1 class="text-center mb-3">ประเภทร้านอาหาร</h1>
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `restaurant_type` ");
                while($row = mysqli_fetch_array($select)){
            ?>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="card mb-3">
                    <div class="card-img-top overflow-hidden" style="height: 200px;">
                        <img src="../upload/<?php echo $row['img']; ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo $row['res_type'] ?></h4>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-12">
                <a href="add_res_type.php" class="btn btn-primary my-2">เพิ่มประเภทร้านอาหาร</a>
            </div>
        </div>

        <h1 class="my-3">อนุมัติร้านอาหาร</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm text-center">
                <tr>
                    <th>ชื่อร้านอาหาร</th>
                    <th>ชื่อจริง</th>
                    <th>นามสกุล</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทรศัพท์</th>
                    <td>ประเภทร้านอาหาร</td>
                    <th>จัดการ</th>
                </tr>

                <?php
                    $select_res = mysqli_query($conn, "SELECT * FROM `restaurant` ");
                    while($row_res = mysqli_fetch_array($select_res)){
                ?>
                <tr valign="middle">
                    <td><?php echo $row_res['res_name'] ?></td>
                    <td><?php echo $row_res['firstname'] ?></td>
                    <td><?php echo $row_res['lastname'] ?></td>
                    <td>
                        <div class="rounded overflow-hidden" style="height: 100px;">
                            <img src="../upload/<?php echo $row_res['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                        </div>
                    </td>
                    <td><?php echo $row_res['username'] ?></td>
                    <td><?php echo $row_res['address'] ?></td>
                    <td><?php echo $row_res['phone'] ?></td>
                    <td><?php echo $row_res['res_type'] ?></td>
                    <td>
                        <?php if($row_res['status'] == 0 ){ ?>
                            <a href="res_approve_db.php?res_id=<?php echo $row_res['res_id'] ?>" class="btn btn-success">อนุมัติ</a>
                        <?php } else { ?>
                            <a href="res_approve_db.php?res_id=<?php echo $row_res['res_id'] ?>" class="btn btn-danger">ยกเลิก</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>