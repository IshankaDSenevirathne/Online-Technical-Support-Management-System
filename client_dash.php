<?php
include './includes/dbConnect.php';
session_start();
$clientId=$_SESSION['ID'];
$query="SELECT * FROM client_data WHERE clientId=$clientId";
$result=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($result);
$clientUsername=$data['clientUsername'];
$clientFirstname=$data['clientFirstname'];
$clientLastname=$data['clientLastname'];
$clientGender=$data['clientGender'];
$clientAge=$data['clientAge'];
$clientCountry=$data['clientCountry'];
$clientAddress=$data['clientAddress'];
$clientContact=$data['clientContact'];
$clientEmail=$data['clientEmail'];
$clientOccupation=$data['clientOccupation'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='./Style/client_dash.css'>
        <script>
            function logout(){
                d=confirm("you will be logged out");
                if (d==true) {
                    window.location='./includes/logout.php';
                }
            }
        </script>
    </head>
    <body>
        <div style='background-color:white;padding:20px 10px 20px 10px;'>
            <div class='navbar'>
                <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#5274CD' size='5'>NoBoT</b></font></font></a></h3>
                <a href="querywall_client.php">ASK !</a>
                <a href='#profile'>PROFILE</a>
                <a href='#notifications'>NOTIFICATIONS</a>
                <a href='./client_password_update.html'>UPDATE PASSWORD</a>
                <button class='logout' onclick="logout()">LOGOUT</button>
            </div>
                <div> 
                    <div style="height:70px;padding:10px;margin-bottom:15px;border-right:10px solid #36C274;border-radius:2px;background-color:#F7F7F7;">
                        <h1><?php echo 'WELCOME <font color="#28B463">'.strtoupper($clientUsername).'</font>'; ?></h1> 
                    </div>
                    <h3 style='padding-left:10px;border-right:10px solid black;border-radius:2px;background-color:#F7F7F7' id='profile'>PROFILE</h3>
                    <div>

                        <table cellpadding='10px'>
                            <tbody>
                                <tr>
                                    <td><b>First Name</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientFirstname; ?></label></td>
                                    <td rowspan='12'><img src='./Images/ezgif.com-gif-maker.gif'></td>
                                </tr>
                                <tr>
                                    <td><b>Last Name</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientLastname; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Gender</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientGender; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Age</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientAge; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Country</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientCountry; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Home Address</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientAddress; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Contact No</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientContact; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientEmail; ?></label></td>
                                </tr>
                                <tr>
                                    <td><b>Occupation</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientOccupation; ?></label></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h3 align='center'>QUERY HISTORY</h3>
                        <div>
                            <h4 style='background-color:#E0F6E3;border:none'>OPEN:</h4>
                            <?php
                            $query="SELECT jobstatus,thread_id,sp_id FROM projects WHERE client_id=$clientId";
                            $result=mysqli_query($connection,$query);
                            while($data=mysqli_fetch_assoc($result)){
                              $jobstatus= $data['jobstatus'];
                              $thread_id=$data['thread_id'];
                              $sp_id=$data['sp_id'];
                              $query="SELECT thread_title FROM thread_data WHERE id=$thread_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $thread=$data2['thread_title'];
                              if($jobstatus){
                                echo "<button class='hired_active_projects' onclick="."window.location='./includes/user_hired_projects.php?sp_id=$sp_id&thread_id=$thread_id&user_id=$clientId&status=pending'".">$thread<br></button>";
                              }
                            }
                        ?>
                        </div>
                        <div>
                        <h4 style='background-color:#F6E0E0;border:none'>CLOSED</h4>
                        <?php
                            $query="SELECT jobstatus,thread_id,sp_id FROM projects WHERE client_id=$clientId";
                            $result=mysqli_query($connection,$query);
                            while($data=mysqli_fetch_assoc($result)){
                              $jobstatus= $data['jobstatus'];
                              $thread_id=$data['thread_id'];
                              $sp_id=$data['sp_id'];
                              $query="SELECT thread FROM thread_data WHERE id=$thread_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $thread=$data2['thread_title'];
                              if(!$jobstatus){  
                                echo "<button class='hired_closed_projects' onclick="."window.location='./includes/user_hired_projects.php?sp_id=$sp_id&thread_id=$thread_id&user_id=$clientId&status=solved'".">$thread<br></button>";
                              }
                            }
                        ?>
                        </div>
                        <hr>
                        <div>
                        <h3 align='center' id='notifications'>NOTIFICATIONS</h3>
                        <?php
                            $query="SELECT jobstatus,thread_id,sp_id FROM projects WHERE client_id=$clientId";
                            $result=mysqli_query($connection,$query);
                            $i=0;
                            while($data=mysqli_fetch_assoc($result)){
                              if($i==10){
                                  break;
                              }
                              $jobstatus= $data['jobstatus'];
                              $thread_id=$data['thread_id'];
                              $sp_id=$data['sp_id'];
                              $query="SELECT thread FROM thread_data WHERE id=$thread_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $thread=$data2['thread'];
                              $query="SELECT sp_name FROM service_provider_data WHERE sp_Id=$sp_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $spname=$data2['sp_name'];
                      
                              if($jobstatus){
                                echo "<button class='notifications' onclick="."window.location='./includes/user_hired_projects.php?sp_id=$sp_id&thread_id=$thread_id&user_id=$clientId'".'><b>'.$spname.'</b> has accepted your job offer on the query you posted:<br><b>['.$thread.']</b></button><br>';
                                $i++;
                              }
                            }
                        ?>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </body>
</html>
