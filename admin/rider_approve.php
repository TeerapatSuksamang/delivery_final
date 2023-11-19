<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติผู้ส่งอาหาร</title>

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
    
        $rid = "active";
        include 'nav.php';
    
    ?>
    
    <div class="container-fluid">
        <h1 class="mt-5 mb-3">อนุมัติผู้ส่งอาหาร</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover text-center shadow-sm">
                <tr>
                    <th>ชื่อจริง</th>
                    <th>นามสกุล</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>จัดการ</th>
                </tr>

                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `rider` ");
                    while($row = mysqli_fetch_array($select)){
                ?>
                <tr valign="middle">
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td>
                        <center>
                            <div class="rounded overflow-hidden" style="height: 100px; width: 100px;">
                                <img src="../upload/<?php echo $row['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                            </div>
                        </center>
                    </td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td>
                        <?php if($row['status'] == 0 ){ ?>
                            <a href="rider_approve_db.php?rider_id=<?php echo $row['rider_id'] ?>" class="btn btn-success">อนุมัติ</a>
                        <?php } else { ?>
                            <a href="rider_approve_db.php?rider_id=<?php echo $row['rider_id'] ?>" class="btn btn-danger">ยกเลิก</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>