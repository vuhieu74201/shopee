<div class="header ">
    <div class="flex header__content">
        <a class="header__logo" href="dashboard.php">
            <i class="fab fa-shopify"></i>
            <span class="logo-text"> Shopee</span>
            <span class="logo--text" > Kênh người bán </span>  
        </a>
        <div class="flex account">
            <a href="" class=" flex account-active">
                <div class="account-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="account__text">
                    <?php echo $_SESSION['dangnhap'] ?>
                </div>
            </a>
            <a href="?login=dangxuat" class="account-active">
                <div class="account__text">
                    Đăng xuất
                </div>
            </a>
        </div>
    </div>
</div>