<?php
session_start();
 ?>
<!DOCTYPE html>


	<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>

	<body>
			<?php include("menu.html"); ?>
		<div class="w3-container w3-display-middle" style="width:40%">

			<div class="w3-card-2">

				<div class="w3-container w3-blue-grey">
					<h1>User Login</h1>
				</div>
				<h3 id="head1" class="w3-text-green"></h3>  <h3 id="head2" class="w3-text-red"></h3>
				<div class="w3-container w3-blue-gray">
					<p>
						Please fill in the details
					</p>
				</div>

				<form name="suf" class="w3-container" method="POST">
					<p>
						<label class="w3-text-dark-gray"><b>Nick Name</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="nickname" type="text" required>
					</p>
					<p>
						<label class="w3-text-dark-gray"><b>Password</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="pwd" type="password" required>
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
$nickname=$pwd="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pwd=test_input($_POST["pwd"]);
$nickname=test_input($_POST["nickname"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($nickname=="")
{

}
else
{
  $con = new mysqli("localhost","root","","chatproject");
  $sql = "SELECT password FROM signuptable where nickname='$nickname'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  {
    $rows=$result->fetch_assoc();
    if($rows['password']==$pwd)
    {
      $_SESSION['nickname']=$nickname;
      header("Location:userpage.php");
    }
    else
    {
      echo "<script>document.getElementById('head2').innerHTML='Invalid password';</script>";
      echo '<script src="jquery.js"></script>
      <script>
      $(document).ready(function(){
              $("#head2").fadeOut(5000)
      });
      </script>';
    }
  }
  else
  {
    echo "<script>document.getElementById('head2').innerHTML='Invalid nickname';</script>";
    echo '<script src="jquery.js"></script>
    <script>
    $(document).ready(function(){
            $("#head2").fadeOut(5000)
    });
    </script>';
  }
}



 ?>
