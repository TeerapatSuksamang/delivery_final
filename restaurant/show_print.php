<?php

    require_once __DIR__ . '/vendor/autoload.php';

    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/tmp',
        ]),
        'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' => 'THSarabunNew Bold.ttf',
                'BI' => 'THSarabunNew BoldItalic.ttf'
            ]
        ],
        'default_font' => 'sarabun'
    ]);

    $mpdf->WriteHTML('<h1><div style="text-align: center;">ใบเสร็จการสั่งอาหาร</div></h1>');
    $mpdf->SetFont('sarabun','',16);
    ob_start();

    include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จการสั่งอาหาร</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <style>
        @font-face {
            font-family: "Prompt";
            src: url("../font/Prompt-Regular.ttf") format("truetype");
        }
        body{
            font-family: "Prompt";
        }
        .line{
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <?php
                $order_id = $_GET['order_id'];
                $select = mysqli_query($conn, "SELECT * FROM `food_order` WHERE `order_id` = '$order_id' ");
                $row = mysqli_fetch_array($select);
            ?>
            <div class="h6 text-center">ชื่อผู้สั่งอาหาร : <?php echo $row['firstname'].' '.$row['lastname']; ?></div>
            <div class="h6 text-center">ที่อยู่ผู้สั่ง : <?php echo $row['address'] ?></div>
            <div class="h6 text-center">เบอร์โทรผู้สั่ง : <?php echo $row['phone'] ?></div>
            <div class="h6 text-center">วันที่สั่ง : <?php echo $row['date'] ?></div>
            <div class="h6 text-center mb-3">เวลาที่สั่ง : <?php echo $row['time'] ?></div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered text-center">
                <tr class="line">
                    <th class="line">ชื่อผู้สั่งอาหาร</th>
                    <th class="line">ที่อยู่ผู้สั่ง</th>
                    <th class="line">เบอร์โทรผู้สั่ง</th>
                    <th class="line">เมนูอาหาร</th>
                    <th class="line">ราคา</th>
                    <th class="line">จำนวน</th>
                    <th class="line">ราคารวม</th>
                </tr>

                <tr valign="middle" class="line">
                    <td class="line"><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                    <td class="line"><?php echo $row['address'] ?></td>
                    <td class="line"><?php echo $row['phone'] ?></td>
                    <td class="line"><?php echo $row['food_name'] ?></td>
                    <td class="line"><?php echo $row['price'] ?></td>
                    <td class="line"><?php echo $row['quality'] ?></td>
                    <td class="line"><?php echo $row['sumprice'] ?></td>
                </tr>
            </table>
        </div>
    </div>

    <?php
    
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Receipt.pdf');
        ob_end_flush();
    
    ?>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="d-flex">
                    <a href="Receipt.pdf" class="btn btn-primary w-50 me-2">พิมพ์</a>
                    <a href="report.php" class="btn btn-danger w-50">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>