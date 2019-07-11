
    <div class="w3-container chatContent" style="margin-top:60px">
      <div class="w3-row">
        <div class="w3-container w3-col m3">
          <div class="w3-card w3-round w3-white w3-padding">
            <?php
            $con=new mysqli("localhost","root","","chatproject");
            $sql="SELECT nickname from signuptable where nickname<>'$nickname'";
            $res=$con->query($sql);
            while($rows=$res->fetch_assoc())
            {
              echo "<div class='w3-container'>
             <div class='w3-container w3-hover-light-gray ".$rows['nickname']."'>
               <h3 > ".$rows['nickname']."</h3>
             </div>
              </div>";
            }
             ?>
          </div>
        </div>

        <!-- middle section -->
        <div class="w3-container w3-col m9">
          <div class="w3-card w3-round w3-white w3-container chatArea" id='chatArea'>
            <div class="w3-container w3-paddding">
              <h3 class="chatName"></h3>
              <h3 class="demo"></h3>
            </div>
            <p>
              <textarea class='w3-input w3-border w3-light-gray w3-round-large chatDisplay' style='resize:none' rows='20' readonly >ha</textarea>
            </p>
            <p>
              <!-- <textarea class="w3-border  w3-light-gray w3-round-large w3-size-10 message" name="msg"  type="textarea" style="resize:none" rows='1' cols='80' required></textarea> -->

              <input class="w3-border  w3-light-gray w3-round-large  message" name="msg"  type="text" style="resize:none" size='75' required/>

              <button  class='w3-padding w3-btn w3-green w3-small send'><b>Send</b></button>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class='empty'>

    </div>

  <?php
  $sq="SELECT nickname from signuptable where nickname<>'$nickname'";
  $re=$con->query($sq);
   ?>

  <script>
  $(document).ready(function(){
    var username,frdname,msg,interval='';
    $('.chatArea').hide();
    <?php
    while($ro=$re->fetch_assoc())
    {
     ?>
     $('.<?php echo $ro["nickname"] ?>').click(function(event){
       clearInterval(interval);
       $('.chatArea').show();
       $('.chatName').text('<?php echo $ro["nickname"] ?>');

       function refresh(){
           $('.chatDisplay').load('loadChat.php',{"username":'<?php echo $nickname ?>',"frdname":'<?php echo $ro["nickname"] ?>'} );
       }
       refresh();
       interval=setInterval(function(){
         refresh();
       },300);
      username='<?php echo $nickname ?>';
      frdname='<?php echo $ro["nickname"] ?>';
     });


     <?php } ?>
     //click
     $('.send').click(function(){
         msg=$('.message').val();
         if(msg!='')
         {
           $('.empty').load('sendChat.php',{"user":username,"frd":frdname,"ms":msg} );
           $('.message').val('');
         }
         // $('.demo').text(frdname);
     });
     //enter key press
     $(document).keypress(function(event){
         if(event.which==13)
         {
           msg=$('.message').val();
           if(msg!="")
           {
             $('.empty').load('sendChat.php',{"user":username,"frd":frdname,"ms":msg} );
             $('.message').val('');
           }
         }
         // $('.demo').text(frdname);
     });

  });
  </script>
