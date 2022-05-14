<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <link href="../admin/admin.css" type="text/css" rel="Stylesheet" />
<head>
    <meta charset="utf-8">
    <title>选课信息界面</title>
</head>
<?php
        $link=mysqli_connect('127.0.0.1', 'root', '', 'userinformation') or die('连接或者选择数据库失败');
        mysqli_set_charset($link, 'utf8mb4');
        $page=$_GET["page"]??1;//得到页数
        $sql = "SELECT count(*) from sc";
        $totalresult=mysqli_query($link,$sql);
        $total=mysqli_fetch_row($totalresult);
        $num = 7;
        $totalpage=ceil($total[0]/$num);//总页数
        if($page>$totalpage)
        {
            $page=$totalpage;
        }
        if($page<1)
        {
            $page=1;
        }
        $start = ($page-1)*7;
        $sql = "SELECT * FROM sc  limit $start,7" ;
        $result = mysqli_query($link, $sql);
    ?>
<body>
    <div id="container">
        <div id="header">
            <p class="p_font">河北大学学生信息管理系统</p>
            <a href="../login/Adminindex.php"style="float: right;margin-top: 47px;"<?php session_destroy();?>>>注销</a>
        </div>
        <div id="content" >
        <div id="left">
            <ul>
                <li><a href="../admin/admin.php">学生信息管理</a></li>
                <li><a href="./course.php">选课信息管理</a></li>
                <li><a href="./teacher.php">教师信息管理</a></li>
                <li><a href="../admin/studentindex.php">用户登录管理</a></li>
            </ul>
        </div>
        <div id="right">
            <div class="box">
                <div class="boxhead">
                <p style="font-size: 18px;color: orange;font-family: emoji;letter-spacing: 8px;font-style: normal;">信息查询</p>
                </div>
                <div class="bar1">
                    <a href="./insertcourse.php"><button class="button">添加选课信息</button></a>
                    <form action="searchcourse.php" method="post">
                    <select name="key"class="select">
                            <option value="sname">姓 名</option>
                            <option value="cno">课程号</option>
                            <option value="cname">课程名</option>
                            <option value="cteacher">课程教师</option>
                            <option value="grade">成 绩</option>
                        </select>
                        <input class="bar1_input"type="text"name="keywords" placeholder="请输入您要搜索的内容...">
                        <button class="bar1_button"type="submit"name="submit"value="提交查询"></button>
                    </form>
    
                </div>
            </div>
                
                <div>
                    <form action="checkdeletecourse.php"method="POST">
                    <table class="mytable">
                        <tr>
                            <th class="th">序号</th>
                            <th class="th">姓名</th>
                            <th class="th">课程号</th>
                            <th class="th">课程名</th>
                            <th class="th">课程教师</th>
                            <th class="th">分数</th>
                            <th class="th">操作</th>
                            <th class="th"><input type="checkbox" id="allChecks"name="allChecks" onclick="ckAll()">全选</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $html=<<<A
                            <tr>
                            <td class="td">{$row['id']}</td> 
                            <td class="td">{$row['sname']}</td>
                            <td class="td">{$row['cno']}</td>
                            <td class="td">{$row['cname']}</td>
                            <td class="td">{$row['cteacher']}</td>
                            <td class="td">{$row['grade']}</td>
                                    <td class="td">
                                                   <a href="./updatecourse.php ? id={$row['id']} ">修改</a>
                                                   <a onclick = "javascript:if(!confirm('确认要删除选择的信息吗?')){return false;}"href="./deletecourse.php ? id={$row['id']} ">删除</a></td>
                                    <td class="td"><input type="checkbox"  id = "check"name="check[]"value="{$row['id']}"></td>           
                      </tr>
A;                     
                            echo $html;
                        }                     
                        ?>
 
                        <tr align = "center">
                        <td style = "height:38px"colspan="10">
                        <a href="?page=1">首页</a>
                        <a href="?page=<?php echo $page-1?>">上一页</a>
                        <?php echo $page; echo'/';echo $totalpage?>
                        <a href="?page=<?php echo $page+1?>">下一页</a>
                        <a href="?page=<?php echo $totalpage ?>">尾页</a>
                        <input  onclick = "javascript:if(!confirm('确认要删除选择的信息吗?')){return false;}"
                        style=" float:right; background-color: #2196f3;font-weight: bold; height: 26px;" 
                        type="submit"value="删除所选">
                        </td>
                        </tr>
                    </table>
                    </form>
                </div>
        </div>
            
    </div>

        <div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
        <?php
         echo '@';
         echo "admin用户";
        ?>
           </div>

    </div>
    <script>
       function ckAll()
        {
            var cks=document.getElementsByName("check[]");//获取全选按钮的对象
            var flag=document.getElementById("allChecks").checked; //获取全选按钮当前的状态
            for(var i=0;i<cks.length;i++)
            {
                cks[i].checked = flag;
            }
        }
    </script>   
</body>
</html>