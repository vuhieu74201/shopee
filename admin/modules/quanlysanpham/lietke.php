<?php

    $page_item = 5 ; 
    $page_current = !empty($_GET['page']) ? $_GET['page'] :1;
    $sql_total_sp = "SELECT * FROM tbsanpham " ;
    $query_total_sp = mysqli_query($conn,$sql_total_sp);
    $query_total_sp = $query_total_sp -> num_rows;
    $total_page = ceil($query_total_sp/$page_item);
    $offset = ($page_current-1) * $page_item ;

    $sql_lietke_sanpham = "SELECT * FROM tbsanpham ORDER BY idsanpham ASC LIMIT ".$page_item." OFFSET ".$offset."" ;
    $query_lietke_sanpham = mysqli_query($conn,$sql_lietke_sanpham);

?>

<div>   
    <a href="?action=quanlysanpham&query=them">
        <button class="btn btn-primary" style = "margin:20px 0 0;">Thêm Sản Phẩm</button>
    </a>
</div>
<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
    <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
        Hiển Thị Danh sách Sản phẩm  
    </span>
    <table class = "table table-bordered" style = "text-align: center;font-size:1.6rem;text-transform: capitalize;">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản phẩm </th>
                <th>Hình ảnh sản phẩm </th>
                <th>Màu sắc</th>
                <th>Số lượng</th>                
                <th>Giá</th>
                <th colspan="2" style="text-align:center">Chức năng</th>                           
            </tr>
        </thead>
        <?php
            $i = 1;            
            while($row = mysqli_fetch_array($query_lietke_sanpham)){
        ?>
        <tbody>   
            <tr style="line-height: 50px;">
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['masp']?></td>
                <td><?php echo $row['tensanpham']?></td>
                <td>
                    <div class="img__be" style="background-image:url(modules/quanlysanpham/uploads/<?php echo $row['anhsanpham']?>);
                                                background-repeat: no-repeat;
                                                background-size: contain;
                                                background-position: center;
                                                height:50px;">  
                    </div>               
                </td>
                <td><?php echo $row['mausac']?></td>
                <td><?php echo $row['soluong']?></td>
                <td><?php echo number_format($row['gia'],0,',','.')?></td>
                <td>
                    <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['idsanpham'] ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                </td>                      
                <td>
                    <a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['idsanpham'] ?>">
                        <button class="btn btn-primary">Xóa</button>
                    </a>
                </td>                       
            </tr>                    
        </tbody>  
        <?php
            }
        ?>           
    </table>
    <div class="phan_trang"> 
        <?php
            if($page_current>2){
                $start_page = 1;
        ?>
            <a href="?action=quanlysanpham&query=lietke&page=<?php echo $start_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-left"></i></a>
        <?php
            }if($page_current>1){
                $prev = $page_current - 1;
        ?>
                <a href="?action=quanlysanpham&query=lietke&page=<?php echo $prev ?>" class="phan_trang_icon"><i class="fas fa-chevron-left"></i> </a>
            <?php
                }
            ?>
            <?php
                for($i=1 ; $i <= $total_page ; $i++){
                    if($i != $page_current){
                        if($i > $page_current - 3 && $i < $page_current + 3){
            ?>
                            <a href="?action=quanlysanpham&query=lietke&page=<?php echo $i?>" class="phan_trang_icon"> <?php echo $i?> </a>
                        <?php
                            }
                        ?>
                <?php
                    }else{
                ?>
                <a href="?action=quanlysanpham&query=lietke&page=<?php echo $i?>" class="phan_trang_icon phan_trang_icon_active "> <?php echo $i?> </a>
                <?php
                    }
                ?>
            <?php
                }if($page_current < $total_page){
                    $next_page = $page_current + 1;
            ?>
                <a href="?action=quanlysanpham&query=lietke&page=<?php echo $next_page ?>" class="phan_trang_icon"> <i class="fas fa-chevron-right"></i> </a>
                <?php
                    }
                ?>
        <?php
            if($page_current < $total_page - 2){
                $end_page = $total_page;
        ?>
            <a href="?action=quanlysanpham&query=lietke&page=<?php echo $end_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-right"></i></a>
        <?php
            }
        ?>
    </div>
</div>
