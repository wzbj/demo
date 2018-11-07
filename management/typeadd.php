<?php
include './/mysqli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>添加类别</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <form method="post" action="typesave.php?action=add">
            <ul class="typecontent">
                <?php
                    ?>
                <li>父类名称<select name="fid">
                        <option value="0">根目录</option>
                        <?php
                        function show($fid,$i){
                            $i++;
                            $blank="";
                            for($n=0;$n<$i;$n++){
                                $blank.="---";
                            }
                        global $mysqli;
                        $sql="select *from type where fid=$fid order by orderid desc";
                        $result=$mysqli->query($sql);
                        $id=$_GET["id"];
                        while($row=$result->fetch_assoc()){
                            ?>
                            <option <?php if($id==$row['id']){echo "selected";}?> value="<?php echo $row['id']?>"><?php echo $blank.$row['typename'].$blank?></option>
                        <?php
                            show($fid=$row['id'],$i);
                        }
                        ?>
                        <?php }
                        show(0,0);
                        ?>
                    </select>
                </li>
                <li>类别名称<input class="inp" type="text" name="typename"></li>
                <li>排       序<input class="inp" type="text" name="orderid"></li>
                <li>
                    <input class="btn" type="submit" name="dosub" value="添加"></li>
            </ul>
        </form>
    </body>
</html>