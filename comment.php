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
    $comid = isset($_GET['id']);
    if($comid){
        $id1 = $_GET['id'];
        $sql1 = "select comment.*,user.* from comment join user 
        on comment.user_id=user.user_id where comment_id like '$id1'";
        $info = my_query($sql1)[0];
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
    <link rel="stylesheet" href="./css/comment.css">
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
    .text-input{
        padding-left:20px;
    }
    #edit-textarea{
        background-color:#fff;
    }
    .date{
        width:300px;
        margin-right:300px;
    }
    </style>
</head>
<body>
<!-- 导入头部结构文件 -->
<?php include_once './admin/header.php' ?>

<div class="comment-content">
   <form action="./admin/commentSave.php" method="post">
   <input type="hidden" name="id" value="<?php echo $comid?$info['comment_id']:'' ?>">
   <div>
        <span>标题：</span>
        <input type="text" class="text-input" name="title" value="<?php echo $comid?$info['comment_title']:'' ?>">
    </div>
    <div>
        <span>分类：</span>
        <select name="cate" id="cate-select" class="text-input" data-id="<?php echo $comid?$info['category']:'' ?>">
        </select>
    </div>
    <div>
        <div id="edit-textarea"></div>
        <textarea name="comment" id="content" cols="30" rows="10" style="display:none">
            <?php echo $comid?$info['content']:'' ?>
        </textarea>
    </div>
    <div>
        <span>日期：</span>
        <input type="date" class="text-input date" name="date" value="<?php echo $comid?substr($info['comment_time'],0,10):'' ?>">
    </div>
    <div>
        <input type="submit" value="提    交" class="btn-submit">
    </div>
   </form>
</div>
</body>
</html>
<script src="./js/jquery-1.12.4.js"></script>
<script src="./js/wangEditor.min.js"></script>
<script src="./js/nprogress.js"></script>
<script src="./js/template/template-web.js"></script>
<script>
    // 生成富文本编辑器
    var E = window.wangEditor;
    var editor2 = new E('#edit-textarea');
    editor2.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
           $('textarea').val(html);
        }
    editor2.create();
    editor2.txt.html($('textarea').val());

    // 动态生成下拉列表
    $.ajax({
        type:'get',
        url:'admin/navGet.php',
        dataType:'json',
        success:function(info){
            console.log(info);
            $('#cate-select').html(template('tmp-cate',{list:info}));
        }
    })
</script>
<script type="text/template" id="tmp-cate">
    {{ each list $v }}
    <option value="{{ $v.category_id }}">{{ $v.name }}</option>
    {{ /each }}
</script>