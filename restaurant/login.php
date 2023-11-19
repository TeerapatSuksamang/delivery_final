<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>

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
                <form action="login_db.php" class="card shadow p-4" method="post">
                    <h1 class="text-center mb-5">เข้าสู่ระบบร้านอาหาร</h1>

                    <label for="" class="form-lable">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mb-4" name="username" required>

                    <label for="" class="form-lable">รหัสผ่าน</label>
                    <input type="password" class="form-control mb-4" name="password" required>

                    <div class="d-flex gap-3">
                        <input type="submit" class="btn btn-success w-100" value="ยืนยัน" name="submit">
                        <a href="../index.php" class="btn btn-danger w-100">ย้อนกลับ</a>
                    </div>
                    <a href="register.php" class="btn btn-outline-primary mt-3">สมัครเป็นร้านอาหาร</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>