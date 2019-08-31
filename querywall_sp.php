<?php 
include './includes/dbConnect.php';
session_start();
$sp_Id=$_SESSION['ID'];

$query="SELECT * FROM thread_data";
$result=mysqli_query($connection,$query);
mysqli_close($connection);
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
                    <a href='sp_dash.php'>PROFILE</a>
                    <a href='./includes/logout.php'>LOGOUT</a>
                </div>
           </div>
           <div style='background-color:white;'>
                <h2 align='center'>QUERY WALL</h2>
                <div>
                <?php
                   while($data=mysqli_fetch_array($result)){
                    $threadTitle=$data['thread_title'];
                    $thread_id=$data['id'];
                    $thread_date=$data['thread_date'];
                    echo "<div align='left' class='ground_style_solved'>    
                            <a href="."./com_page_sp.php?thread_id=".$thread_id."><i>".$threadTitle.'</i></a><br>['.$thread_date.']</div><br>';
                }
                ?>
                <br><br><br>
            </div>
        </body>
    </html>