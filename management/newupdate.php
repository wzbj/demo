<?php
include 'include/mysqli.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src="plugin/kindeditor/kindeditor/kindeditor-all.js"></script>
    <script src="plugin/calendar/calendar.js"></script>
</head>
<body>
<?php
?>
<table width="100%" border="1" bordercolor="#dddddd" style="border-collapse: collapse">
    <?php
    $id=$_GET["id"];
    $typeid=$_GET["typeid"];
    ?>
    <form action="newsave.php?action=update" method="post" enctype="multipart/form-data">
        <tr><td width="100">分类：</td><td><select name="typeid">
                    <option value="">请选择类别</option>
                    <?php
                    function show($fid,$i){
                        $i++;
                        $blank="";
                        for($n=0;$n<$i;$n++){
                            $blank.="---";
                        }
                        global $mysqli;
                        $sql = "select *from type where fid=$fid order by orderid";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            global $typeid;
                            ?>
                            <option <?php if($typeid==$row['id']){echo "selected";}?> value="<?php echo $row['id'] ?>"><?php echo $blank.$row['typename'].$blank?></option>
                            <?php
                            show($row['id'],$i);
                        }
                    }
                    show(0,0);
                    ?>
                </select></td></tr>
        <?php
        global $id;
        $sql="select *from news where id=$id";
        $result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <tr><td>标题：</td><td><input type="text" name="title" value="<?php echo $row['title']?>"></td></tr>
        <tr><td>图片：</td><td><input type="file" name="picurl" value="<?php echo $row['picurl']?>"></td></tr>
        <tr><td>来源：</td><td><input type="text" name="source" value="<?php echo $row['source']?>"></td></tr>
        <tr><td>摘要：</td><td><textarea rows="6" cols="100" name="description" value="<?php echo $row['description']?>"></textarea></td></tr>
        <tr><td>文章的内容：</td><td><textarea name="content" rows="15" cols="100" id="content" value="<?php echo $row['content']?>"></textarea>
                <script>
                    KindEditor.ready(function(K) {
                        window.editor = K.create('#content',{
                            afterBlur:function(){this.sync();}
                        })
                    });
                </script>
            </td></tr>
            <?php
                $posttime=date("Y-m-d h:i:s",$row['posttime']);
            ?>
        <tr><td>日期</td><td><input type="text" name="posttime" value="<?php echo $posttime?>" id="posttime" readonly="readonly">
                <script type="text/javascript">
                    Calendar.setup({
                        inputField     :    "posttime",
                        ifFormat       :    "%Y-%m-%d %H:%M:%S",
                        showsTime      :    true,
                        timeFormat     :    "24"
                    });
                </script>
            </td></tr>
        <?php
        }
        ?>
        <tr><td></td><td><input type="submit" name="dosub" value="修改"></td></tr>
    </form>
</table>
</body>
</html>