<?php
    $sql_lietke_danhmuc = "SELECT * FROM danhmuc ORDER BY stt ASC" ;
    $query_lietke_danhmuc = mysqli_query($conn,$sql_lietke_danhmuc);
?>
<?php
    $page_item = 5 ;
    $page_current = !empty($_GET['page']) ? $_GET['page'] :1;
    $sql_total_sp = "SELECT *   FROM danhmuc,tbsanpham 
                                WHERE danhmuc.iddanhmuc = tbsanpham.iddanhmuc 
                                AND tbsanpham.iddanhmuc='$_GET[id]'" ;
    $query_total_sp = mysqli_query($conn,$sql_total_sp);
    $query_total_sp = $query_total_sp -> num_rows;
    $total_page = ceil($query_total_sp/$page_item);
    $offset = ($page_current-1) * $page_item ;
    $sql_sanpham = "SELECT * FROM danhmuc,tbsanpham 
                             WHERE danhmuc.iddanhmuc = tbsanpham.iddanhmuc 
                             AND tbsanpham.iddanhmuc='$_GET[id]' 
                             ORDER BY tbsanpham.idsanpham DESC LIMIT ".$page_item." OFFSET ".$offset." ";
    $query_sanpham = mysqli_query($conn, $sql_sanpham);
?>
<div class="grid">    
    <div class="row" style=" padding:10px 15px;" >
        <div class="category col-lg-2">
            <h3 class="category-heading">
                <i class="fas fa-list"></i>
                Danh mục 
            </h3>
            <div class="category-list">              
                <div class="category-item category-item--active">
                    <a href="index.php" class="category-item__link">Sản phẩm </a>
                </div>
                <div class="category-item ">
                    <?php
                       
                        while($row = mysqli_fetch_array($query_lietke_danhmuc)){
                    ?>
                        <a href="index.php?quanly=quanlydanhmuc&id=<?php echo $row['iddanhmuc']?>" class="category-item__link">
                            <?php echo $row['tendanhmuc']?>
                        </a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-10" style="padding-right: 0;">
            <?php
                include 'inc/sidebar/sidebar.php';
            ?>
            <div class="home-product">
                <div class="grid">
                    <div class="row" style=" padding:10px 10px 10px 5px">
                    <?php
                        while ($row_sanpham = mysqli_fetch_array($query_sanpham)){
                    ?>
                        <div class="col-xs-2-4">
                            <a href="./chitietsanpham.php?id=<?php echo $row_sanpham['idsanpham']?>" class="" style="text-decoration: none;" >
                                <div class="home-product-item">                                       
                                    <div class="home-product-item__img" style="background-image: url(./admin/modules/quanlysanpham/uploads/<?php echo $row_sanpham['anhsanpham']?>)"></div>                   
                                    <span class="home-product-item__name">
                                        <?php  echo $row_sanpham['tensanpham'] ?>
                                    </span>
                                    <div class="home-product-item__price">
                                        <?php echo number_format($row_sanpham['gia'],0,',','.').' ₫'?>
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
            <div class="phan_trang"> 
                <?php
                    if($page_current>2){
                       $start_page = 1;
                ?>
                    <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $start_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-left"></i></a>
                <?php
                    }if($page_current>1){
                        $prev = $page_current - 1;
                ?>
                        <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $prev ?>" class="phan_trang_icon"><i class="fas fa-chevron-left"></i> </a>
                    <?php
                        }
                    ?>
                    <?php
                        for($i=1 ; $i <= $total_page ; $i++){
                            if($i != $page_current){
                                if($i > $page_current - 3 && $i < $page_current + 3){
                    ?>
                                    <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $i?>" class="phan_trang_icon"> <?php echo $i?> </a>
                                <?php
                                    }
                                ?>
                        <?php
                            }else{
                        ?>
                        <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $i?>" class="phan_trang_icon phan_trang_icon_active "> <?php echo $i?> </a>
                        <?php
                            }
                        ?>
                    <?php
                        }if($page_current < $total_page){
                            $next_page = $page_current + 1;
                    ?>
                        <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $next_page ?>" class="phan_trang_icon"> <i class="fas fa-chevron-right"></i> </a>
                        <?php
                            }
                        ?>
                <?php
                    if($page_current < $total_page - 2){
                       $end_page = $total_page;
                ?>
                    <a href="?quanly=quanlydanhmuc&id=<?php echo $_GET['id']?>&page=<?php echo $end_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-right"></i></a>
                <?php
                    }
                ?>
            </div>       
        </div>                  
    </div>
</div>


                  


