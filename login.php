<?php

include_once './config.php';
include_once './fn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<!-- 导入头部结构文件 -->
<?php include_once './admin/header.php' ?>

<div class="login w">
    <div class="box-left"></div>
    <div class="box-right"></div>
    <form action="">
        <div>
            <p class="font-login">Login</p>
            <div class="under-line"></div>

        </div>
        <div>
            <p>用户名<span> Username</span>：</p>
            <input type="text" class="username text-input" name="username">
        </div>
        <div>
            <p>密码<span> Password</span>：</p>
            <input type="password" class="password text-input" name="password">
        </div>
        <div>
            <input type="button" class="btn-login" value="登录">
        </div>
    </form>
</div>

<div class="join-us">
    <p class="fr">还不是会员？<a href="./register.php">加入我们</a></p>
</div>
<div class="mybox"></div>
</body>
</html>
<script src="./js/jquery-1.12.4.js"></script>
<script>
    $('.btn-login').click(function(){
        var username = $('.username').val().trim();
        var password = $('.password').val();
        $.ajax({
            type:'post',
            url:'./admin/loginCheck.php',
            data:{
                username:username,
                password:password
            },
            success:function(info){
                console.log(info);
                $('.mybox').html(info);
                if(info==1){
                    window.location.assign("./index1.php");
                }else{
                    alert('账号或密码错误！');
                }
            }
        })
    })
</script>