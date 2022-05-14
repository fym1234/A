<?php
   session_start();
   $link=mysqli_connect('127.0.0.1', 'root', '', 'userinformation') or die('连接或者选择数据库失败');
   mysqli_set_charset($link, 'utf8mb4');
   $sql = "SELECT *from teacher where id = {$_GET['id']}";
   $result = mysqli_query($link,$sql);
   if(!$result)
   {
      exit('查询SQL语句失败。错误信息:'.mysqli_error($link));
   }
   else
      $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update</title>
    <style>
     .content
     {
        width:500px;
        height:500px;
        border:2px solid #a5b6c8;background:#eef3f7;
        margin-left: 500px;
        margin-top: 100px;
     }
     .header
     {
        width:100%;
        height:50px;
        border:2px solid black;
        text-align: center; 
               
     }
     .h
     {
        font-size: 27px;
        font-style: normal;
        font-family: fangsong;
        color: #9f628d;
        font: blod;
        font-weight: bolder;
     }
     .body
     {
        font-size: 18px;
        font-weight: 600;
        font-family: fangsong;
     }
     .form
     {
        margin-left: 145px;
        margin-top: 30px;
     }
    .submit
    {
    position: relative;
    background: #00CCFF;
    border: none;
    color: white;
    padding: 6px 88px;
    }
    </style>
</head>
<body>
    <div class="content">
      <div class="header">
      <h class="h">修改选课信息</h>
      </div>
     <div class="body">
     <form class="form"action="" method="POST">   
         课  程  名<input style="height:20px"type="text"name="cname"value="<?php echo $row['cname']; ?>"><br><br>
         课程教师<input style="height:20px"type="text"name="cteacher"value="<?php echo $row['teacher']; ?>"><br><br>
        <input class="submit"type="submit" name="submit" id="submit"value="确认">     
        </form>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST["submit"]))
   {
      $cname = $_POST["cname"];
      $cteacher = $_POST["cteacher"]; 
      $sql = "UPDATE teacher SET cname='$cname',teacher='$cteacher'where id = {$_GET['id']}";
      $result = mysqli_query($link,$sql);
   if($result)
   {
      echo '<script> alert("修改成功")</script>';
      $url = "./teacher.php";
      echo "<script>";
      echo " window.location.href='$url' "; 
      echo "</script>";
   }
   else
   {
      exit('修改学生信息sql语句执行失败。错误信息：' . mysqli_error($link));
   }
}
 ?>
