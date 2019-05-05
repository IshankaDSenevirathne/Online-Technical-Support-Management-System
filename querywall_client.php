<?php 
$db['db_host']='localhost';
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='techmanagement';

foreach($db as $key=>$value){
    define(strtoupper($key),$value);
}
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
    die('Database connection error');
}
$clientId=$_REQUEST['id'];
$query="SELECT * FROM thread_data WHERE userId=$clientId";
$result1=mysqli_query($connection,$query);
$query="SELECT * FROM thread_data";
$result2=mysqli_query($connection,$query);
$result=$result1;
if(isset($_POST['sort_thread'])){
    $thread_owner=$_POST['thread_owner'];
    if($thread_owner=='all_threads'){
        $result=$result2;
    }else if($thread_owner=='my_threads'){
        $result=$result1;
    } 
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel='stylesheet' type='text/css' href='./Style/threadwall.css'>
        </head>
        <body>
            <div>
                <div class='navbar'>
                    <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#5274CD' size='5'>NoBoT</b></font></font></a></h3>
                    <a>EXPLORE</a>
                    <a>INNOVATE</a>
                    <a>FORUM</a>
                    <a>USER GUIDE</a>
                    <a>ABOUT</a>
                    <input type='text' placeholder='Search...'>
                    <a>PROFILE</a>
                    <a>NOTIFICATIONS</a>
                </div>
           </div>
           <div style='background-color:white;'>
                <h2 align='center'>THREADWALL</h2>
                <div style='padding:10px 10px 15px 10px;margin:10px 40px 15px 40px;'>
                    <h3>POST A THREAD</h3>
                    <form method='post' action='./includes/threadwall_push_request.php<?php echo '?id='.$clientId; ?>'>
                        <label>Title:</label><br>
                        <input class='threadTitle' type=textbox placeholder='Please insert a Title' name='threadTitle' required>
                        <label>Thread:</label><br>
                        <textarea class='threadbox' name='thread' placeholder='Ask here...' required></textarea>
                        <label>Select Category:</label>
                        <select style='width:100%;height:30px;' name='category'>
                            <option value='EE'  selected='selected'>Electrical/Electronic Engineering</option>
                            <option value='ME'>Mechanical Engineering</option>
                            <option value='AE'>Aerospace Engineering</option>
                            <option value='RE'>Robotics/Mechatronics Engineering</option>
                            <option value='CE'>Civil Engineering</option>
                            <option value='ME'>Mechanical Engineering</option>
                            <option value='HH'>Agriculture</option>
                            <option value='BM'>Bio-Medical Engineering</option>
                            <option value='SE'>Software Engineering</option>
                            <option value='COM'>Computer Engineering</option>
                            <option value='CS'>Computer Science</option>
                            <option value='EP'>Engineering Physics</option>
                            <option value='ARD'>Architecture/Design</option>
                            <option value='TE'>Textile Engineering</option>
                            <option value='HHE'>House Hold Electricity/Electricals</option>
                            <option value='HHG'>House Hold Gardening</option>
                            <option value='HHG'>Other</option>
                        </select>
                        <br>
                        <button type='submit' name='post_thread' class='btn'>POST</button>
                    </form>
                    <form action="querywall_client.php<?php echo '?id='.$clientId;?>" method='post'>
                        <h3>SORT</h3>
                        <label>Threads:</label><br>
                        <select style='width:100%;height:30px;' name='thread_owner'>
                            <option value='' name='' selected>...</option>
                            <option value='all_threads' name='all_threads'>All Threads</option>
                            <option value='my_threads' name='my_threads'>My Threads</option>
                        </select>
                        <br><br><label>Type:</label><br>
                        <select style='width:100%;height:30px;'>
                                <option value='Solved'>Solved</option>
                                <option value='Unsolved'>Unsolved</option>
                                <option value='all'>All</option>
                        </select>
                        <br><br><label>Category:</label><br>
                        <select style='width:100%;height:30px;'>
                            <option value='EE'  selected='selected'>Electrical/Electronic Engineering</option>
                            <option value='ME'>Mechanical Engineering</option>
                            <option value='AE'>Aerospace Engineering</option>
                            <option value='RE'>Robotics/Mechatronics Engineering</option>
                            <option value='CE'>Civil Engineering</option>
                            <option value='ME'>Mechanical Engineering</option>
                            <option value='HH'>Agriculture</option>
                            <option value='BM'>Bio-Medical Engineering</option>
                            <option value='SE'>Software Engineering</option>
                            <option value='COM'>Computer Engineering</option>
                            <option value='CS'>Computer Science</option>
                            <option value='EP'>Engineering Physics</option>
                            <option value='ARD'>Architecture/Design</option>
                            <option value='TE'>Textile Engineering</option>
                            <option value='HHE'>House Hold Electricity/Electricals</option>
                            <option value='HHG'>House Hold Gardening</option>
                            <option value='HHG'>Other</option>
                        </select>
                        <button type='submit' name='sort_thread' class='btn'>FILTER</button>
                    </form>
                <div>
                <?php
                    while($data=mysqli_fetch_array($result)){
                        $threadTitle=$data['thread_title'];
                        $thread_id=$data['id'];
                        $thread_date=$data['thread_date'];
                        echo "<div align='left' class='ground_style_unsolved'>    
                                <a href="."./com_page.php?id=".$thread_id."><i>".$threadTitle.'</i></a><br>['.$thread_date.']</div><br>';
                    }
                ?>
                <div align='left' class='ground_style_solved'>
                    <a>Arduino I2C Explained</a>
                </div>
                <br><br><br>
            </div>
        </body>
    </html>