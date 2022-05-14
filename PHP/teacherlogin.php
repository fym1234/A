<?php
    SESSION_start();
    $link=mysqli_connect('127.0.0.1','root','','userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link,'utf8mb4');
    $username=$_POST['username'] ;
    $password=$_POST['password'] ;  
    $sqlname = "SELECT *from teacherindex where username = '$username'";
    $nameresult = mysqli_query($link,$sqlname);
    $sql="SELECT * from teacherindex where username='$username' and  password='$password'";
    $result= mysqli_query($link,$sql);
    if(!mysqli_num_rows($nameresult))
    {
       echo  "<script>alert('账号不存在，请先注册')</script>";
       $url = "../login/teacherindex.php";
       echo "<script>";
       echo " window.location.href='$url' "; 
       echo "</script>";
    }
    if(mysqli_num_rows($result)>=1)
    {
        $_SESSION['name']=$username;
        echo "<script>alert('登录成功')</script>";
        header("location:../teacher/teacherinfo.php");
    }
    else
    {
        echo "<script>alert('密码错误')</script>";
        $url = "../login/teacherindex.php";
        echo "<script>";
        echo " window.location.href='$url' "; 
        echo "</script>";
    }
    mysqli_close($link);
?>