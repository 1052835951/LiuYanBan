<?php
    include_once '../config.php';
    include_once '../fn.php';
    var_dump($_POST);
    session_start();
    $userid = $_SESSION['id'];
    echo $userid;
    $title = $_POST['title'];
    $cate = $_POST['cate'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];
    $id = $_POST['id'];
    if(empty($id)){
         $sql = "insert into comment (comment_title,content,category,comment_time,user_id) 
                        values ('$title','$comment','$cate','$date','$userid')";
    }else{
        $sql = "update comment set comment_title='$title',content='$comment',category='$cate',comment_time='$date',user_id='$userid' where comment_id='$id'";
    }
   
    var_dump(my_exec($sql));
    header('location: ../index1.php');
?>