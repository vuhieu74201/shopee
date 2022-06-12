<?php
    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY stt ASC" ;
    $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
?>
<?php
if(isset($_POST['search'])){
    $search = $_POST['input_search'];
    $sql_all_sp  = "SELECT * FROM tbsanpham WHERE tensanpham LIKE '%$search%' ORDER BY idsanpham ASC ";
    $query_sp = mysqli_query($conn, $sql_all_sp);
    $timkiem = $search;
}
?>
<div class="grid">    
    <div class="row" style=" padding:30px 15px;" >
        <div class="category col-lg-2">
            <h3 class="category-heading">
                <i class="fas fa-list"></i>
                Danh mục 
            </h3>
            <ul class="category-list">              
                <li class="category-item category-item--active">
                    <a href="index.php" class="category-item__link">Sản phẩm </a>
                </li>
                <?php
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li class="category-item">
                    <a href="index.php?quanly=quanlydanhmuc&id=<?php echo $row_danhmuc['iddanhmuc']?>" class="category-item__link">
                        <?php echo $row_danhmuc['tendanhmuc']?>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="col-lg-10" style="padding-right: 0;">
            <div class="flex home-filter" style="font-size:1.8rem;padding:12px 0;margin-bottom:10px;margin-top:6px; ">
                <div class="" style="padding:0 10px 0 10px;color:#ee4d2d">
                    <i class="far fa-question-circle"></i>
                </div>
                <div class="">
                    Kết quả tìm kiếm cho từ khoá : ' <span style="color:#ee4d2d"><?php echo  $timkiem ?></span> '
                </div>
            </div>
            <?php
                include 'inc/sidebar/sidebar.php';
            ?>
                
            <div class="home-product">
                <div class="grid">
                    <div class="row" style=" padding:10px 10px 10px 5px">
                    <?php
                        while ($row_sp = mysqli_fetch_array($query_sp)){
                    ?>
                        <div class="col-xs-2-4">
                            <a href="./chitietsanpham.php?id=<?php echo $row_sp['idsanpham']?>" class="" style="text-decoration: none;" >
                                <div class="home-product-item">                                       
                                    <div class="home-product-item__img" style="background-image: url(./admin/modules/quanlysanpham/uploads/<?php echo $row_sp['anhsanpham']?>)"></div>                   
                                    <span class="home-product-item__name">
                                        <?php  echo $row_sp['tensanpham'] ?>
                                    </span>
                                    <div class="home-product-item__price">
                                        <?php echo number_format($row_sp['gia'],0,',','.').' ₫'?>
                                    </div>                                      
                                </div>
                            </a>
                        </div>   
                        <?php
                            }
                        ?>          
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>













