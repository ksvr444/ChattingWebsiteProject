<?php
 session_start();
 if(!isset($_SESSION['nickname']))
 {
     header("Location:http://localhost/project/logoutuser.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION['nickname'] ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type = "text/javascript"
        src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
     </script>

</head>



<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <button class="w3-bar-item w3-button w3-padding-large w3-theme-d4 logo"><i class="fa fa-home w3-margin-right"></i>Logo</button>
  <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white chat" title="chat">Chat<i class="fa fa-globe"></i></button>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>

  <a href="logoutuser.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-close"> Logout</i></a>

  <form method="POST"   enctype="multipart/form-data">
    <input type="file" class="w3-bar-item w3-hide w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="changeprofile" id="changeprofile">

    <button type="submit" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="probtn"><i class="fa fa-pencil"></i> Change</button>
    <button type="button" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" onclick="document.getElementById('changeprofile').click()"><i class="fa fa-image"></i> Profile</button>
  </form>
  </a>
 </div>
</div>

<?php
$nickname=$_SESSION['nickname'];
session_name($nickname);
  $con = new mysqli("localhost","root","","chatproject");
  if (isset($_POST['probtn']))
  {
    $profile_data=addslashes(file_get_contents($_FILES['changeprofile']['tmp_name']));
    $sql="UPDATE signuptable set proimg='$profile_data' where nickname='$nickname'";
    $con->query($sql);
   }
    $sql="SELECT proimg from signuptable where nickname='$nickname'";
    $res=$con->query($sql);
    $row=$res->fetch_assoc();
 ?>


<!-- Page Container -->
<?php include("chatting.php")?>

<div class="w3-container w3-content userContent" style="max-width:1400px;margin-top:80px" >
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["proimg"]).'" class="w3-circle" style="height:106px;width:106px" alt="Avatar">'; ?></p>
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
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>
      </div>
      <br>

      <!-- Interests -->
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
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
setInterval( function(){ $('#displaypost').load('refreshpost.php'); }, 500 );
setInterval( function(){ $('#displaypost').load('refreshpost.php'); }, 500 );
});
</script>

<script>
$(document).ready(function(){
  // initially
  $('.userContent').show();
  $('.chatContent').hide();

  $('.logo').click(function(){
    $('.userContent').show();
    $('.chatContent').hide();
  });
  $('.chat').click(function(){
    $('.chatContent').show();
    $('.userContent').hide();
  })
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
