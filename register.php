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
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <!-- 导入头部结构文件 -->
<?php include_once './admin/header.php' ?>


<div class="login w">
    <form action="" id="form1">
        <div>
            <span>用户名：</span>
            <input type="text" class="username text-input" name="username">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <span>昵称：</span>
            <input type="text" class="nickname text-input" name="nickname">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <span>密码：</span>
            <input type="password" class="password text-input" name="password">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <span>再次输入密码：</span>
            <input type="password" class="password2 text-input" name="password2">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <span>性别：</span>
            <input type="radio" id="male" value="male" class="gender radio-input" name="gender" checked>
            <label for="male">男</label>
            <input type="radio" id="female" value="female" class="gender radio-input" name="gender">
            <label for="female">女</label>
            <input type="radio" id="other" value="other" class="gender radio-input" name="gender">
            <label for="other">其他</label>
        </div>
        <div>
            <span>手机号：</span>
            <input type="text" class="tel text-input" name="tel">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <span>头像：</span>
            <input type="file" class="file" name="file">
            <p class="" style="display:none">用户名输入错误!</p>
        </div>
        <div>
            <input type="button" class="btn-login" value="注册">
        </div>
    </form>
</div>
<div class="mybox"></div>

</body>
</html>
<script src="./js/jquery-1.12.4.js"></script>
<script>
    //验证用户名是否输入
    $('.username').blur(function(){
        if($(this).val().trim()==''){
            $(this).next().show().addClass('warning').text('用户名不能为空！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        $.ajax({
            type:'get',
            url:'./admin/userCheck.php',
            data:{
                username:$(this).val().trim()
            },
            dataType:'json',
            success:function(info){
                console.log(info);
                if(info != false){
                    $('.username').next().show().addClass('warning').text('此用户名已存在！');
                }else{
                    $('.username').next().hide().removeClass('warning');

                }
            }
        })
    })
    //昵称验证不为空
    $('.nickname').blur(function(){
        $('.username').trigger('blur');
        if($(this).val().trim()==''){
            $(this).next().show().addClass('warning').text('昵称不能为空！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        
    })
    // 密码验证不为空，并且与重复密码相同
    $('.password').blur(function(){
        $('.username').trigger('blur');
        $('.nickname').trigger('blur');
        if($(this).val()==''){
            $(this).next().show().addClass('warning').text('密码不能为空！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        if($('.password2').val()!=''&& $('.password2').val()!=$(this).val()){
            $(this).next().show().addClass('warning').text('两次输入密码不一致！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
    })
    // 验证重复输入密码是否一致
    $('.password2').blur(function(){
        $('.username').trigger('blur');
        $('.nickname').trigger('blur');
        $('.password').trigger('blur');
        if($(this).val()==''){
            $(this).next().show().addClass('warning').text('密码不能为空！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        if($('.password').val()!=$(this).val()){
            $(this).next().show().addClass('warning').text('两次输入密码不一致！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        })
    // 验证手机号格式是否正确
    $('.tel').blur(function(){
        $('.username').trigger('blur');
        $('.nickname').trigger('blur');
        $('.password').trigger('blur');
        $('.password2').trigger('blur');
        if($(this).val()==''){
            $(this).next().show().addClass('warning').text('手机号不能为空！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        var test = /^1\d{10}$/;
        if(!test.test($(this).val())){
            $(this).next().show().addClass('warning').text('手机号格式不正确！');
            return false;
        }else{
            $(this).next().hide().removeClass('warning');
        }
        })
  // 验证头像是否上传
    function checkpic(){
        $('.nickname').trigger('blur');
        $('.password').trigger('blur');
        $('.password2').trigger('blur');
        $('.tel').trigger('blur');
        if($('.file').val()==''){
            $('.file').next().show().addClass('warning').text('头像不能为空！');
            return false;
        }else{
            $('.file').next().hide().removeClass('warning');
        }
    }
    //点击提交发送ajax请求
    $('.btn-login').click(function(){
        // alert(111);
        var form= $('#form1')[0];
        var formdata = new FormData(form);
        $.ajax({
            type:'post',
            url:'./admin/userAdd.php',
            data:formdata,
            contentType:false,
            processData:false,
            beforeSend:function(){
                checkpic();
                if($('.username').val().trim()==''){
                    return false;
                }
                console.log($('.warning').length);
                if($('.warning').length!=0){
                    return false;
                }
            },
            success:function(info){
                if(info==1){
                    console.log(info);
                    alert('注册成功！');
                    window.location.assign("./login.php");
                }else{
                    alert('注册失败！');
                }
            }
        })
    })
   
</script>