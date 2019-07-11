<?php
$con=new mysqli('localhost','root',"",'chatproject');
$uname=$_POST['username'];
$fname=$_POST['frdname'];
$x=$uname.$fname;
$y=$fname.$uname;
$sql="SELECT * from $x";
$res=$con->query($sql);
if($res)
{
  if($res->num_rows>0)
  {
    while($rows=$res->fetch_assoc())
    {
      echo $rows['nickname']." : ".$rows['msg']."\n\n";
    }
  }
}
else
{
  $sql="SELECT * from $y";
  $res=$con->query($sql);
  if($res)
  {
    if($res->num_rows>0)
    {
      while($rows=$res->fetch_assoc())
      {
        echo $rows['nickname']." : ".$rows['msg']."\n\n";
      }
    }
  }
  else
  {
    echo "\n\n\t\t\t\t\t\t\t\t\t\t\t\t\tSend your first msg to your friend ";
  }
}


 ?>
