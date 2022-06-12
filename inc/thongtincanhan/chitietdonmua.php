<?php  
    if(isset($_GET['query'])=='chitiet'){
        $madonhang= $_GET['id'];
        $sql_lietke_chitiet = " SELECT * FROM tbl_chitiethoadon,tbsanpham,tbl_donhang
                                WHERE tbl_chitiethoadon.idsanpham = tbsanpham.idsanpham
                                AND  tbl_chitiethoadon.madonhang  =tbl_donhang.madonhang 
                                AND  tbl_chitiethoadon.madonhang ='$madonhang'
                                GROUP BY tbl_chitiethoadon.id_chitiethoadon ";
        $query_lietke_chitiet = mysqli_query($conn,$sql_lietke_chitiet);
        $sql_lietke_chitiet1 = " SELECT * FROM tbl_chitiethoadon,tbsanpham,tbl_donhang
                                 WHERE tbl_chitiethoadon.idsanpham = tbsanpham.idsanpham
                                 AND  tbl_chitiethoadon.madonhang  =tbl_donhang.madonhang 
                                 AND  tbl_chitiethoadon.madonhang ='$madonhang'
                                 GROUP BY tbl_chitiethoadon.id_chitiethoadon ";
        $query_chitiet1 = mysqli_query($conn,$sql_lietke_chitiet1);
        $row_chitiet1 = mysqli_fetch_array($query_chitiet1);
    }

?>
        <div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
            <div class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;margin-bottom: 20px;">
                Hiển Thị Chi Tiết Đơn Hàng 
            </div>
            <form method="post" action="?quanly=quanlythongtincanhan&query=xuly">
                <table class = "table table-bordered" style = "text-align: center;font-size:1.6rem;text-transform: capitalize;">
                    <thead>
                        <tr>
                            <th>Stt</th>  
                            <th>Mã sản phẩm</th>  
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th> 
                            <th>Màu sắc</th> 
                            <th>Số Lượng </th> 
                            <th>Giá </th>  
                                                
                        </tr>
                    </thead>
                    <?php

                        $i = 1;   
                        $total = 0 ;        
                        while($row_chitiet = mysqli_fetch_array($query_lietke_chitiet)){
                            $subtotal = $row_chitiet['soluongmua'] * $row_chitiet['gia'];
                            $total += $subtotal;
                        
                    ?>                  
                        <tbody>   
                            <tr style="line-height: 50px;">
                                <td><?php echo $i++ ?></td>  
                                <td><?php echo $row_chitiet['masp']?></td>
                                <td><?php echo $row_chitiet['tensanpham']?></td>
                                <td>
                                    <div class="img__be" style="background-image:url(modules/quanlysanpham/uploads/<?php echo $row_chitiet['anhsanpham']?>);
                                                                background-repeat: no-repeat;
                                                                background-size: contain;
                                                                background-position: center;
                                                                height:50px;">  
                                    </div>               
                                </td>
                                <td><?php echo $row_chitiet['mausac']?></td>
                                <td><?php echo $row_chitiet['soluongmua']?></td>
                                <td><?php echo number_format( $row_chitiet['gia'],0,',','.')?> ₫</td>                                                               
                            </tr> 
                            <input type="hidden" class="" name="xulymadonhang" value="<?php echo $row_chitiet['madonhang'] ?>">
                    <?php
                        }
                    ?>    
                            <tr>
                                <td colspan="8">
                                    <span style="color:#d0011b;">Tổng số tiền thanh toán sản phẩm : </span>
                                    <span style="color:#d0011b;"><?php echo number_format($total,0,',','.')?></span>
                                    <span style="color:#d0011b;font-size:1.4rem;">₫</span>
                                </td>
                            </tr>
                        </tbody>                    
                </table>
                <div class="" style="margin:10px 10px;justify-content:space-between;">
                    <div class="flex" style = "margin: 0 30px;justify-content: space-between;">
                        <div class="">
                            <div class=""style = "font-size:1.6rem;font-weight:500 ;color: #ee4d2d;margin:0 0 5px 0;">
                                Trạng Thái Đơn Hàng :
                            </div>
                            <select name="trangthaidonhang" class="form-control" style="height:32px">
                                <option value="<?php $row_chitiet1['trangthai']?> ">
                                    <?php 
                                        if($row_chitiet1['trangthai']==0){
                                            echo'Đang Chờ Xử Lý';
                                        }elseif($row_chitiet1['trangthai']==1){
                                            echo'Đã Xác Nhận';
                                        }elseif($row_chitiet1['trangthai']==2){
                                            echo'Đang Giao Hàng';
                                        }elseif($row_chitiet1['trangthai']==3){
                                            echo'Đã Thanh Toán';
                                        }else{
                                            echo'Đã Hủy';
                                        }
                                    ?>
                                </option>
                                <option value="0">Đang Chờ Xử Lý</option>
                                <option value="1">Đã Xác Nhận</option>
                                <option value="2">Đang Giao Hàng</option>                 
                                <option value="3">Đã Thanh Toán</option>
                                <option value="4">Đã Hủy</option>
                            </select>   
                        </div>                       
                        <div>
                            <button 
                                class="btn btn-lg" 
                                name="capnhapdonhang" 
                                style="
                                    color:#fff;font-size:14px;
                                    background-color:#ee4d2d;
                                    padding:10px 16px;margin:10px 0">
                                        Cập Nhập Đơn Hàng
                            </button>   
                        </div>                   
                    </div>
                </div>
            </form>
        </div>



