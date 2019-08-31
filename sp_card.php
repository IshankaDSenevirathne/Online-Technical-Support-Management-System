<?php
    include './includes/dbConnect.php';
    session_start();
    $user_Id=$_SESSION['ID'];
    $thread_Id=$_REQUEST['thread_id'];
    $sp_Id=$_REQUEST['sp_id'];
    $query="SELECT * FROM service_provider_data WHERE sp_Id=$sp_Id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $sp_name =$data['sp_name'];    
    $sp_country =$data['sp_country'];
    $sp_email =$data['sp_email'];
    $sp_intro =$data['sp_intro'];
    $sp_state=$data['sp_state'];
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
        <link rel='stylesheet' href='./Style/sp_profilecard.css'>
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
         <!--navbar-->
         <div class='navbar'>
            <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#519C74' size='5'>NoBoT</b></font></font></a></h3>
            <a href='./client_dash.php'>PROFILE</a>
            <button class='logout' onclick="logout()">LOGOUT</button>
        </div>
        <!--Service provider data-->
        <div class='main-container'>
            <label style='font-size:45px'>PROFILE</label><br>
            <label class='title-name'><b><?php echo $sp_name ?></b></label><br><br>
            <table width=100% cellpadding='5'>
                <tbody  align='left'>
                        <tr>
                            <td width=30%><b>RATINGS</b></td>
                            <td><?php  
                                for($i=0;$i<$avg_rating;$i++){
                                    echo "<font size = '6px' color='orange'>★</font>";
                                }
                                for($i=1;$i<=5-$avg_rating;$i++){
                                    echo "<font size = '6px' color='grey'>★</font>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>LOCATION</b></td>
                            <td><?php echo $sp_country ?></td>
                        </tr>
                        <tr>
                            <td><b>STATE</b></td>
                            <td><?php echo $sp_state ?></td>
                        </tr>
                        <tr>
                            <td><b>ABOUT</b></td>
                            <td align="justify"><?php echo $sp_intro ?></td>
                        </tr>
                        <tr>
                            <td><b>EMAIL</b></td>
                            <td><?php echo $sp_email ?></td>
                        </tr>
                        <tr>
                            <td><b>FEEDBACK</b></td>
                            <td><?php
                                    $i=0;
                                    foreach($comments as $comment){
                                        if($i==10){
                                            break;
                                        }
                                        echo "<p class='comment'>".$comment."</p>";
                                        $i++;
                                    }
                                ?>
                            </td>
                        </tr>
                </tbody>
            </table>
            <br>
            <center>
                <?php
                    echo "<a class='hire' href='./includes/hire.php?&sp_id=$sp_Id&thread_id=$thread_Id'><b>HIRE!</b></a>"
                ?>
            </center>
        </div>
    </body>
</html>