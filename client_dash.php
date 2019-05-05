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
    </head>
    <body>
        <div style='background-color:white;padding:20px 10px 20px 10px;'>
            <div class='navbar'>
                <h3 style="display:inline;"><a align="center"><img src='./Images/211148883Untitled-3-512.png' align='center'><font color='black'><b>tek<font color='#0975A5' size='5'>MART</b></font></font></a></h3>
                <a>EXPLORE</a>
                <a>INNOVATE</a>
                <a href="querywall_client.php<?php echo '?id='.$clientId;?>">ASK !</a>
                <a>USER GUIDE</a>
                <a>ABOUT</a>
                <input type='text' placeholder='Search...'>
                <a>PROFILE</a>
                <a>NOTIFICATIONS</a>
            </div>
                <div> 
                    <div class='dash_logo'>
                        <h3 align='center'>NOTIFICATIONS</h3>
                        <div  style='background-color:transparent;'>
                            <p><b><i>Welcome to tekCarpet!</i></b><br>tekCarpet keeps you in touch with the worlds bleeding edge technology and lets you to hire worlds best Technical Service Providers,Enthusiasts to help you resolve your technical problems efficiently!</p>
                        </div>
                    </div>
                    <div style="height:70px;padding-left:120px;padding-top:5px;margin-bottom:15px;">
                        <h1 name='clientUsername' id='clientUsername'><?php echo 'WELCOME <font color="#28B463">'.strtoupper($clientUsername).'</font>'; ?></h1> 
                    </div>
                    <div style='height:300px'>
                    
                    </div>
                    <div>

                        <table cellpadding='10px'>
                            <tbody>
                                <tr>
                                    <td><b>First Name</b></td>
                                    <td>:</td>
                                    <td><label><?php echo $clientFirstname; ?></label></td>
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
                        <h3 align='center'>THREAD HISTORY</h3>
                        <div style='background-color:#E0F6E3;border:none'>
                            <h4>Open Threads:</h4>
                        </div>
                        <div style='background-color:#F6E0E0;border:none'>
                            <h4>Closed Threads:</h4>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </body>
</html>
