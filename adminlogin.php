<?php
session_start();
 ?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	</head>
	<body>
		<?php include("menu.html"); ?>
		<div class="w3-container w3-display-middle" style="width:40%">

			<div class="w3-card-2">

				<div class="w3-container w3-blue-grey">
					<h1>Admin Login</h1>
				</div>
				<h3 id="head1" class="w3-text-green"></h3>  <h3 id="head2" class="w3-text-red"></h3>
				<div class="w3-container w3-blue-gray">
					<p>
						Please fill in the details
					</p>
				</div>

				<form name="suf" class="w3-container" method="POST">
					<p>
						<label class="w3-text-dark-gray"><b>Admin ID</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="adid" type="text" required>
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
$adminid=$pwd="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$adminid=test_input($_POST["adid"]);
$pwd=test_input($_POST["pwd"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($adminid=="")
exit("");

if($adminid=="admin")
{
	if($pwd=="admin")
	{
		$_SESSION['adid']="admin";
		header("Location:http://localhost/project/adminpage1.php");
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
	echo "<script>document.getElementById('head2').innerHTML='Invalid ID';</script>";
	echo '<script src="jquery.js"></script>
	<script>
	$(document).ready(function(){
					$("#head2").fadeOut(5000)
	});
	</script>';
}
 ?>
