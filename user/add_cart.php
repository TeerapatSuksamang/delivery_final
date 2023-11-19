<?php
    include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้า</title>

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
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #594545;">
        <div class="container-fluid">
            <a href="" class="navbar-brand">Delivery</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="hamburger">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="see_restaurant.php" class="btn btn-warning me-2">ย้อนกลับ</a>
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <h1 class="text-center mt-5 mb-3">รายการอาหารที่สั่ง</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered text-center shadow-sm">
                <tr>
                    <th>เมนูอาหาร</th>
                    <th>ราคาต่อชิ้น</th>
                    <th>จำนวน</th>
                    <th>เพิ่ม - ลด</th>
                    <th>ราคารวม</th>
                </tr>

                <?php
                    if(isset($_GET['food_id'])){
                        $_SESSION['food_id'] = $_GET['food_id'];
                    }
                    $select = mysqli_query($conn, "SELECT * FROM `food` WHERE `food_id` = '".$_SESSION['food_id']."' ");
                    $row = mysqli_fetch_array($select)
                ?>
                <tr valign="middle">
                    <td>
                        <center>
                            <div class="rounded overflow-hidden mb-2" style="width: 100px; height: 100px;">
                                <img src="../upload/<?php echo $row['img'] ?>" class="w-100 h-100" style="object-fit: cover; object-position: center center;">
                            </div>
                            <p><?php echo $row['food_name'] ?></p>
                        </center>
                    </td>
                    <td>
                        <?php if($row['discount'] != 0 ){ ?>
                        <?php echo $row['price'] ?> บาท <br>
                        ส่วนลด <?php echo $row['discount'] ?> % <br>
                        <p style="color: red;">ลดเหลือ <?php echo $row['new_price'] ?> บาท</p>
                        <?php $price = $row['new_price'];
                        } else { echo $row['price'] ?>
                            บาท
                        <?php $price = $row['price']; } ?>
                    </td>
                    <td>
                        <?php
                            if(isset($_POST['plus'])){
                                $qty = $_POST['qty'];
                                $qty += 1;
                            } else if(isset($_POST['reduce'])){
                                $qty = $_POST['qty'];
                                $qty -= 1;
                            } else {
                                $qty = 1;
                            }

                            echo $qty;
                            $sumprice = $price * $qty;
                        ?>
                    </td>
                    <td>
                        <form action="add_cart.php" method="post">
                            <input type="hidden" value="<?php echo $qty ?>" name="qty">
                            <input type="submit" class="btn btn-success mb-2" name="plus" value="+">
                            <?php if($qty > 1) { ?>
                            <input type="submit" class="btn btn-danger mb-2" name="reduce" value="-">
                            <?php } ?>
                        </form>
                    </td>
                    <td><?php echo $sumprice; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-8">
                <form action="insert_order.php" method="post">
                    <h1 class="text-center mb-5">ยืนยันข้อมูลผู้สั่ง</h1>
                    <?php
                        $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['user_id']."' ");
                        $row_user = mysqli_fetch_array($select_user);
                    ?>
                    <!-- ชื่ออาหาร -->
                    <input type="hidden" name="food_name" value="<?php echo $row['food_name'] ?>"> 
                    <!-- รูปอาหาร -->
                    <input type="hidden" name="food_img" value="<?php echo $row['img'] ?>"> 
                    <!-- ราคาอาหาร -->
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                    <!-- จำนวน -->
                    <input type="hidden" name="qty" value="<?php echo $qty ?>">
                    <!-- ราคารวม -->
                    <input type="hidden" name="sumprice" value="<?php echo $sumprice ?>">
                    <!-- ร้านอาหาร -->
                    <input type="hidden" name="see_res_id" value="<?php echo $row['res_id'] ?>">


                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">

                    <label for="" class="form-lable">ชื่อจริง</label>
                    <input type="text" class="form-control mb-3" name="firstname" value="<?php echo $row_user['firstname'] ?>" required>

                    <label for="" class="form-lable">นามสกุล</label>
                    <input type="text" class="form-control mb-3" name="lastname" value="<?php echo $row_user['lastname'] ?>" required>

                    <label for="" class="form-lable">ที่อยู่</label>
                    <input type="text" class="form-control mb-3" name="address" value="<?php echo $row_user['address'] ?>" required>

                    <label for="" class="form-lable">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control mb-5" name="phone" value="<?php echo $row_user['phone'] ?>" required>

                    <input type="submit" class="btn btn-success w-100" value="ยืนยัน" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>