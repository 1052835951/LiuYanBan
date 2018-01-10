<?php
    include_once './config.php';
    include_once './fn.php';
    session_start();
    $is = isset($_SESSION['id']);
    if($is){
    $id = $_SESSION['id'];
    $sql = "select * from user where user_id='$id'";
    $res = my_query($sql);
    }else{
        header('location:./login.php');
    }
    $comment_id = $_GET['id'];
    $sql1 = "select comment.*,user.* from comment join user 
                on comment.user_id=user.user_id where comment_id like '$comment_id'";
    $info = my_query($sql1);
    $info = $info[0];
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
    <link rel="stylesheet" href="./css/detail.css">
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
    </style>
</head>
<body>
<!-- 导入头部结构文件 -->
<?php include_once './admin/header.php' ?>

<div class="detail-content w">
    <div class="user-box" style="display:<?php echo $id==$info['user_id']?'block':'none' ?>">
        <a href="javascript:;" class="btn-del" data-id="<?php echo $info['comment_id'] ?>">删除</a>
        <a href="./comment.php?id=<?php echo $info['comment_id'] ?>">修改</a>
    </div>
    <div class="content-view" style="margin-top:<?php echo $id==$info['user_id']?'':'80px' ?>">
        <p class="title"><?php echo $info['comment_title'] ?>
        </p>
        <div class="author">
            <span>作者：</span>
            <a href="$"><?php echo $info['nickname'] ?></a>
            <span>发布时间：</span>
            <span><?php echo substr($info['comment_time'],0,10 ) ?></span>
        </div>
        <div class="greadiant"></div>
        <div class="content-text"><?php echo $info['content'] ?></div>
        <div class="greadiant"></div>
    </div>
</div>
</body>
</html>
<script src="./js/jquery-1.12.4.js"></script>
<script>
    $('.btn-del').click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
            type:'get',
            url:'./admin/commentDel.php',
            data:{id:id},
            success:function(info){
                console.log(info);
                if(info == 1){
                    window.location.assign("./index1.php");
                }
            }
        })
    })
</script>