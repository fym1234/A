<!DOCTYPE html>
<html lang="en">
<link href="index.css" type="text/css" rel="Stylesheet"/>
<head>
    <title>用户登录</title>
    <meta charset="utf-8">
    <style>
        body 
        {
            background-image: url("../jpg/1.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
        }
        .code{      
          background-image:url(w1.jpg);      
          font-family:Arial;      
          font-style:italic;      
          color:Red;      
          border:0;      
          padding:2px 3px;      
          letter-spacing:3px;      
          font-weight:bolder;      
}  
    </style> 
</head>
<body onload="createCode();">
    <div class='all'>
        <div class='grey'>
            <span class="left">
                <img src="../jpg/2.1.jpg" class="hdxh">
            </span>
            <span class="right">
                <p class = 'p' align = "center">河北大学学生信息管理系统</p>
                <form align="center" action="../php/teacherlogin.php" method="POST">
                    <table>
                        <div>
                            <label class = 'p'>账号</label>
                            <input type="text" name="username"id="username" style="height: 28px;">
                        </div>
                        <br>
                        <div>
                            <label class = 'p'">密码</label>
                            <input type="password" name="password"id="password"style="height: 28px;">
                        </div>
                        <br>
                        <input class="submit"type="submit" value="提交" style="font-size: 20px;">
                        <br>
                        <a href="/pages/logins/register/teacher_register.php">还没有账号，请注册 </a>
                    </table>
                </form>
            </span>
        </div>
    </div>   
</body>
<script>
    function confirmName()
    {
    var name=document.getElementById("username");
    name.onblur=function()
    {
    if((name.value).length!=0){
      reg=/^[0-9]{6,16}$/g;
      if(!reg.test(name.value)){
        alert("对不起，输入的用户名限6-16个数字 ");
      } 
    }
    else{
        alert("输入账号不能为空");
    }

  };
}
function confirmPassword()
{
  var password=document.getElementById("password");
  password.onblur=function()
  {
    if((password.value).length!=0){
      reg=/^(\w){6,20}$/;
      if(!reg.test(password.value)){ 
        alert("对不起，您输入的密码格式不正确!");
      }
    }
  };
}
window.onload=function()
{
  confirmName();
  confirmPassword();
};
</script>
</html>