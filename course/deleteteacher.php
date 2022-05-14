<?php
 $link=mysqli_connect('127.0.0.1', 'root', '', 'userinformation') or die('连接或者选择数据库失败');
 mysqli_set_charset($link, 'utf8mb4');
 $sql = "DELETE from teacherinfo where id = {$_GET['id']}";    
 $result = mysqli_query($link,$sql);
 $row = mysqli_fetch_assoc($result);     
 if($result&&mysqli_affected_rows($link)>0)
 {
    echo '<script>alert("删除成功")</script>';
    $url = "./teacher.php";
    echo "<script>";
    echo " window.location.href='$url' "; 
    echo "</script>";
 }
?>