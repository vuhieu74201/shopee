
<div class="add__danhmuc"> 
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-left">Thêm Sản Phẩm : </h2>
			</div>
			<div class="panel-body">
				<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tên sản phẩm :</label>
						<input type="text" class="form-control" autocomplete="off"   name="tensanpham" value="">
					</div>
					<div class="form-group">
						<label>Hình ảnh sản phẩm :</label>
						<input type="file" class="form-control"  autocomplete="off"  name="anhsanpham" value="">
					</div>
					<div class="form-group">
						<label>Mô tả :</label>
						<textarea type="text" class="form-control"  autocomplete="off"  name="mota" value=""></textarea>
						<script>
                            CKEDITOR.replace( 'mota' );
                        </script>
					</div>
					<div class="form-group">
						<label>Màu sắc :</label>
						<input type="text" class="form-control" autocomplete="off"  name="mausac" value="">
					</div>
					<div class="form-group">
						<label>Số lượng :</label>
						<input type="text" class="form-control" autocomplete="off"  name="soluong" value="">
					</div>
					<div class="form-group">
						<label>Giá Sản Phẩm :</label>
						<input type="text" class="form-control" autocomplete="off"  name="gia" value="">
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
					<div class="form-group flex justify-content-between" style="margin-top:40px">
						<button class="btn btn-primary " name="themsanpham" style="width:30%">Lưu</button>
						<a  href="" class="btn btn-primary " name="canphamsanpham" style="width:30%">Cập nhập</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>


