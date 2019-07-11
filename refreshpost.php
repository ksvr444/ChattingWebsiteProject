<?php
$con = new mysqli("localhost","root","","chatproject");
$sql1="SELECT * from accepteduploads order by id desc";
$res1=$con->query($sql1);


while($row1=$res1 ->fetch_assoc())
{
  $nickname=$row1['nickname'];
  $sql2="SELECT proimg from signuptable where nickname='$nickname'";
  $res2=$con->query($sql2);
  $row2=$res2->fetch_assoc();
  echo '  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      <img src="data:image/jpeg;base64,'.base64_encode($row2["proimg"]).'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <span class="w3-right w3-opacity">32 min</span>
      <h4>'.$nickname.'</h4><br>
      <hr class="w3-clear">';
  if($row1['data']!="")
      echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['data']).'" style="width:100%"/>';
    echo '<p>'.$row1['txtpost'].'</p>
      <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
      <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
    </div>';
}
?>
