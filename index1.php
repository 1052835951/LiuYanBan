
<?php
    include_once './config.php';
    include_once './fn.php';
    session_start();
    $is = isset($_SESSION['id']);
    if($is){
    $id = $_SESSION['id'];
    $sql = "select * from user where user_id='$id'";
    $res = my_query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/jquery-1.12.4.js"></script>
    <script sec="./js/template/template-web.js"></script>
    <style>
    .log-box .head-img{
        display: inline-block;
        height: 40px;
        width: 40px;
        border-radius: 50%;
        text-align:center;
        margin-right:20px;
        float:left;
    }
    .log-box p {
        display:inline-block;
        float:left;
        margin-right:20px;
    }
    .log-box a {
        margin-right:20px;
    }
    .index-content li .content {
    padding: 10px;
    font-size: 14px;
    overflow: hidden;
}
    </style>
</head>
<body>
<!-- 导入头部结构文件 -->
<?php include_once './admin/header.php' ?>

<div class="index-content w">
    <ul id="content-box">
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span>王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span>王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span>王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span>王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span>王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
        <li>
            <p class="title">这是标题</p>
            <p class="content">这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
            <div class="author">
                <span>作者：</span><span class="author-name">王老五</span>
                <img src="./img/default.jpg" alt="">
            </div>
        </li>
    </ul>
</div>
<div class="mybox"></div>
</body>
</html>
<script src="./js/jquery-1.12.4.js"></script>
<script sec="./js/template/template-web.js"></script>
<script>
    function render(){
        $.ajax({
            type:'post',
            url:'./admin/commentGet.php',
            dataType:'json',
            success:function(info){
                console.log(info);
                $('.mybox').html(info);
                $('#content-box').html(template('tmp-comment',{list:info}));
                $('#content-box').on('click','li',function(){

                })

            }
        })
    }
    render();
</script>
<script type="text/template" id="tmp-comment">
    {{ each list $v }}
    <li data-id="{{ $v.comment_id }}">
        <a href="./detail.php?id={{ $v.comment_id }}" style="width:100%;height:100%">
            <p class="title">{{ $v.comment_title }}</p>
            <div class="shadow-box"></div>
            <div class="content">{{# $v.content }}</div>
            <div class="author">
                <span>作者：</span><span>{{ $v.nickname }}</span>
                <img src="{{ $v.profile }}" alt="">
            </div>
        </a>
    </li>
    {{ /each }}
</script>