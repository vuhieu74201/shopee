<?php
    session_start();
    include 'config/config.php';

    //session_destroy();
    //unset('dangnhap');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        if($taikhoan =='' || $matkhau ==''){
            // nhap du thong tin
        }else{
            $sql = "SELECT * FROM tbadmin WHERE ten_admin ='".$taikhoan."' AND password = '".$matkhau."' limit 1";
            $query = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($query);
            $row_login = mysqli_fetch_array($query);
            if($count >0){           
                $_SESSION['dangnhap'] = $row_login['fullname'];
                $_SESSION['id_admin'] = $row_login['id_admin'];
                header("Location:dashboard.php");
            }else{
                //sai mat khau taikhoan
                echo'<script>alert("Tài khoản đăng nhập không đúng !")</script>';
            }     
        }           
    }  
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>            
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .btn-text:hover{
            color: #fff;
        }
        .btn:focus{
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-icon">
            <a href="" class="shopee-logo">
                <i class="fab fa-shopify"></i>
                <span class="logo-text"> Shopee</span> 
            </a>
            <span class="header-text"> Đăng nhập </span> 
        </div>
    </div>
    <div class=" form__login ">   
        <div class="form__login-container">
            <div class="row ">
                <div class="flex logo__img col-lg-8">
                    <img src="../img/login/1.png" alt="">
                </div>
                <div class="col-lg-4">   
                    <div class="loginform">
                        <form action="" class="login" method="post"> 
                            <div>
                                <span class="form-text">
                                    Đăng nhập
                                </span>
                            </div> 
                            <div class="form-group first">
                              <label for="username">Tài Khoản :</label>
                              <input type="text" class="form-control" placeholder="your-name" name="username">
                            </div>
                            <div class="form-group last mb-3">
                              <label for="password">Mật khẩu :</label>
                              <input type="password" class="form-control" placeholder="Your Password" name="password">
                            </div>                       
                            <div class="d-sm-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-3 mb-sm-0">
                                    <span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked">
                                <div class="control__indicator"></div>
                              </label>
                              <span class="ml-auto">
                                  <a href="#" class="forgot-pass">
                                      Quên mật khẩu ?
                                    </a>
                                </span> 
                            </div>   
                            <button name="dangnhap" class="btn py-4 btn__primary btn-text" style="margin-bottom: 20px;">Đăng nhập</button> 
                            <!--
                            <a href="dangky.php" class="btn py-4 btn__primary btn-text">
                                Đăng ký                                
                            </a>
                            -->
                        </form>  
                    </div>          
                </div>                                 
            </div>                
        </div>           
    </div>
</body>
</html>