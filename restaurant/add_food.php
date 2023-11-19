<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายการอาหาร</title>

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
                <form action="add_food_db.php" class="card shadow p-4" method="post" enctype="multipart/form-data">
                    <h1 class="text-center mb-5">เพิ่มรายการอาหาร</h1>

                    <label for="" class="form-lable">ชื่ออาหาร</label>
                    <input type="text" class="form-control mb-4" name="food_name" required>

                    <label for="" class="form-lable">รูปภาพ</label>
                    <input type="file" class="form-control mb-4" name="img">

                    <label for="" class="form-lable">ราคา</label>
                    <input type="number" class="form-control mb-4" name="price" required>

                    <label for="" class="form-lable">หมวดหมู่อาหาร</label>
                    <select name="food_type" class="form-select mb-3" type="text">
                        <option value="-">เลือกหมวดหมู่อาหาร</option>
                        <?php  
                            $select = mysqli_query($conn , "SELECT * FROM `food_type` WHERE `res_id` = '".$_SESSION['res_id']."' ");
                            while($row = mysqli_fetch_array($select)){
                        ?>
                            <option value="<?php echo $row['food_type'] ?>"><?php echo $row['food_type'] ?></option>
                        <?php } ?>
                    </select>
                    
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