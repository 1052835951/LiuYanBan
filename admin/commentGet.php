<?php
    include_once '../config.php';
    include_once '../fn.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id='%';
    }
    // echo $id;
    $sql = "select comment.*,user.* from comment join user 
            on comment.user_id=user.user_id 
            where category like '$id'
            order by comment_id DESC";
    // echo 111;
    // var_dump(my_query($sql));
    // $info = my_query($sql);
    // var_dump($info);
    $res = json_encode(my_query($sql),JSON_UNESCAPED_UNICODE);
    echo $res;
?>