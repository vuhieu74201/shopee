
<?php
    session_start();
    if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }else{
        $dangxuat = '';

    }
    if($dangxuat == 'dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/base.css" >
    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    
    <style>
        .add__danhmuc{
            margin: 20px auto;
            width: 60%;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 4px;
        }
        .btn{
            font-size: 1.6rem;
        }
        .form-control{
            font-size: 1.4rem;
        }
        .form-control:focus{
            outline: none;
            box-shadow: none;
            border: 1px solid #ced4da;
        }
        .footer-item__link{
            text-decoration: none;
        }
        .btn:focus{
            box-shadow: none;
        }
    </style>
</head>
<body>
    <?php
        include("config/config.php");
        include("modules/header.php");
    ?>
    <div class="app">
        <div class="content" style="margin:0 10px;">
            <div class="flex row">           
                <?php
                    include("modules/menu.php");                      
                    include("modules/main.php");                   
                ?>             
            </div>      
        </div>
    </div>
        <?php
            include("modules/footer.php"); 
        ?>
    
</body>
</html>