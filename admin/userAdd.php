<?php
    include_once '../config.php';
    include_once '../fn.php';
    $username = $_POST['username'];
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $tel = $_POST['tel'];
    
    $ftmp = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $ext = strrchr($name,'.');
    $newname = 'upload/'.time().rand(1000,9999).$ext;
    move_uploaded_file($ftmp,'../'.$newname);

    $sql = "insert into user (username,password,sex,phonenumber,profile,nickname) 
                    values ('$username','$password','$gender','$tel','$newname','$nickname')";
    echo my_exec($sql);
    
?>