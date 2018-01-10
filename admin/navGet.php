<?php

    include_once '../config.php';
    include_once '../fn.php';

    $sql = "select * from category";
    $res = my_query($sql);
    // var_dump($res);
    echo json_encode($res);

?>