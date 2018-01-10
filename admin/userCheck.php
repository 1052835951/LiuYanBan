<?php
    include_once '../config.php';
    include_once '../fn.php';

    $username = $_GET['username'];
    $sql = "select * from user where username='$username'";
    $info = my_query($sql);
    echo json_encode($info);
?>