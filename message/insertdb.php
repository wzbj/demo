<?php
include './mysqli.php';
$tit=$_POST["title"];
$con=$_POST["content"];
$sql="insert into message(title,content) values('$tit','$con')";
if($mysqli->query($sql))
{
    echo 1;
}
else{
    echo 0;
}