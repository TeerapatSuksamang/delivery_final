<nav class="navbar navbar-expand-sm navbar-dark" style="background: #40513B">
    <div class="container-fluid">
        <a href="" class="navbar-brand">Delivey</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?php echo $profile; ?>">ข้อมูลร้านอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="order.php" class="nav-link <?php echo $order; ?>">รับรายการอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="status.php" class="nav-link <?php echo $sta; ?>">สถานะ</a>
                </li>
                <li class="nav-item">
                    <a href="report.php" class="nav-link <?php echo $re; ?>">รายงายสรุปยอดขาย</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
        </div>
    </div>
</nav>