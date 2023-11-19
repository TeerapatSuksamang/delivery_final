<nav class="navbar navbar-expand-sm navbar-dark" style="background: #3F72AF;">
    <div class="container-fluid">
        <a href="" class="navbar-brand">Delivery</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?php echo $profile; ?>">ข้อมูลผู้ส่งอาหาร</a>
                </li>
                <li class="nav-item">
                    <a href="status.php" class="nav-link <?php echo $sta; ?>">สถานะ</a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
        </div>
    </div>
</nav>