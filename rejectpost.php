<?php
session_start();
$id=$_REQUEST['sid'];
echo $id."haii";
$con = new mysqli("localhost","root","","chatproject");
$sql1="DELETE  from adminuploads where id='$id'";
$con->query($sql1);
 ?>
