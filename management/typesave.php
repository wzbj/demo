<?php
header("Content-type:text/html;charset=utf-8");
include './mysqli.php';
if($_GET["action"]=="add"){
    $fid=$_POST['fid'];
    $typename=$_POST["typename"];
    $orderid=$_POST["orderid"];
    if(empty($typename)){
        echo "<script>alert('类别名称不能为空!')</script>";
        return false;
    }
    $sql = "insert into type(typename,orderid,fid) values('$typename','$orderid','$fid')";
    if ($mysqli->query($sql)) {
        echo "<script>alert('类别添加成功')</script>";
        echo "<script>window.location='typelist.php'</script>";
    }
}elseif ($_GET["action"]=="update"){
    $typename=$_POST["typename"];
    $orderid=$_POST["orderid"];
    $id=$_POST["id"];
    if(empty($typename)){
        echo "<script>alert('类别名称不能为空!')</script>";
        return false;
    }
    $sql = "update type set typename='$typename',orderid='$orderid' where id='$id'";
    if ($mysqli->query($sql)) {
        echo "<script>alert('类别修改成功')</script>";
        echo "<script>window.location='typelist.php'</script>";
    }
}elseif ($_GET["action"]=="del"){
    $id=$_GET['id'];
    $sql = "delete from type where id=$id";
    if ($mysqli->query($sql)) {
        echo "<script>alert('类别删除成功')</script>";
        echo "<script>window.location='typelist.php'</script>";
    }
}elseif ($_GET["action"]=="delall"){
    $arrid=$_GET["arrid"];
    $arr=rtrim($arrid,",");
    $sql="delete from type where id in ($arr)";
    $result=$mysqli->query($sql);
    if($result){
        echo "<script>alert('类别删除成功!')</script>";
        echo "<script>window.location.href='typelist.php'</script>";
    }
}