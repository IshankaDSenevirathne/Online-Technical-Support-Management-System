<!-- <?php
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
$admin_Id=$_REQUEST['id'];
$query="SELECT * FROM admin_data WHERE admin_Id=$admin_Id";
$result=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($result);
$adminUsername=$data['adminUsername'];
$adminFirstname=$data['adminFirstname'];
$adminLastname=$data['adminLastname'];
$adminGender=$data['adminGender'];
$adminAge=$data['adminAge'];
$adminCountry=$data['adminCountry'];
$adminAddress=$data['adminAddress'];
$adminContact=$data['adminContact'];
$adminEmail=$data['adminEmail'];
$adminOccupation=$data['adminOccupation'];
?> -->
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='./Style/admin_dash.css'>
    </head>
    <body>
        <div>
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
        </div>
        <div class='content_section'>
        <center>
            <h1>MANAGE ACCOUNTS</h1>
        </center>
            <div style='padding:10px 10px 15px 10px;margin:10px 40px 15px 40px;'>
                    <h3>SORT BY</h3>
                    <form method='post' action='./includes/threadwall_push_request.php<?php echo '?id='.$clientId; ?>'>
                       <select>
                           <option selected='selected'>Service Providers</option>
                           <option>Clients</option>
                        </select>
                        <button type='submit' name='sort_list'>Filter</button>
                    </form>
                <div>
        </div>
    </body>
</html>