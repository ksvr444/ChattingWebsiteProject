<!DOCTYPE html>


	<html>
	<head>
		<title>Gain Access Page</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>

	<body>
			<?php include("menu.html"); ?>
		<div class="w3-container w3-display-middle" style="width:30%">

			<div class="w3-card-2">

				<div class="w3-container w3-blue-grey">
					<h1>Gain Access</h1>
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
						<label class="w3-text-dark-gray"><b>Retype Password</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="repwd" type="password" required>
					</p>
					<p>
						<label class="w3-text-dark-gray"><b>Access Key</b></label>
						<input class="w3-input w3-border w3-light-gray w3-round-large" name="ackey" type="text" required>
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
$ackey=$nickname=$pwd=$repwd="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pwd=test_input($_POST["pwd"]);
$nickname=test_input($_POST["nickname"]);
$repwd=test_input($_POST["repwd"]);
$ackey=test_input($_POST["ackey"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($ackey=="")
{

}
else
{
  if($pwd==$repwd && $pwd!="" && $repwd!="")
  {
    $con = new mysqli("localhost","root","","chatproject");
    $sql = "SELECT accesskey,password FROM signuptable where nickname='$nickname'";
    $result = $con->query($sql);
    $rows=$result->fetch_assoc();
    if($rows['password']!="")
    {
      echo "<script>document.getElementById('head1').innerHTML='Your access is already granted';</script>";
      echo '<script src="jquery.js"></script>
      <script>
      $(document).ready(function(){
              $("#head1").fadeOut(5000)
      });
      </script>';
    }
    else
    {
      if($ackey==$rows["accesskey"])
      {
        echo "<script>document.getElementById('head1').innerHTML='You have gained the access';</script>";
        echo '<script src="jquery.js"></script>
        <script>
        $(document).ready(function(){
                $("#head1").fadeOut(5000)
        });
        </script>';
        //password storing in Database
        $sql = "UPDATE signuptable set password='$pwd' where nickname='$nickname'";
        $con->query($sql);
      }
      else
      {
        echo "<script>document.getElementById('head2').innerHTML='Invalid Access Key';</script>";
        echo '<script src="jquery.js"></script>
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
    echo "<script>document.getElementById('head2').innerHTML='Password Mismatch';</script>";
    echo '<script src="jquery.js"></script>
    <script>
    $(document).ready(function(){
            $("#head2").fadeOut(5000)
    });
    </script>';
  }

}

 ?>
