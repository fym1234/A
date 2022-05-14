<?php
    session_start();
    $link=mysqli_connect('127.0.0.1', 'root', '', 'userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link, 'utf8mb4');
    $ids =$_POST['check'];
    $ids=implode(",",$ids);
    $sql = "DELETE from course where id in($ids)";
    $result = mysqli_query($link,$sql);
    if($result&&mysqli_affected_rows($link)>0)
    {
        echo '<script>alert("删除成功")</script>';
        $url = "./course.php";
        echo "<script>";
        echo " window.location.href='$url' "; 
        echo "</script>";
    }
?>