<?php
    include './includes/dbConnect.php';
    session_start();
    $thread_id=$_REQUEST['thread_id'];
    $sp_id=$_SESSION['ID'];
    $query="SELECT * FROM thread_data WHERE id=$thread_id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $thread_title=$data['thread_title'];
    $thread_content=$data['thread'];
    $thread_date=$data['thread_date'];

    $query="SELECT * FROM answer_data WHERE thread_id=$thread_id";
    $result=mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='./Style/com_page.css'>
    </head>
    <body>
        <!--navbar-->
        <div class='navbar'>
            <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#519C74' size='5'>RoBoT</b></font></font></a></h3>
            <a href='./sp_dash.php'>PROFILE</a>
            <a href='./includes/logout.php'>LOGOUT</a>
        </div>
        <!--content-->
        <div class='content_section'>
        <label><h3 class='title'>TITLE : <?php echo $thread_title.'</h3><br>['.$thread_date.']' ?></label>
            <hr>
            <label class='content'><b>CONTENT : </b><?php echo $thread_content ?></label><br><hr>
            <label class='comment'><b>ANSWERS/COMMENTS :</b></label><br><br>
            <?php while($data=mysqli_fetch_assoc($result)){
                $sp_Id=$data['sp_id'];
                $query="SELECT * FROM service_provider_data WHERE sp_Id=$sp_Id";
                $result2=mysqli_query($connection,$query);
                $data_sp=mysqli_fetch_assoc($result2);
                echo "<div class='answer'>".$data['post'].'<br><br>
                <font color=#9A9A9A size=2><b>Author infomation:</b><br>
                <label><img src='."./Images/profile-icon-png-9012.png".'>  :'.$data_sp['sp_name'].'</label> <br><label><img src='."./Images/email-icon-1202.png".'>  :'.$data_sp['sp_email'].'</label> <br><label><img src='."./Images/phone-icon-9452.png".'>  :'.$data_sp['sp_contact'].'</label> <br></font><br></div>';
            }
            ?>
            <br>
            <label><b>SUBMIT YOUR ANSWER/COMMENT</b>(You have to be a service provider in order to comment or post an anwser in this section):</label><br>
            <form method='post' action=<?php echo './includes/post_push_request.php?thread_id='.$thread_id?>>
                <textarea name='sp_comment' placeholder='Enter your comments here'></textarea><br>
                <button class='btn' name='submit_post'>SUBMIT</button>
            </form>
        </div>
    </body>
</html>