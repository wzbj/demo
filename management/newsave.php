<?php 
header("Content-type:text/html;charset=utf-8");
include 'include/mysqli.php';
include 'include/fileupload.class.php';
$action = isset($_GET["action"])?$_GET["action"]:"";
$up=new FileUpload();
if($action=='add')
{
    $title=$_POST["title"];
    $typeid=$_POST["typeid"];
    if($typeid=='')
    {
        die("请选择类别");
    }
    if($title=="")
    {
        die("请填写标题");
    }
    $source=$_POST["source"];
    $content=$_POST["content"];
   if($up->upload("picurl"))
   {
       $picurl=$up->getFileName();
   }
   else{
       die($up->getErrorMsg());
   }
   $posttime= strtotime($_POST["posttime"]);
      $sql="insert into news(typeid,title,source,picurl,content,posttime)values($typeid,'$title','$source','$picurl','$content',$posttime)";
      global $mysqli;
      if($mysqli->query($sql))
      {
          echo "<script>alert('添加成功');window.location.href='newlist.php'</script>";
      }
      else{
          echo "<script>alert('添加失败');</script>";
      }
 
    
}elseif($action=='update'){
    $id=$_POST["id"];
    $title=$_POST["title"];
    $typeid=$_POST["typeid"];
    if($typeid=='')
    {
        die("请选择类别");
    }
    if($title=="")
    {
        die("请填写标题");
    }
    $source=$_POST["source"];
    $content=$_POST["content"];
    if($up->upload("picurl"))
    {
        $picurl=$up->getFileName();
    }
    else{
        die($up->getErrorMsg());
    }
    $posttime= strtotime($_POST["posttime"]);
    $sql="update news set typeid='$typeid',title='$title',source='$source',picurl='$picurl',content='$content',posttime='$posttime' where id=$id";
    global $mysqli;
    if($mysqli->query($sql))
    {
        echo "<script>alert('修改成功');window.location.href='newlist.php'</script>";
    }
    else{
        echo "<script>alert('修改失败');</script>";
    }
}elseif($action="del"){
    $id=$_GET['id'];
    $sql="delete from news WHERE id=$id";
    $result=$mysqli->query($sql);
    if($result){
        echo "<script>alert('删除成功!');window.location.href='newlist.php'</script>";
    }else{
        echo "<script>alert('删除失败!');</script>";
    }
}