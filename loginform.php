<?php
    session_start();
    include 'admin/config/config.php';
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        if($taikhoan =='' || $matkhau ==''){
        //tk ko de trong
        }else{
            $sql = "SELECT * FROM tbnguoidung WHERE taikhoan ='".$taikhoan."' AND matkhau = '".$matkhau."' limit 1";
            $query = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($query);
            $row_login = mysqli_fetch_array($query);
            if($count >0){           
                $_SESSION['dangnhap'] = $row_login['fullname'];
                $_SESSION['idnguoidung'] = $row_login['idnguoidung'];     
               
                header("Location:index.php");               
            }else{ 
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
    <title>LogInForm</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .btn-block:hover{
            color: #fff;
        }
        .btn__primary:hover{
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-icon">
            <a href="index.php" class="shopee-logo">
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
                    <img src="img/login/1.png" alt="">
                </div>
                <div class="col-lg-4">   
                    <div class="loginform">
                        <form action="" autocomplete="off" class="login" method="post"> 
                            <div>
                                <span class="form-text">
                                    Đăng nhập
                                </span>
                            </div> 
                            <div class="form-group first">
                              <label for="username">Tài Khoản :</label>
                              <input type="text" class="form-control" required="" name="taikhoan">
                            </div>
                            <div class="form-group last mb-3">
                              <label for="password">Mật khẩu :</label>
                              <input type="password" class="form-control" required="" name="matkhau">
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
                            <input type="submit" name="dangnhap"  class="btn py-4 btn__primary btn-text" style="font-size:1.4rem;" value="Đăng nhập">                            
                            <span class="text-center my-4 d-block">Hoặc</span>                       
                            <div class="">
                            <a href="dangky.php" class="btn py-4 btn__primary" style="margin:5px 0;">                                  
                                <span class="btn-text">Đăng ký</span>
                            </a>
                            <a href="#" class="btn btn-block py-4">
                                <span class="mr-3">
                                    <i class="fab fa-facebook"></i>
                                    <span class="btn-text">Login with facebook</span>
                                </span> 
                            </a>
                            <a href="#" class="btn btn-block py-4"> 
                                <span class="mr-3">
                                    <i class="fab fa-google"></i>
                                    <span class="btn-text">Login with Google</span>                                   
                                </span> 
                            </a>
                            </div>
                        </form>              
                    </div>          
                </div>                                 
            </div>                
        </div>           
    </div>
</body>
</html>