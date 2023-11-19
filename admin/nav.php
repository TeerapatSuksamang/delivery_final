<nav class="navbar navbar-expand-sm navbar-dark" style="background: #27374D;">
    <div class="container-fluid">
        <a href="" class="navbar-brand">Delivery</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?php echo $profile; ?>">ข้อมูลผู้ดูแลระบบ</a>
                </li>
                <li class="nav-item">
                    <a href="res_approve.php" class="nav-link <?php echo $res; ?>">อนุมัติร้านอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="rider_approve.php" class="nav-link <?php echo $rid; ?>">อนุมัติผู้ส่งอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="user_approve.php" class="nav-link <?php echo $user; ?>">อนุมัติผู้ใช้งาน</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
        </div>
    </div>
</nav>