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
        die('database connection failed').mysqli_error($connection);
    }
    $sp_Id=$_REQUEST['id'];
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
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='./Style/sp_dash.css'>
    </head>
    <body>
        <div style='background-color:white;padding:20px 10px 20px 10px;'>
            <div class='navbar'>
                <h3 style="display:inline;"><a align="center"><img src='./Images/211148883Untitled-3-512.png' align='center'><font color='black'><b>tek<font color='#0975A5' size='5'>MART</b></font></font></a></h3>
                <a>EXPLORE</a>
                <a>INNOVATE</a>
                <a href="querywall_sp.php<?php echo '?id='.$sp_Id; ?>">QUERIES</a>
                <a>USER GUIDE</a>
                <a>ABOUT</a>
                <input type='text' placeholder='Search...'>
                <a>PROJECTS</a>
                <a>NOTIFICATIONS</a>
            </div>
                <div>
                <div class='dash_logo'>
                        <h3 align='center'>NOTIFICATIONS</h3>
                        <div  style='background-color:transparent;'>
                            <p><b><i>Welcome to tekCarpet!</i></b><br>tekCarpet keeps you in touch with the worlds bleeding edge technology and lets you to hire worlds best Technical Service Providers,Enthusiasts to help you resolve your technical problems efficiently!</p>
                        </div>
                    </div>
                    <div style="height:70px;padding-left:10px;padding-top:5px;padding-bottom:24px;">
                        <h1 name='clientUsername' id='clientUsername'><?php echo strtoupper($sp_name); ?></h1> 
                    </div>
                    <div>
                    <h3 style='padding-left:10px'>PROFILE</h3>
                    <!--add a profile brief and banner -->
                        <br><br>
                            <table cellpadding='10'>
                                <tbody>
                                    <tr>
                                        <td><b>Company/Organization Name</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_name; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Available Countries</b></td>
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
                                        <td><b>Brief</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_intro ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><b>Motto</b></td>
                                        <td>:</td>
                                        <td><label><?php echo $sp_motto ?></label></td>
                                    </tr>
                                </tbody>
                            </table>
                    <hr>
                    <h3 align='center'>PROJECTS</h3>
                    <div style='background-color:#E0F6E3;border:none'>
                        <h4>ONGOING</h4>
                    </div>
                    <div style='background-color:#F6E0E0;border:none'>
                        <h4>CLOSED</h4>
                    </div>
                    <div>
                        <button class='add_project' onclick="window.location='./add_project.php'">MANAGE</button>
                    </div>
                    <hr><h3 align='center'>SERVICE ECONOMY</h3>
                    <div  style='background-color:#E6E6E6;border:none'>
                        <p><b><i>Welcome to tekCarpet!</i></b><br>tekCarpet keeps you in touch with the worlds bleeding edge technology and lets you to hire worlds best Technical Service Providers,Enthusiasts to help you resolve your technical problems efficiently!</p>
                    </div>
                    <hr><h3 align='center'>SERVICE STATUS</h3>
                    <div  style='background-color:#E6E6E6;border:none'>
                        <p><b><i>Welcome to tekCarpet!</i></b><br>tekCarpet keeps you in touch with the worlds bleeding edge technology and lets you to hire worlds best Technical Service Providers,Enthusiasts to help you resolve your technical problems efficiently!</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
