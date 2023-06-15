<?php
session_start();
if(!isset($_SESSION['adid']))
{
  header("Location:http://localhost/chattingwebsiteproject/logoutadmin.php");
}
 ?>
<html>
<head>
  <title>Requests</title>
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
</head>
<body>
  <div class="w3-top">
   <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
     <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
     <a href="adminpage1.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
     <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i>.</a>
     <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a> -->
     <a href="adminpage.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages">Requests</i></a>
    <!-- <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
      <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
        <a href="#"  class="w3-bar-item w3-button">One new friend request</a>
        <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
        <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
      </div>
    </div> -->
    <form method="POST"   enctype="multipart/form-data">
      <input type="file" class="w3-bar-item w3-hide w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="changeprofile" id="changeprofile">

      <a href="logoutadmin.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-close"></i></i> Logout</a>


      <button type="submit" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="probtn"><i class="fa fa-pencil"></i> Change</button>
      <button type="button" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" onclick="document.getElementById('changeprofile').click()"><i class="fa fa-image"></i> Profile</button>
    </form>
    </a>
   </div>
  </div>

  <br /><br /><br />
  <h1>Click on the row to perform action</h1>
  <h1 id="sai">hello</h1>

  <div class="w3-container" >
    <table class="w3-table-all w3-hoverable">
      <thead>
        <tr class="w3-theme-d1">
          <th>fullname</th>
          <th>nickname</th>
          <th>email</th>
          <th>phno</th>
          <th>action</th>
        </tr>
      </thead>
      <?php
      $con = new mysqli("localhost","root","","chatproject");
      $sql = "SELECT fullname,nickname,email,phno,action FROM signuptable order by fullname desc";
      $result = $con->query($sql);
      if($result->num_rows>0)
      {
        while($rows=$result->fetch_assoc())
        {
          echo "<tr style='cursor:pointer'>";
          echo "<td>".$rows['fullname']."</td>";
          echo "<td>".$rows['nickname']."</td>";
          echo "<td>".$rows['email']."</td>";
          echo "<td>".$rows['phno']."</td>";
          echo "<td>".$rows['action']."</td>";
          echo "</tr>";
        }
      }
       ?>
    </table>
  </div>



</body>

<script>

document.getElementById("sai").innerHTML="Welcome";
var tab=document.getElementsByTagName('table')[0];

for(var i=1;i<tab.rows.length;i++)
{
  tab.rows[i].onclick=function()
  {
    document.getElementById("sai").innerHTML=this.rowIndex;
    if(confirm("press OK to Accept or Cancel to reject"))
    {
      tab.rows[this.rowIndex].cells[4].innerHTML="accepted";
      //send random password as email to the person

      var randomstr = Math.random().toString(36).replace("0.","");
      var simplestr = randomstr.substring(0,5);

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sai").innerHTML = this.responseText;
        }
      };
      var nickname=tab.rows[this.rowIndex].cells[1].innerHTML;
      var email=tab.rows[this.rowIndex].cells[2].innerHTML;
      xhttp.open("POST", "acceptdb.php?nickname="+nickname+"&randstr="+simplestr+"&email="+email, true);
      xhttp.send();
    }
    else
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sai").innerHTML = this.responseText;
        }
      };
      var nickname=tab.rows[this.rowIndex].cells[1].innerHTML;
      var email=tab.rows[this.rowIndex].cells[2].innerHTML;
      xhttp.open("POST", "rejectdb.php?nickname="+nickname+"&email="+email, true);
      xhttp.send();

      tab.deleteRow(this.rowIndex);
    }

  };
}
//('sai','bunny','ksvr@',2134),('sreya','sony','sre@',567),('kap','paddu','kap@',5463),('sujatha','sujji','su@g',9876),('arjun','chotu','ch@g',5678),('arun','nune','nu@',23132)

</script>
</html>
