<?php
    $sql_lietke_danhmuc = "SELECT * FROM danhmuc ORDER BY stt ASC" ;
    $query_lietke_danhmuc = mysqli_query($conn,$sql_lietke_danhmuc);
?>

<div>   
    <a href="?action=quanlydanhmuc&query=them">
        <button class="btn btn-primary" style = "margin:20px 0 0;">Thêm danh mục</button>
    </a>
</div>
<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
    <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
        Hiển Thị Danh Mục 
    </span>
    <table class = "table table-bordered" style = " text-align: center; font-size:1.6rem">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Danh Mục </th>
                <th colspan="2" style="text-align:center">Chức năng</th>                           
            </tr>
        </thead>
        <?php
            $i = 1;
            while($row = mysqli_fetch_array($query_lietke_danhmuc)){
        ?>
        <tbody>   
            <tr>
                <td><?php echo $i++  ?> </td>
                <td><?php echo $row['tendanhmuc']  ?></td>
                <td>
                    <a href="?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row['iddanhmuc'] ?>">
                        <button class="btn btn-primary">Sửa</button>
                    </a>
                </td>                      
                <td>
                    <a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['iddanhmuc'] ?>">
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
