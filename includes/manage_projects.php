<?php 
        $thread_id=$_REQUEST['thread_id'];
        $sp_id=$_REQUEST['sp_id'];
        $client_id=$_REQUEST['client_id'];
        $j_status=$_REQUEST['job_status'];

        $db['db_host']='localhost';
        $db['db_user']='root';
        $db['db_pass']='';
        $db['db_name']='techmanagement';
    
        foreach($db as $key=>$value){
            define(strtoupper($key),$value);
        }
        $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(!$connection){
            die("Database connection failed");
        }
       
        $query="SELECT * FROM thread_data WHERE id=$thread_id";
        $result=mysqli_query($connection,$query);
        $data2=mysqli_fetch_assoc($result);

        $thread_title=$data2['thread_title'];
        $thread_date=$data2['thread_date'];
        $thread_content=$data2['thread'];
        $query="SELECT * FROM answer_data WHERE sp_id=$sp_id AND thread_id=$thread_id";
        $result=mysqli_query($connection,$query);
        $data1=mysqli_fetch_assoc($result);
        $post=$data1['post'];
        $query="SELECT clientFirstname,clientLastname FROM client_data WHERE clientId=$client_id";
        $result2=mysqli_query($connection,$query);
        $data2=mysqli_fetch_assoc($result2);
        $clientname=$data2['clientFirstname'].' '.$data2['clientLastname'];

?> 
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='../Style/manage_page.css'>
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
        <!--content-->
        <div class='content_section'>
        <label><h3 class='title'>TITLE : <?php echo $thread_title.'</h3><br>['.$thread_date.']' ?></label>
            <hr>
            <label class='content'><b>CONTENT : </b><?php echo $thread_content ?></label><br><hr>
            <label class='comment'><b>YOUR ANSWERS/COMMENTS :</b></label><br><br>
            <?php
                echo "<div class='answer'>".$post.'</div>';
                echo "<br><label><b>DISCUSSION :</b></label><br><hr>";
            
                $query="SELECT * FROM chat_data WHERE sp_id=$sp_id AND thread_id=$thread_id AND client_id=$client_id";
                $result=mysqli_query($connection,$query);
                if($result){
                    while($data1=mysqli_fetch_assoc($result)){
                        $indicator=$data1['indicator'];
                        if($indicator==0){
                            echo "<div class='chat_text_sp'><font size='1px' color='grey'><b>You</b>(".$data1['time_data'].')</font><br>'.$data1['post'].'<br></div>';
                        }else if($indicator==1){
                            echo "<div class='chat_text_cli'><font size='1px' color='grey'><b>".$clientname.'</b>('.$data1['time_data'].')</font><br>'.$data1['post'].'<br></div>';
                        }
                    }    
                }
            ?>
            <br>
            <label><b>SUBMIT YOUR ANSWER/COMMENT</b></label><br>
            <form method='post' action=<?php echo 'chatbox_sp.php?thread_id='.$thread_id.'&sp_id='.$sp_id.'&client_id='.$client_id?>>
                <textarea name='sp_comment' placeholder='Enter your comments here'></textarea><br>
                <button class='btn' name='submit_post'>SUBMIT</button><br>
                <center>
                    <?php
                        if($j_status=='accepted'){
                            echo "<label><font size='3px' color='#36C274'>You have accepted this project!</font></label><br><br><button class='btn_accept' name='accept_job' disabled>ACCEPT PROJECT</button>
                            <button class='btn_decline' name='decline_job' disabled>DECLINE PROJECT</button>";
                        }else if($j_status=='pending'){
                            echo "<button class='btn_accept' name='accept_job'>ACCEPT PROJECT</button>
                            <button class='btn_decline' name='decline_job'>DECLINE PROJECT</button>";
                        }else if($j_status=='closed'){
                            echo "<label><font size='3px' color='#36C274'>You have successfully completed this project!</font></label><br><br><button class='btn_accept' name='accept_job' disabled>ACCEPT PROJECT</button>
                            <button class='btn_decline' name='decline_job' disabled>DECLINE PROJECT</button>";
                        }
                        mysqli_close($connection);
                    ?>
                </center>
            </form>
        </div>
    </body>
</html>