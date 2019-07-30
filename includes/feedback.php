<?php
    $thread_id=$_REQUEST['thread_id'];
    $sp_id=$_REQUEST['sp_id'];
    $client_id=$_REQUEST['user_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='../Style/feedback.css'>
    </head>
    <body>
          <!--navbar-->
          <div class='navbar'>
            <h3 style="display:inline;"><a align="center"><img src='../Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#519C74' size='5'>RoBoT</b></font></font></a></h3>
            <a>EXPLORE</a>
            <a>INNOVATE</a>
            <a>FORUM</a>
            <a>USER GUIDE</a>
            <a>ABOUT</a>
            <input type='text' placeholder='Search...'>
            <a>PROFILE</a>
            <a>NOTIFICATIONS</a>
        </div>
        <div class='content_section'>
            <h3>PLEASE GIVE US YOUR FEEDBACK</h3>
            <form method='post' action=<?php echo "review_handle.php?thread_id=$thread_id&sp_id=$sp_id&user_id=$client_id"?>>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <textarea name='user_comment' placeholder='Tell us what you think about our service' required></textarea>
                <center>
                    <button class='submit' name='submit'>SUBMIT</button>
                </center>
            </form>
        </div>
    </body>
<html>

