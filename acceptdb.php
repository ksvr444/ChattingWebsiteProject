//hai this is
//we gonna rock
<?php
$nickname=$_REQUEST['nickname'];
$randnum=$_REQUEST['randstr'];
$email=$_REQUEST['email'];
$con = new mysqli("localhost","root","","chatproject");
//check for earlier acception
$s="SELECT action from signuptable where nickname='$nickname'";
$res=$con->query($s);
$row=$res->fetch_assoc();
if($row['action']=="accepted")
{
  echo "Already accepted";
}
else
{
  //setting password to table
  $sql = "UPDATE signuptable set accesskey='$randnum' where nickname='$nickname'";
  $con->query($sql);
  //update the action field
  $sql = "UPDATE signuptable set action='accepted' where nickname='$nickname'";
  if($con->query($sql))
  {
    echo "".$nickname." is accepted into group<br>";
    echo $email."<br>".$randnum."<br>";
    $msg = "Congratulations....  Your request is granted...  Your ACCESS KEY=".$randnum;
    if(mail($email,"Group Chat Access Key",$msg))
    {
      echo "mail sent";
    }
    else {
       echo "failed";
    }

  }
  else
  {
    echo "".$nickname." rejection unsuccessful";
  }
}
 ?>
