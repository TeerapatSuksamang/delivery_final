<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลผู้ใช้งาน</title>

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
    
        $profile = "active";
        include 'nav.php';
    
    ?>

    <div class="container-fluid">
        <h1 class="mt-5 mb-3">ข้อมูลผู้ใช้งาน</h1>
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
                    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['user_id']."' ");
                    $row = mysqli_fetch_array($select);
                ?>
                <tr valign="middle">
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td>
                        <center>
                            <div class="rounded overflow-hidden" style="width: 100px; height: 100px;">
                                <img src="../upload/<?php echo $row['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                            </div>
                        </center>
                    </td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td>
                        <a href="profile_edit.php" class="btn btn-warning mb-2">แก้ไขข้อมูล</a>
                        <a href="password_edit.php" class="btn btn-secondary mb-2">แก้ไขรหัสผ่าน</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>