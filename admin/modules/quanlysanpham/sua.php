<?php
    include 'config/config.php';
    $sql_sua_sanpham = "SELECT * FROM tbsanpham WHERE idsanpham = '$_GET[idsanpham]' LIMIT 1 ";
    $query_sua_sanpham = mysqli_query($conn,$sql_sua_sanpham);
?>


<div class="add__danhmuc"> 
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-left">Sửa Sản Phẩm : </h2>
			</div>
			<div class="panel-body">
            <?php
                while ($row = mysqli_fetch_array($query_sua_sanpham)){
            ?>
				<form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['idsanpham'] ?>" enctype="multipart/form-data">
					
					<div class="form-group">
					  <label>Tên sản phẩm :</label>
					  <input type="text" class=" form-control"  name="tensanpham" value="<?php echo $row['tensanpham'];?>">
					</div>
					<div class="form-group">
					    <label>Hình ảnh sản phẩm :</label>
						
                        <div class="img__be" style="background-image:url(modules/quanlysanpham/uploads/<?php echo $row['anhsanpham']?>);
                                                    background-repeat: no-repeat;
                                                    background-size: contain;
                                                    background-position: center;
                                                    height:50px;
                                                    width:50px;">   
							
					    </div>
						<div><?php echo $row['anhsanpham']?> </div>
					    <input type="file" class="form-control"  name="anhsanpham" value="">
					<div class="form-group">
                        <label>Mô tả :</label>
                        <textarea type="text" class="form-control"  name="mota" ><?php echo $row['mota']?></textarea>
						<script>
                            CKEDITOR.replace( 'mota' );
                        </script>
                    </div>
					<div class="form-group">
                        <label>Màu sắc :</label>
                        <input type="text" class="form-control"  name="mausac" value="<?php echo $row['mausac']?>">
                    </div>
					<div class="form-group">
                        <label>Số lượng :</label>
                        <input type="text" class="form-control" name="soluong" value="<?php echo $row['soluong']?>">
                    </div>
					<div class="form-group">
                        <label>Giá Sản Phẩm :</label>
                        <input type="text" class="form-control" name="gia" value="<?php echo $row['gia']?>">
					</div>
					<div class="flex form-group"  >
						<label for="">Danh mục sản phẩm : </label>
						<select name="danhmuc" class="select__danhmuc" style="margin-left:20px ; width:60%;">
					    	<?php
	    		                $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY iddanhmuc ASC";
	    		                $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
	    		                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    			                if($row_danhmuc['iddanhmuc']==$row['iddanhmuc']){
	    		            ?>
	    		                <option selected value="<?php echo $row_danhmuc['iddanhmuc'] ?>" ><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		            <?php
	    			                }else{
	    		            ?>
	    		                <option value="<?php echo $row_danhmuc['iddanhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		            <?php
	    			            }
	    	              	} 
	    		            ?>
	    	            </select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" name="suasanpham" style="width:30%">Lưu</button>
					</div>
				</form>
            <?php
                }
            ?>
			</div>
		</div>
	</div>



