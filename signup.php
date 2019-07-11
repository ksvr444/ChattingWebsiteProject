
<!DOCTYPE html>


	<html>

	<head>
		<title>Sign Up Page</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>

	<body>
			<?php include("menu.html"); ?>
		<div class="w3-container w3-display-middle" style="width:40%">

			<div class="w3-card-2">

				<div class="w3-container w3-blue-grey">
					<h1>Sign Up</h1>
				</div>
				<h3 id="head1" class="w3-text-green"></h3>  <h3 id="head2" class="w3-text-red"></h3>
				<div class="w3-container w3-blue-gray">
					<p>
						Please fill in the details
					</p>
				</div>

				<form name="suf" class="w3-container" method="POST">
					<p>
						<label class="w3-text-dark-gray"><b>Full Name</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="fullname" type="text" required>
					</p>
					<p>
						<label class="w3-text-dark-gray"><b>Nick Name</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="nickname" type="text" required>
					</p>
					<p>
						<label class="w3-text-dark-gray"><b>Email</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="email" type="email" required>
					</p>
					<p>
						<label class="w3-text-dark-gray"><b>Phone number</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="phno" type="text" required>
					</p>
					<p>
						<button type="reset" class="w3-btn w3-red">Cancel</button>
						<button type="submit" class="w3-btn w3-green">Sign Up</button>
					</p>
				</form>

			</div>

		</div>
	</body>
</html>

<?php
$fullname=$nickname=$email=$phno="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fullname=test_input($_POST["fullname"]);
$nickname=test_input($_POST["nickname"]);
$email=test_input($_POST["email"]);
$phno=$_POST["phno"];
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($email=="")
{

}
else
{
  if(!preg_match("/^[0-9]{10}$/",$phno))
  {
    echo "<script>document.getElementById('head2').innerHTML='Invalid phno';</script>";
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
            $("#head2").fadeOut(5000)
    });
    </script>';
    exit("");
  }

  $con = new mysqli("localhost","root","","chatproject");
  $sql = "SELECT nickname,email FROM signuptable";
  $result = $con->query($sql);
  if($result->num_rows>0)
  {
    $c=0;
    while($rows=$result->fetch_assoc())
    {
      if($nickname==$rows["nickname"])
      {
        echo "<script>document.getElementById('head2').innerHTML='Nickname already exists.Choose another one.';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
        break;
      }
      if($email==$rows["email"])
      {
        echo "<script>document.getElementById('head2').innerHTML='Email already exists.Choose another one.';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
        break;
      }
      $c++;
    }

    if($c==$result->num_rows)
    {
      $sql="INSERT into signuptable (fullname,nickname,email,phno) values('$fullname','$nickname','$email','$phno')";
      if($con->query($sql) == TRUE)
      {
        echo "<script>document.getElementById('head1').innerHTML='Request Sent Successfully';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head1").fadeOut(5000)
      	});
      	</script>';
      }
      else
      {
        echo "<script>document.getElementById('head2').innerHTML='Request Unsuccessfull';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
      }
    }
  }
  else
  {
    $sql="INSERT into signuptable (fullname,nickname,email,phno) values('$fullname','$nickname','$email','$phno')";
    if($con->query($sql) == TRUE)
    {
      echo "<script>document.getElementById('head1').innerHTML='Request Sent Successfully';</script>";
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    	<script>
    	$(document).ready(function(){
    	        $("#head1").fadeOut(5000)
    	});
    	</script>';
    }
    else
    {
      echo "<script>document.getElementById('head2').innerHTML='Request Unsuccessfull';</script>";
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    	<script>
    	$(document).ready(function(){
    	        $("#head2").fadeOut(5000)
    	});
    	</script>';
    }
  }
}
 ?>
