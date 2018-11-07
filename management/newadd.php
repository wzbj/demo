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
<table width="100%" border="1" bordercolor="#dddddd" style="border-collapse: collapse">
    <form action="newsave.php?action=add" method="post" enctype="multipart/form-data">
        <tr><td width="100">分类：</td><td><select name="typeid">
                    <option value="0">请选择类别</option>
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
                         ?>
                         <option value="<?php echo $row['id'] ?>"><?php echo $blank.$row['typename'].$blank?></option>
                         <?php
                         show($row['id'],$i);
                     }
                 }
                 show(0,0);
                 ?>
                </select></td></tr>
        <tr><td>标题：</td><td><input type="text" name="title"></td></tr>
        <tr><td>图片：</td><td><input type="file" name="picurl"></td></tr>
        <tr><td>来源：</td><td><input type="text" name="source"></td></tr>
        <tr><td>摘要：</td><td><textarea rows="6" cols="100" name="description"></textarea></td></tr>
        <tr><td>文章的内容：</td><td><textarea name="content" rows="15" cols="100" id="content"></textarea>
                <script>
                    KindEditor.ready(function(K) {
                        window.editor = K.create('#content',{
                            afterBlur:function(){this.sync();}
                        })
                    });
                </script>
            </td></tr>
        <tr>
            <td>日期</td><td><input type="text" name="posttime" id="posttime" readonly="readonly">
                <script type="text/javascript">
                    Calendar.setup({
                        inputField     :    "posttime",
                        ifFormat       :    "%Y-%m-%d %H:%M:%S",
                        showsTime      :    true,
                        timeFormat     :    "24"
                    });
                </script>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="dosub" value="提交"></td>
        </tr>
    </form>
</table>
</body>
</html>