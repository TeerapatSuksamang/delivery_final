<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

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
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="profile_edit_db.php" class="card shadow p-4" method="post" enctype="multipart/form-data">
                    <h1 class="text-center mb-5">แก้ไขข้อมูล</h1>
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = '".$_SESSION['admin_id']."' ");
                        $row = mysqli_fetch_array($select);
                    ?>

                    <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'] ?>">

                    <label for="" class="form-lable">ชื่อจริง</label>
                    <input type="text" class="form-control mb-4" name="firstname" value="<?php echo $row['firstname'] ?>" required>

                    <label for="" class="form-lable">นามสกุล</label>
                    <input type="text" class="form-control mb-4" name="lastname" value="<?php echo $row['lastname'] ?>" required>

                    <label for="" class="form-lable">รูปภาพ</label>
                    <center><img src="../upload/<?php echo $row['img'] ?>" class="rounded mb-3" style="width: 20vh; height: auto;"></center>
                    <input type="file" class="form-control mb-4" name="img">

                    <label for="" class="form-lable">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mb-4" name="username" value="<?php echo $row['username'] ?>" required>

                    <label for="" class="form-lable">ที่อยู่</label>
                    <input type="text" class="form-control mb-4" name="address" value="<?php echo $row['address'] ?>" required>

                    <label for="" class="form-lable">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control mb-4" name="phone" value="<?php echo $row['phone'] ?>" required>

                    <div class="d-flex gap-3">
                        <input type="submit" class="btn btn-success w-100" value="ยืนยัน" name="submit">
                        <a href="profile.php" class="btn btn-danger w-100">ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>