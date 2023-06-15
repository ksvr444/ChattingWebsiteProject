<?php
session_start();
$id=$_REQUEST['sid'];
$con = new mysqli("localhost","root","","chatproject");
$sql1="DELETE  from adminuploads where id='$id'";
$con->query($sql1);
 ?>
