
<div class="header">
    <div class="shopee-top">
        <div class="navbar-wrapper container-wrapper">
           <div class="container navbar">
               <div class="flex v-center">
                   <a href="admin/index.php" class=" flex left-text">
                       Kênh Người Bán
                    </a>
                    <a href="" class="flex left-text" title="Trở thành Người bán Shopee">
                       Trở thành Người bán Shopee
                    </a>
                    <a href="" class="flex left-text">
                        <div class="shopee-app">
                            Tải ứng dụng
                        </div>
                    </a>
                    <div class="flex left-text left-text-2">
                        Kết nối
                    </div>
                    <div class="flex left-text left-icons">
                        <a href="" class=" left-text left-icons">
                            <i class="fab fa-facebook"></i>                                                              
                        </a>
                        <a href="" class="left-text left-icons">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
               </div>
               <div class="navbar__spacer">                          
               </div>
               <ul class="flex navbar__links">
                    <li class="navbar__links-items ">
                        <a href="" class="flex navbar__links-items">
                            <div class="items-icons">
                                <i class="far fa-bell"></i>
                            </div>
                            <span class="items-text">
                                thông báo
                            </span>
                        </a>
                    </li>
                    <a href="" class="flex navbar__links-items">
                        <div class="items-icons">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <span class="items-text">Hỗ trợ</span>
                    </a>
                    <?php
                        if(isset($_SESSION['idnguoidung'])){  
                            $sql_name = "SELECT * FROM tbnguoidung where idnguoidung='$_SESSION[idnguoidung]'";
                            $query_name = mysqli_query($conn, $sql_name);
                            $row_name = mysqli_fetch_array($query_name);
                            
                    ?>                   
                    <a href="index.php?quanly=quanlythongtincanhan" class="flex navbar__links-items navbar__link-text"> 
                        <div class="account-icon" style="margin-right:5px;">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <?php echo $row_name['fullname'] ?>
                    </a>                   
                    <a href="index.php?login=dangxuat" class="navbar__links-items navbar__link-text"> 
                        Đăng xuất
                    </a>
                    <?php
                        }else{
                    ?>
                    <a href="dangky.php" class="navbar__links-items navbar__link-text"> 
                        Đăng ký 
                    </a>
                    <a href="loginform.php" class="navbar__links-items navbar__link-text"> 
                        Đăng nhập 
                    </a>
                    <?php
                        }
                    ?>
               </ul>
           </div>
           
        </div>
        <div class="container-wrapper">
           <div class="container header-with-search">
               <div>
                    <a href="index.php" class="shopee-logo">
                       <i class="fab fa-shopify"></i>
                       <span class="logo-text"> Shopee</span>  
                    </a>
               </div>
                <div class="header-with-search__search-actions">
                    <div class="shopee__search-bar">
                        <form action="index.php?quanly=timkiem" method="post">
                            <div class="shopee__search-bar__main">
                                <div class="shopee__search-bar-input" autocomplete="off">
                                    <input name="input_search" type="text" class="flex shopee__search-bar-input__input" placeholder="Bạn cần tìm gì ?">
                                </div>
                                <button name="search" class="btn btn-light" style="width: 60px;height:35px;background-color:#ee4d2d">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="shopee__search-bar-text">
                            <a class="search-bar-text" href="">
                                Áo Khoác
                            </a>
                            <a class="search-bar-text" href="">
                                Bông Tẩy Trang
                            </a>
                            <a class="search-bar-text" href="">
                                Bánh Trung Thu
                            </a>
                            <a class="search-bar-text" href="">
                                Tai Nghe
                            </a>
                            <a class="search-bar-text" href="">
                                Váy
                            </a>
                            <a class="search-bar-text" href="">
                                Quần
                            </a>
                            <a class="search-bar-text" href="">
                                Balo
                            </a>
                            <a class="search-bar-text" href="">
                                Nồi Chiên Không Dầu
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex header-with-search__cart">
                    <a href="giohang.php" class="">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                </div>
           </div>
        </div>
    </div>  
</div>