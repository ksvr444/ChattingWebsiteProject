<?php
$nickname=$_REQUEST['nickname'];
$email=$_REQUEST['email'];
$con = new mysqli("localhost","root","","chatproject");
$sql = "DELETE FROM signuptable where nickname='$nickname'";
if($con->query($sql))
{
  echo "".$nickname." is rejected from group<br>";
  $msg="Your Request is REJECTED";
  echo $nickname." ".$email;
  if(mail($email," REJECTION from Group Chat",$msg))
  {
    echo "<br>mail sent";
  }
  else {
    echo "failed";
  }
}
else {
  echo "".$nickname." rejection unsuccessful";
}
 ?>
