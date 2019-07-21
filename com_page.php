<?php
    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }

    $thread_id=$_REQUEST['id'];
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die('Database connection failed!');
    }
    $query="SELECT * FROM thread_data WHERE id=$thread_id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $thread_title=$data['thread_title'];
    $thread_content=$data['thread'];
    $thread_date=$data['thread_date'];
    $user_Id=$data['userId'];

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
            <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#519C74' size='5'>NoBoT</b></font></font></a></h3>
            <a>EXPLORE</a>
            <a>INNOVATE</a>
            <a>FORUM</a>
            <a>USER GUIDE</a>
            <a>ABOUT</a>
            <input type='text' placeholder='Search...'>
            <a>PROFILE</a>
            <a>NOTIFICATIONS</a>
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
                <label><img src='."./Images/profile-icon-png-9012.png".'>  :'.$data_sp['sp_name'].'</label> <br>
                <label><img src='."./Images/email-icon-1202.png".'>  :'.$data_sp['sp_email'].'</label> <br>
                <label><img src='."./Images/phone-icon-9452.png".'>  :'.$user_Id.'</label> <br>
                <label><img src='."./Images/profile-icon-png-9212.png".'>  :'.'</label><a href='."./sp_card.php?user_id=$user_Id&sp_id=$sp_Id&thread_id=$thread_id".'>Visit to hire or for more details</a><br>
                </div>';
            }
            ?>
        </div>
    </body>
</html>