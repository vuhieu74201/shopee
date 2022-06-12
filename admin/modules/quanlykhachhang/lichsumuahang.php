<?php  
    if(isset($_GET['query'])=='chitiet'){
        $idnguoidung= $_GET['idnguoidung'];
        $sql_chitiet1 = " SELECT *  FROM tbnguoidung,tbl_chitiethoadon,tbl_donhang
                                    WHERE tbl_chitiethoadon.idnguoidung = tbnguoidung.idnguoidung
                                    AND tbl_chitiethoadon.madonhang = tbl_donhang.madonhang
                                    AND  tbl_chitiethoadon.idnguoidung ='$idnguoidung' " ;

        $query_lietke_chitiet1 = mysqli_query($conn,$sql_chitiet1);
        $row_chitiet1 = mysqli_fetch_array($query_lietke_chitiet1);  

		$sql_lietke_chitiet = " SELECT * FROM tbl_chitiethoadon,tbsanpham,tbl_donhang
										WHERE tbl_chitiethoadon.idsanpham = tbsanpham.idsanpham
										AND  tbl_chitiethoadon.madonhang =tbl_donhang.madonhang
										AND  tbl_chitiethoadon.idnguoidung ='$idnguoidung'
										GROUP BY tbl_chitiethoadon.id_chitiethoadon ";
		$query_lietke_chitiet = mysqli_query($conn,$sql_lietke_chitiet);
	}
	 
?>
<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
	<div class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
		Hiển Thị Lịch Sử Mua Hàng
	</div>
		<div class="flex " style="margin:10px 10px;justify-content:space-between;">
			<div style="text-transform: capitalize;">
				<div class="danhmuc_text" style = "font-size:1.6rem;font-weight:500 ;color:#5c5c5c;">
					Tên Khách Hàng : <?php echo $row_chitiet1['fullname']?>
				</div>
				<div class="danhmuc_text" style = "font-size:1.6rem;font-weight:500 ;color:#5c5c5c;">
					Số điện thoại: <?php echo $row_chitiet1['sdt']?>
				</div>   
				<div class="danhmuc_text" style = "font-size:1.6rem;font-weight:500 ;color:#5c5c5c;">
					Địa chỉ : <?php echo $row_chitiet1['diachi']?>
				</div>
				<div class="danhmuc_text" style = "font-size:1.6rem;font-weight:500 ;color:#5c5c5c;">
					Mã đơn hàng: <?php echo $row_chitiet1['madonhang']?>
				</div>
				<div class="danhmuc_text" style = "font-size:1.6rem;font-weight:500 ;color:#5c5c5c;">
					Hình thức thanh toán :  <?php 
											if($row_chitiet1['hinhthucthanhtoan']==0){
												echo'Thanh toán sau khi nhận hàng';
											}else{
													echo'Thanh toán qua ATM';
											}
											?>
				</div>
				
			</div>
		</div>
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
					<th>Ngày đặt </th>  
					<th>Trạng Thái Đơn Hàng </th>                                              
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
						<td ><?php echo number_format( $row_chitiet['gia'],0,',','.')?> ₫</td>  
						<td><?php echo $row_chitiet['ngaymua']?></td>  
						<td>
							<div style="color:#ee4d2d">
								<?php 
									if($row_chitiet['trangthai']==0){
										echo'Đang Chờ Xử Lý';
									}elseif($row_chitiet['trangthai']==1){
										echo'Đã Xác Nhận';
									}elseif($row_chitiet['trangthai']==2){
										echo'Đang Giao Hàng';
									}elseif($row_chitiet['trangthai']==3){
										echo'Đã Thanh Toán';
									}else{
										echo'Đã Hủy';
									}
								?>          

							</div>
						</td>                                                 
					</tr> 
					<input type="hidden" class="" name="xulymadonhang" value="<?php echo $row_chitiet['madonhang'] ?>">
			<?php
				}
			?>    
				<tr>
					<td colspan="8">
						<span style="color:#ee4d2d">Tổng số tiền thanh toán sản phẩm : </span>
						<span style="color:#ee4d2d"><?php echo number_format($total,0,',','.')?></span>
						<span style="color:#ee4d2d;font-size:1.4rem;">₫</span>
					</td>
				</tr>
				</tbody>                    
		</table>
</div>




