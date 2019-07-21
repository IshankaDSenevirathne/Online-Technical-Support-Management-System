<?php
    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    $user_Id=$_REQUEST['user_id'];
    $thread_Id=$_REQUEST['thread_id'];
   
    //fetch service provider data

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die('database connection failed').mysqli_error($connection);
    }
    $sp_Id=$_REQUEST['sp_id'];
    $query="SELECT * FROM service_provider_data WHERE sp_Id=$sp_Id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $sp_name =$data['sp_name'];    
    $sp_country =$data['sp_country'];
    $sp_email =$data['sp_email'];
    $sp_intro =$data['sp_intro'];


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='./Style/sp_profilecard.css'>
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
        <!--Service provider data-->
        <div class='main-container'>
            <label style='font-size:45px'>PROFILE</label><br>
            <label class='title-name'><b><?php echo $sp_name ?><b></label><br><br>
            <table width=100%>
                <tbody  align='center'>
                        <tr>
                            <td width=30%></b>RATINGS<b></td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td><b>LOCATION</b></td>
                            <td><?php echo $sp_country ?></td>
                        </tr>
                        <tr>
                            <td><b>SPEACIALITY</b></td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <td><b>ABOUT</b></td>
                            <td align="justify"><?php echo $sp_intro ?></td>
                        </tr>
                        <tr>
                            <td><b>WEBSITE</b></td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td><b>FEEDBACK</b></td>
                            <td>B</td>
                        </tr>
                </tbody>
            </table>
            <br>
            <?php
                echo "<a class='hire' href='./includes/hire.php?user_id=$user_Id&sp_id=$sp_Id&thread_id=$thread_Id'><b>HIRE!</b></a>"
            ?>        
        </div>
    </body>
</html>