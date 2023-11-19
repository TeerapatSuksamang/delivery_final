<?php
    // include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรหัสผ่าน</title>

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
                <form action="password_edit_db.php" class="card shadow p-4" method="post">
                    <h1 class="text-center mb-5">แก้ไขรหัสผ่าน</h1>

                    <label for="" class="form-lable">รหัสผ่านเก่า</label>
                    <input type="password" class="form-control mb-4" name="old_password" required>

                    <label for="" class="form-lable">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control mb-4" name="new_password" required>

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