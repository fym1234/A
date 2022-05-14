<?php
    session_start();
    $link=mysqli_connect('127.0.0.1', 'root', '', 'userinformation') or die('连接或者选择数据库失败');
    mysqli_set_charset($link, 'utf8mb4');
    $adminname=$_POST['adminname'] ;
    $password=$_POST['password'] ;
    //对加密密码验证
    // password_verify()
    $sqlname = "SELECT *from adminindex where adminname = '$adminname'";
    $nameresult = mysqli_query($link, $sqlname);
    $sql="SELECT * from adminindex where adminname=$adminname and  password=$password";
    $result= mysqli_query($link, $sql);
    if (!mysqli_num_rows($nameresult)) 
    {
        echo  "<script>alert('账号不存在，请先注册')</script>";
        $url = "../register/Admin_register.html";
        echo "<script>";
        echo " window.location.href='$url' ";
        echo "</script>";
    }
    if (mysqli_num_rows($result)>=1) {
        $_SESSION['manage']['name']=$adminname;
        echo "<script>alert('登录成功')</script>";
        header("location:../admin/admin.php");
    } else {
        echo "<script>alert('密码错误')</script>";
        $url = "../login/Adminindex.php";
        echo "<script>";
        echo " window.location.href='$url' ";
        echo "</script>";
    }
    mysqli_close($link);
