<?php
    $sql_lietke_donhang = " SELECT * FROM tbl_donhang,tbnguoidung
                            WHERE  tbl_donhang.idnguoidung = tbnguoidung.idnguoidung
                            GROUP BY tbl_donhang.madonhang" ;
    $query_lietke_donhang = mysqli_query($conn,$sql_lietke_donhang);
?>

<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
    <div class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;padding-bottom: 20px;">
        Hiển Thị Lịch Sử Mua Hàng  
    </div>
    <table class = "table table-bordered" style = "text-align: center;font-size:1.6rem">
        <thead>
            <tr style = "text-transform: capitalize;">
                <th>Stt</th>
                <th>Mã đơn hàng</th>              
                <th>Ngày đặt</th>   
                <th>Trạng thái đơn hàng</th>  
                <th colspan="2" style="text-align:center">Chức năng</th>                           
            </tr>
        </thead>
        <?php
            $i = 1;            
            while($row_donhang = mysqli_fetch_array($query_lietke_donhang)){
        ?>
        <tbody>   
            <tr style="line-height: 50px;">
                <td><?php echo $i++ ?></td>
                <td><?php echo $row_donhang['madonhang']?></td>
                <td><?php echo $row_donhang['ngaydat']?></td>
                <td>
                    <?php 
                        if($row_donhang['trangthai']==0){
                            echo'Đang Chờ Xử Lý';
                        }elseif($row_donhang['trangthai']==1){
                            echo'Đã Xác Nhận';
                        }elseif($row_donhang['trangthai']==2){
                            echo'Đang Giao Hàng';
                        }elseif($row_donhang['trangthai']==3){
                            echo'Đã Thanh Toán';
                        }else{
                            echo'Đã Hủy';
                        }
                    ?>
                </td>
                <td>
                    <a href="?quanly=quanlythongtincanhan&query=chitiet&id=<?php echo $row_donhang['madonhang'] ?>">
                        <button class="btn btn-primary">Chi tiết</button>
                    </a>
                </td>                      
                <td>
                    <a href="modules/quanlydonhang/xuly.php?madonhang=<?php echo $row_donhang['madonhang'] ?>">
                        <button class="btn btn-primary">Xóa</button>
                    </a>
                </td>                       
            </tr>                    
        </tbody>  
        <?php
            }
        ?>           
    </table>
</div>