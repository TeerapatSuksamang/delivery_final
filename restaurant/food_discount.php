<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ส่วนลด</title>

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
                <form action="food_discount_db.php" class="card shadow p-4" method="post">
                    <h1 class="text-center mb-5">กำหนดส่วนลด (%)</h1>
                    <?php
                        $food_id = $_GET['food_id'];
                        $select = mysqli_query($conn, "SELECT * FROM `food` WHERE `food_id` = ' $food_id' ");
                        $row = mysqli_fetch_array($select);
                    ?>

                    <input type="hidden" name="food_id" value="<?php echo $food_id ?>">

                    <label for="" class="form-lable">ชื่ออาหาร</label>
                    <input type="text" class="form-control mb-4" name="food_name" value="<?php echo $row['food_name'] ?>" readonly>

                    <label for="" class="form-lable">รูปภาพ</label>
                    <center><img src="../upload/<?php echo $row['img'] ?>" class="rounded mb-3" style="width: 20vh; height: 20vh;"></center>

                    <label for="" class="form-lable">ราคา</label>
                    <input type="text" class="form-control mb-4" name="price" value="<?php echo $row['price'] ?>" readonly>

                    <label for="" class="form-lable">ส่วนลด (%)</label>
                    <input type="number" class="form-control mb-4" name="discount" value="<?php echo $row['discount'] ?>" required>

                    <div class="d-flex gap-3">
                        <input type="submit" class="btn btn-success w-100" value="ยืนยัน" name="submit">
                        <a href="index.php" class="btn btn-danger w-100">ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>