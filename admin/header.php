<?php
    include_once './config.php';
    include_once './fn.php';

    // $sql = "select * from category";
    // $res = my_query($sql);
    // var_dump($res)
?>
<header class="w">
    <div class="head">
        <p class="fl">请假装我是“留言板”，我叫low</p>
        <div class="log-box  fr" style="<?php echo $is?'width:250px':'' ?>">
            <?php if($is) {?>
                <div class="<?php echo $is?'fl':'' ?>">
                    <img src="<?php echo $res[0]['profile'] ?>" class="head-img">
                    <p><?php echo $res[0]['nickname'] ?></p>
                    <a href="./comment.php">我要留言</a>
                </div>
            <?php }else{ ?>
            <a href="./login.php">登录</a>
            <?php } ?>
            <a href="<?php echo $is?'./admin/loginOut.php':'./register.php' ?>"><?php echo $is?'退出':'注册' ?></a>
        </div>
    </div>
    <div class="show-bg w">
        <div class="nav">
            <div class="nav-fa">
            </div>
        </div>
    </div>
</header>
<script src="./js/jquery-1.12.4.js"></script>
<script src="./js/template/template-web.js"></script>
<script>
    $.ajax({
        type:'get',
        url:'./admin/navGet.php',
        dataType:'json',
        success:function(info){
            console.log(info);
            $('.nav-fa').html(template('tmp-nav',{list:info}));
            $('.nav-fa').on('click','a',function(){
                $(this).css('backgroundColor','#bdc4d7').siblings().css('backgroundColor','');
                var id = $(this).attr('data-id');
                $.ajax({
                    type:'get',
                    url:'./admin/commentGet.php',
                    data:{id:id},
                    dataType:'json',
                    success:function(info){
                        console.log(info);
                        $('#content-box').html(template('tmp-comment',{list:info}));
                        // render();
                    }
                })
            })
        }
    })
</script>
<script type="text/template" id="tmp-nav">
    <a href="./index1.php" class="fl">主页</a>
    {{ each list $v }}
    <a href="javascript:;" class="fl" data-id="{{ $v.category_id }}">{{ $v.name }}</a>
    {{ /each }}
</script>