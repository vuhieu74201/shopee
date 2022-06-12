<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id='' ;
    }
    $sql_chitiet = "SELECT * FROM tbsanpham WHERE idsanpham ='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
?>
<?php
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="page-product">
    <div class="container">
        <div class="row page-product-main">
            <div class="col-lg-5" >    
                <div class="flex flex-column page-product__img" style="background-image:url(./admin/modules/quanlysanpham/uploads/<?php echo $row_chitiet['anhsanpham']?>) ;">
                </div>                  
            </div>
            <div class="page-product__text col-lg-7" style="padding: 20px 35px 0 20px;">
                <span class="shopee-text">
                    <?php echo $row_chitiet['tensanpham']?> 
                </span>
                <div class="flex shopee-rating">
                    <div class="flex shopee-rating__star">
                        <div class="shopee-rating__text-num">5.0</div>
                        <div class="shopee-rating__star-star"><i class="fas fa-star"></i></div>
                        <div class="shopee-rating__star-star"><i class="fas fa-star"></i></div>
                        <div class="shopee-rating__star-star"><i class="fas fa-star"></i></div>
                        <div class="shopee-rating__star-star"><i class="fas fa-star"></i></div>
                        <div class="shopee-rating__star-star"><i class="fas fa-star"></i></div>
                    </div>
                    <div class="flex shopee-rating__text-1">
                        <div class="shopee-rating__text-num">46</div>
                        <div class="shopee-rating__text-text"> Đánh giá</div>
                    </div>
                    <div class="flex shopee-rating__text-2">
                        <div class="shopee-rating__text-num">200</div>
                        <div class="shopee-rating__text-text"> Đã Bán </div>
                    </div>
                </div>
                <div class="flex shopee-price">
                    <div class="flex shopee-price_text">
                        <?php echo number_format($row_chitiet['gia'],0,',','.')?>
                        <span style="color:#d0011b;font-size:2rem;margin-left: 4px;">₫</span>
                    </div>
                    <div  class="flex shopee-price__content">
                        <div class="shopee-price__content-1">Gì Cũng Rẻ</div>
                        <div class="shopee-price__content-2">Giá tốt nhất so với các sản phẩm cùng loại trên Shopee !</div>
                    </div>
                </div>
                <div class="flex shopee-color ">
                    <div class="shopee-color__text"> Màu sắc </div>
                    <button class=" product-variation"><?php echo $row_chitiet['mausac']?></button>
                </div>
                <div class="flex shopee-quantity ">
                    <div class="shopee-quantity-text">Số lượng</div>
                    <div class="flex ">
                        <div  class=" shopee-input">
                            <div class=" flex shopee-input-quantity">
                                <button class="shopee-input-quantity__btn">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input class="quantity" type="text" role="spinbutton" aria-valuenow="1" value="1" />
                                <button class="shopee-input-quantity__btn"> 
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="shopee-input-quantity__text"> 
                            <?php echo $row_chitiet['soluong']?> 
                            sản phẩm có sẵn
                        </div>
                    </div>
                </div>
                <form action="./inc/giohang/xuly.php" method="post">
                    <div class="flex shopee-cart">
                        <input type="hidden" name="idsanpham" value="<?php echo $row_chitiet['idsanpham']?>">
                        <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['tensanpham']?>">
                        <input type="hidden" name="anhsanpham" value="<?php echo $row_chitiet['anhsanpham']?>">
                        <input type="hidden" name="mausac" value="<?php echo $row_chitiet['mausac']?>">
                        <input type="hidden" name="soluong" value="1">
                        <input type="hidden" name="gia" value="<?php echo $row_chitiet['gia']?>">
                        <button class="flex shopee-cart__giohang" onclick="add_cart()" name="themgiohang">
                            <i class="fas fa-cart-plus" style="font-size:2rem;padding-left:12px"></i>
                            <div class="shopee-cart__giohang-text" >
                                Thêm vào giỏ hàng
                            </div>
                        </button>
                            <script>
                                function add_cart() {
                                    alert("Thêm sản phẩm vào giỏ hàng thàng công !");
                                }
                            </script>
                        <button class = "shopee-cart__buy" name="buy_now">
                            <div class = "shopee-cart__buy-text" >
                                Mua ngay
                            </div>
                        </button>
                    </div>
                </form>  
            </div>
        </div>
        <div class="row motachitiet">
          <div class="tieude">Mô tả chi tiết sản phẩm</div>
          <div class="noidung"><?php echo $row_chitiet['mota']?></div>
        </div>
       
    
    </div>
</div>
<?php 
    }
?>