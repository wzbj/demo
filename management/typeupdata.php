<?php
    include 'include/mysqli.php';
$id= isset($_GET["id"])?$_GET["id"]:0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改类别</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form method="post" action="typesave.php?action=update">
    <ul class="typecontent">
        <?php
            $id=isset($_GET['id'])?$_GET['id']:1;
            $sql="select *from type where id='$id'";
            $result=$mysqli->query($sql);
            $row=$result->fetch_assoc();
        ?>
        <li>父类名称<select name="fid">
                <option value="0">根目录</option>
                <?php
                $fid=$_GET['fid'];
                $sql="select *from type where id=$fid order by orderid desc";
                $result=$mysqli->query($sql);
                while($row=$result->fetch_assoc()){
                    ?>
                    <option <?php if($row['id']==$fid){echo "selected";}?> value="<?php $row['id']?>"><?php echo $row['typename']?></option>
                    <?php
                }
                ?>
            </select></li>
       <?php
       $id=$_GET['id'];
       $sql1="select *from type where id=$id order by orderid desc";
       $result1=$mysqli->query($sql1);
       while($row1=$result1->fetch_assoc()){
       ?>
        <li>类别名称<input class="inp" value="<?php echo $row1['typename']?>" type="text" name="typename"></li>
        <li>排       序<input value="<?php echo $row1['orderid']?>" class="inp" type="text" name="orderid"></li>
        <li><input type="hidden" name="id" value="<?php echo $row1['id']?>">
            <input class="btn" type="submit" name="dosub" value="修改"></li>
        <?php
       }
        ?>
    </ul>
</form>
</body>
</html>