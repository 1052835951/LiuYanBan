<?php
    include_once '../config.php';
    include_once '../fn.php';

    $id = $_GET['id'];
    $sql = "delete from comment where comment_id='$id'";

    if(my_exec($sql)){
        echo 1;
    }else{  
        echo 2;
    }
    
    
?>