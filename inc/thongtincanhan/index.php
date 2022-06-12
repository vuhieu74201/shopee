<?php
    $sql_name = "SELECT * FROM tbnguoidung where idnguoidung = '$_SESSION[idnguoidung]'";
    $query_name = mysqli_query($conn,$sql_name);
    $row_name = mysqli_fetch_array($query_name);
?>


<div class="" style=" background-color: #f2f2f2; ">
    <div class="container row" style="margin: 0 auto ;padding:35px 0">
        <div class="list col-lg-2">
            <div class="shopee__profile row">
                <div class="shopee__avatar" style="background-image: url(./img/avatar/<?php echo $row_name['avatar']?>);">        
                </div>
                <div class="shopee__fullname">
                    <div class="shopee__name">
                        <?php echo $row_name['fullname'] ?>
                    </div>
                    <div class="shopee__title">
                        <i class="fas fa-pen"></i>
                        <div class="shopee__title-text"> Sửa Hồ Sơ </div>
                    </div>
                </div>
            </div>
            <div class="shopee__list">              
                <div class="flex shopee__list--item list--item--active">
                    <img src="./img/avatar/icon1.png" alt="" class="shopee__list--icon">
                    <a href="?quanly=quanlythongtincanhan&query=profile" class="list--item__link">Tài khoản của tôi</a>
                </div>
                <div class="flex shopee__list--item">
                    <img src="./img/avatar/icon2.png" alt="" class="shopee__list--icon">  
                    <a href="?quanly=quanlythongtincanhan&query=donmua" class="list--item__link">Đơn mua</a>
                </div>
                <div class="flex shopee__list--item ">
                    <img src="./img/avatar/icon3.png" alt="" class="shopee__list--icon"> 
                    <a href="index.php" class="list--item__link">Thông báo</a>
                </div>
                <div class="flex shopee__list--item ">
                    <img src="./img/avatar/icon4.png" alt="" class="shopee__list--icon">
                    <a href="index.php" class="list--item__link">Kho Voucher</a>
                </div>
                <div class="flex shopee__list--item ">
                    <img src="./img/avatar/icon5.png" alt="" class="shopee__list--icon">
                    <a href="index.php" class="list--item__link">Shopee Xu</a>
                </div>
            
            </div>
            </div>
        <div class="col-lg-10">
            <?php 
                if(isset( $_GET['query'])){
                    $query = $_GET['query'];
                }else{
                    $query = '';
                }	
                if(isset( $_GET['id'])){
                    $chitiet = $_GET['id'];
                }else{
                    $chitiet = '';
                }
                if($query=='profile'){
                    include("./inc/thongtincanhan/profile.php");
                }elseif($query=='xuly'){
                    include("./inc/thongtincanhan/xuly.php");
                }
                elseif($query=='donmua'){
                    include("./inc/thongtincanhan/donmua.php");
                }elseif($query=='chitiet'){
                    include("./inc/thongtincanhan/chitietdonmua.php");
                }
                else{
                    include("./inc/thongtincanhan/profile.php");
                }
            ?>
        </div>
    </div>
</div>