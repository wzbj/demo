<?php
header("Content-type:text/html;charset=utf-8");
    include './mysqli.php';
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table td{padding: 5px 3px;}
            table tr{background: #33CCFF; height: 40px; line-height: 40px}
            /*table tr:nth-child(2n){background: #f0f0f0;}*/
        </style>
        <script>
            function delall(){
                var arrid="";
                obox=document.getElementsByName("box");
                for(i=0;i<obox.length;i++){
                    if(obox[i].checked){
                        arrid+=obox[i].value+",";
                    }
                }
                alert(arrid);
                window.location.href="typesave.php?action=delall&arrid="+arrid;
            }
        </script>
    </head>
    <body>
        <table width="100%">
            <tr><td><input type="checkbox">全选</td><td>编号</td><td>类别名称</td><td>排序</td></td><td>操作</td></tr>
            <?php
            function show($fid,$color,$i){
                $i++;
                $blank ="";
                for($n=0;$n<$i;$n++){
                    $blank.="---";
                }
                $rand=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
                $color='#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                global $mysqli;
            $sql="select *from type where fid=$fid order by orderid asc";
            $result=$mysqli->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <tr ><td><input type="checkbox" name="box" value="<?php echo $row['id']?>"></td><td><?php echo $row['id']?></td><td><?php echo $blank.$row['typename'].$blank?></td><td><?php echo $row['orderid']?></td><td><a href="typeupdate.php?fid=<?php echo $row['fid']?>&id=<?php echo $row['id']?>">修改</a>
                    <a href="typesave.php?action=del&id=<?php echo $row['id']?>">删除</a>
                    <a href="typeadd.php?id=<?php echo $row['id']?>">添加子类</a>
                </td></tr>
                
            <?php
//                $rand=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
//                $color=$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                show($fid=$row['id'],$color,$i);
            }
                 }
            show(0,$color='#33CCFF',0);
            ?>
            <table width="100%" >
                <tr style="background: #ffffff">
                    <td  width="10%"></td>
                    <td width="10%"></td>
                    <td width="50%"></td><td width="10%"></td>
                    <td><a href="javascript:delall()">全部删除</a><a href="typeadd.php"> 添加类别</a></td>
                </tr>
        </table>
    </body>
</html>