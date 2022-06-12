<?php

    $page_item = 5 ; 
    $page_current = !empty($_GET['page']) ? $_GET['page'] :1;
    $sql_total_sp = "SELECT * FROM tbnguoidung " ;
    $query_total_sp = mysqli_query($conn,$sql_total_sp);
    $query_total_sp = $query_total_sp -> num_rows;
    $total_page = ceil($query_total_sp/$page_item);
    $offset = ($page_current-1) * $page_item ;

    $sql_lietke_nguoidung = "SELECT * FROM tbnguoidung ORDER BY idnguoidung ASC LIMIT ".$page_item." OFFSET ".$offset."" ;
    $query_lietke_nguoidung = mysqli_query($conn,$sql_lietke_nguoidung);

?>

<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
    <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
        Hiển Thị Danh sách Khách Hàng   
    </span>
    <table class = "table table-bordered" style = "text-align: center;font-size:1.6rem">
        <thead style = "font-size:1.6rem;text-transform: capitalize;">
            <tr>
                <th>Stt</th>
                <th>tên đăng nhập</th>
                <th>Họ và tên </th>
                <th>Số điện thoại</th>
                <th>email</th>
                <th>Ngày sinh </th>    
                <th>giới tính </th>                
                <th>Địa chỉ </th>
                <th colspan="2" style="text-align:center">Chức năng</th>                           
            </tr>
        </thead>
        <?php
            $i = 1;            
            while($row = mysqli_fetch_array($query_lietke_nguoidung)){
        ?>
        <tbody>   
            <tr style="line-height: 50px;">
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['taikhoan']?></td>
                <td style = "text-transform: capitalize;"><?php echo $row['fullname']?></td>
                <td><?php echo $row['sdt']?></td>
                <td><?php echo $row['email']?></td>    
                <td><?php echo $row['ngaysinh']?> / <?php echo $row['thangsinh']?> / <?php echo $row['namsinh']?> </td>                 
               
                <td> 
                    <?php 
                        if($row['gioitinh']==0){
                            echo'Nam';
                        }elseif($row['gioitinh']==1){
                            echo'Nữ';
                        }else{
                            echo'Khác';
                        }
                    ?>
                </td>
                <td><?php echo $row['diachi']?></td>
                <td>
                    <a href="?action=quanlykhachhang&query=lichsumuahang&idnguoidung=<?php echo $row['idnguoidung'] ?>">
                        <button class="btn" style="background-color:#ee4d2d;color:#fff">Lịch sử mua hàng</button> 
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
            <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $start_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-left"></i></a>
        <?php
            }if($page_current>1){
                $prev = $page_current - 1;
        ?>
                <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $prev ?>" class="phan_trang_icon"><i class="fas fa-chevron-left"></i> </a>
            <?php
                }
            ?>
            <?php
                for($i=1 ; $i <= $total_page ; $i++){
                    if($i != $page_current){
                        if($i > $page_current - 3 && $i < $page_current + 3){
            ?>
                            <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $i?>" class="phan_trang_icon"> <?php echo $i?> </a>
                        <?php
                            }
                        ?>
                <?php
                    }else{
                ?>
                <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $i?>" class="phan_trang_icon phan_trang_icon_active "> <?php echo $i?> </a>
                <?php
                    }
                ?>
            <?php
                }if($page_current < $total_page){
                    $next_page = $page_current + 1;
            ?>
                <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $next_page ?>" class="phan_trang_icon"> <i class="fas fa-chevron-right"></i> </a>
                <?php
                    }
                ?>
        <?php
            if($page_current < $total_page - 2){
                $end_page = $total_page;
        ?>
            <a href="?action=quanlykhachhang&query=lietke&page=<?php echo $end_page ?>" class="phan_trang_icon"><i class="fas fa-angle-double-right"></i></a>
        <?php
            }
        ?>
    </div>
</div>
