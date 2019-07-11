<?php
session_start();
 ?>

<!DOCTYPE html>
<html>

<script>
function acceptpost(x)
{

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("sai").innerHTML = this.responseText;
      }
    };
  xhttp.open("POST", "acceptpost.php?sid="+x, true);
  xhttp.send();
}
</script>
<script>
function rejectpost(x)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("sai").innerHTML = this.responseText;
      }
    };
  xhttp.open("POST", "rejectpost.php?sid="+x, true);
  xhttp.send();
}
</script>

<title>Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="theme.css"> -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- <link rel="stylesheet" href="fontsymbols.css"> -->
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="adminpage1.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a> -->
  <a href="adminpage.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages">Requests</i></a>

  <!-- <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" id ="sai" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div> -->

  <form method="POST"   enctype="multipart/form-data">
    <input type="file" class="w3-bar-item w3-hide w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="changeprofile" id="changeprofile">

    <a href="logoutadmin.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-close"></i> Logout</a>


    <button type="submit" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="probtn"><i class="fa fa-pencil"></i> Change</button>
    <button type="button" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" onclick="document.getElementById('changeprofile').click()"><i class="fa fa-image"></i> Profile</button>
  </form>
  </a>
 </div>
</div>

<?php
$nickname=$_SESSION['adid'];
if(isset($nickname))
{

}
else {
  header("Location:http://localhost/project/logoutadmin.php");
}
 ?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <!-- <p class="w3-center"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["proimg"]).'" class="w3-circle" style="height:106px;width:106px" alt="Avatar">'; ?></p> -->
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>

      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
          </div>
        </div>
      </div>
      <br>

      <!-- Interests -->

      <br>

      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Upload a post</h6>
              <form method="POST" class="w3-container"  enctype="multipart/form-data">
                <p>
                  <input class="w3-input w3-border w3-light-gray w3-round-large" name="textpost" type="text" required>
                </p>
                <label class="w3-button" id="uploadImage"></label>
                <input class="w3-input w3-hide w3-border w3-light-gray w3-round-large" type="file" name="upfile" id="upfile" />
                <button type="button" class="w3-btn w3-theme" onclick="document.getElementById('upfile').click()"><i class="fa fa-image"></i> Image</button>
                <button type="submit" class="w3-btn w3-theme" name="sub"><i class="fa fa-pencil"></i> Post</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="displaypost">

      <?php
      $con = new mysqli("localhost","root","","chatproject");
      if (isset($_POST['sub']))
      {
        $textpost=htmlentities($_POST['textpost']);
        $uploadfile_data=addslashes(file_get_contents($_FILES['upfile']['tmp_name']));
        $uploadfile_name=$_FILES['upfile']['name'];
        $sql="INSERT into adminuploads(nickname,txtpost,name,data) values('$nickname','$textpost','$uploadfile_name','$uploadfile_data')";
        $con->query($sql);
      }

       ?>

     </div>

    </div>
      <!-- End Middle Column -->
    <!-- Right Column -->

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script
src="http://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous">
</script>

<script>
$(document).ready(function(e){
$.ajaxSetup({
  cache: false
});
setInterval( function(){ $('#displaypost').load('adminrefreshpost.php'); }, 500 );
});
</script>




<script>

// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}


</script>

</body>
</html>
