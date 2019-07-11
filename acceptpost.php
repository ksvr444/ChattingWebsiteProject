<?php
session_start();
$id=$_REQUEST['sid'];
echo $id;
$con = new mysqli("localhost","root","","chatproject");
$sql1="SELECT * from adminuploads where id='$id'";
$res1=$con->query($sql1);
$row1=$res1->fetch_assoc();
$p=$row1['nickname'];
$q=$row1['txtpost'];
$r=$row1['name'];
$s=addslashes($row1['data']);
$sql2="INSERT into accepteduploads(nickname,txtpost,name,data) values('$p','$q','$r','$s')";
$con->query($sql2);

 ?>
