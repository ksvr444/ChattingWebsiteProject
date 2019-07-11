<?php
$con=new mysqli("localhost","root","","chatproject");
$uname=$_POST['user'];
$fname=$_POST['frd'];
$msg=$_POST['ms'];
$x=$uname.$fname;
$y=$fname.$uname;
// echo $x." ".$y." ".$msg." ";
$sql="INSERT into $x values('$uname','$msg')";
if($con->query($sql)==TRUE)
{

}
else
{
  $sql="INSERT into $y(nickname,msg) values('$uname','$msg')";
  if($con->query($sql)==TRUE)
  {

  }
  else
  {
    $sql="CREATE table $x(nickname text,msg text)";
    $con->query($sql);
    $sql="INSERT into $x(nickname,msg) values('$uname','$msg')";
    $con->query($sql);
  }
}
 ?>
