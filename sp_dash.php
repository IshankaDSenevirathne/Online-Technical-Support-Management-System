<?php
    include './includes/dbConnect.php';
    session_start();
    $sp_Id=$_SESSION['ID'];
    $query="SELECT * FROM service_provider_data WHERE sp_Id=$sp_Id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $sp_name =$data['sp_name'];    
    $sp_country =$data['sp_country'];
    $sp_tags =$data['sp_tags'];
    $sp_email =$data['sp_email'];
    $sp_contact =$data['sp_contact'];
    $sp_state =$data['sp_state'];
    $sp_intro =$data['sp_intro'];
    $sp_motto =$data['sp_motto'];
    $ratings=$data['total_ratings'];
    $count=$data['review_count'];
    if($count==0){
        $avg_rating=0;    
    }else{
        $avg_rating=ceil($ratings/$count);
    }
    $comments=explode(',',$data['comments']);
    unset($comments[0]);


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='./Style/sp_dash.css'>
        <link href="./Styles/graph.css" rel="stylesheet" />
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
                <a href="querywall_sp.php">QUERIES</a>
                <a href='#profile'>PROFILE</a>
                <a href='#projects'>PROJECTS</a>
                <a href='#notifications'>NOTIFICATIONS</a>
                <button class='logout' onclick="logout()">LOGOUT</button>
            </div>
                <div>
                    <div style="padding-left:10px;padding-top:10px;padding-bottom:10px;border-right:10px solid #7081ED;border-radius:2px;background-color:#F7F7F7">
                        <h1><?php echo 'WELCOME <font color="#7081ED">'.strtoupper($sp_name).'</font>'; ?></h1> 
                    </div>
                    <div>
                    <h3 id='profile' style='padding-left:10px;border-right:10px solid black;border-radius:2px;background-color:#F7F7F7'>PROFILE</h3>
                    <!--add a profile brief and banner -->
                            <table cellpadding='10px'>
                                <tbody>
                                    <tr>
                                        <td><b>Company Name</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_name; ?></label></td>
                                        <td rowspan='12'><img src='./Images/ezgif.com-resizee.gif'></td>
                                    </tr>
                                    <tr>
                                        <td><b>Headquarters</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_country; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Specialized In</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_tags; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_email; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Contact No</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_contact; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>State</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_state; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Motto</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_motto ?></label></td>
                                    </tr>
                                </tbody>
                            </table>
                    <div style='padding:10px;border-radius:2px;background-color:#F7F7F7'>
                        <h4>ABOUT</h4>
                        <?php echo "<p align='justify'>".$sp_intro."</p>" ?>
                    </div>
                    <hr>
                    <h3 align='center' id ='projects'>PROJECTS</h3>
                    <div>
                        <h4  style='background-color:#E0F6E3;border:none'>ONGOING</h4>
                        <?php
                            $query="SELECT jobstatus,thread_id,client_id FROM projects WHERE sp_id=$sp_Id";
                            $result=mysqli_query($connection,$query);
                            while($data=mysqli_fetch_assoc($result)){
                              $jobstatus= $data['jobstatus'];
                              $thread_id=$data['thread_id'];
                              $client_id=$data['client_id'];
                              $query="SELECT thread_title FROM thread_data WHERE id=$thread_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $thread=$data2['thread_title'];
                              if($jobstatus){
                                echo "<button class='active_projects' onclick="."window.location='./includes/manage_projects.php?thread_id=$thread_id&client_id=$client_id&job_status=accepted'".">$thread<br></button>";
                              }
                            }
                        ?>
                    </div>
                    <div>
                        <h4 style='background-color:#F6E0E0;border:none'>CLOSED</h4>
                        <?php
                            $query="SELECT jobstatus,thread_id,client_id FROM projects WHERE sp_id=$sp_Id";
                            $result=mysqli_query($connection,$query);
                            while($data=mysqli_fetch_assoc($result)){
                              $jobstatus= $data['jobstatus'];
                              $thread_id=$data['thread_id'];
                              $client_id=$data['client_id'];
                              $query="SELECT thread FROM thread_data WHERE id=$thread_id";
                              $result2=mysqli_query($connection,$query);
                              $data2=mysqli_fetch_assoc($result2);
                              $thread=$data2['thread'];
                              if(!$jobstatus){  
                                echo "<button class='closed_projects' onclick="."window.location='./includes/manage_projects.php?thread_id=$thread_id&client_id=$client_id&job_status=closed'".">$thread<br></button>";
                              }
                            }
                        ?>
                    </div>
                    <hr> <div>
                        <h3 align='center' id='notifications'>NOTIFICATIONS</h3>
                        <?php
                            $query="SELECT * FROM active_hire WHERE sp_id=$sp_Id";
                            $result=mysqli_query($connection,$query);
                            $i=0; 
                            while( $data=mysqli_fetch_assoc($result)){
                                $thread_Id=$data['thread_id'];
                                $thread_title=$data['discription'];
                                $acc_date=$data['acc_date'];
                                $client_name=$data['client_name'];
                                $client_id=$data['client_id'];
                                echo  "<button class='notifications' onclick="."window.location='./includes/manage_projects.php?thread_id=$thread_Id&client_id=$client_id&job_status=pending'"."><b>[<font color='#E86D6D'>$acc_date</font>]</b><br><b>[<font color='#6DE898'>$client_name</font>]</b> hired your company for the following query you have answered <b>[<font color='#099145'>$thread_title</font>]</b> <br><font color='#6DB0E8'><b>(Click to Accept)</b></font></button>";
                                $i++;
                                if($i==10){
                                    break;
                                }
                            }
                        ?>
                    </div>
                    <hr>
                    <h4>RATINGS</h4>
                    <?php 
                        for($i=0;$i<$avg_rating;$i++){
                            echo "<font size = '6px' color='orange'>★</font>";
                        }
                        for($i=1;$i<=5-$avg_rating;$i++){
                            echo "<font size = '6px' color='grey'>★</font>";
                        }  
                    ?>
                    <hr>
                    <h4>USER REVIEWS</h4>
                    <?php
                        $i=0;
                        foreach($comments as $comment){
                            if($i==10){
                                break;
                            }
                            echo "<p style='padding:10px;border-radius:2px;background-color:#F7F7F7'>".$comment."</p>";
                            $i++;
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
