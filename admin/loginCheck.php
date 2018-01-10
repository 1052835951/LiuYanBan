<?php
    include_once '../config.php';
    include_once '../fn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user where username='$username'";

    $res = my_query($sql);
    if($password == $res[0]['password']){
        session_start();
        $_SESSION['id'] = $res[0]['user_id'];
        echo 1;
    }else{
        echo 2;
    }
    // var_dump($res);
?>