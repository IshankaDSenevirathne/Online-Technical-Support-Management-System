<!-- <?php
include './includes/dbConnect.php';
session_start();
$admin_Id=$_SESSION['ID'];
$query="SELECT * FROM admin_data WHERE admin_Id=$admin_Id";
$result=mysqli_query($connection,$query);
$data=mysqli_fetch_assoc($result);
$adminUsername=$data['admin_Username'];
$adminFirstname=$data['admin_Firstname'];
$adminLastname=$data['admin_Lastname'];
$adminGender=$data['admin_Gender'];
$adminAge=$data['admin_Age'];
$adminCountry=$data['admin_Country'];
$adminAddress=$data['admin_Address'];
$adminContact=$data['admin_Contact'];
$adminEmail=$data['admin_Email'];
$adminOccupation=$data['admin_Role'];


?> -->
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='./Style/admin_dash.css'>
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
        <div>
            <div class='navbar'>
                <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='#747474'><b>Tech<font color='#519C74' size='5'>NoBoT</b></font></font></a></h3>
                <a href='#profile'>PROFILE</a>
                <a href='./admin_signup.html'>NEW MODERATOR</a>
                <a href='#client_data'>CLIENT DATA</a>
                <a href='#vendor_data'>VENDOR DATA</a>
                <a href='#query_data'>REVIEW QUERIES</a>
                <button class='logout' onclick="logout()">LOGOUT</button>
            </div>
        </div>
        <div class='content_section'>
            <div style="height:70px;padding:10px;margin-bottom:15px;border-right:10px solid #FF0000;border-radius:2px;background-color:#F7F7F7;">
                <h1><?php echo 'WELCOME <font color="#FF0000">'.strtoupper($adminUsername).'</font>'; ?></h1> 
            </div>
            <h3 id='#profile' style='padding-left:10px;border-right:10px solid black;border-radius:2px;background-color:#F7F7F7'>PROFILE</h3>
            <div>

                <table cellpadding='10px' class='table_prof'>
                    <tbody>
                        <tr>
                            <td><b>First Name</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminFirstname; ?></label></td>
                            <td rowspan='12'><img src='./Images/ezgif.com-resize.gif'></td>
                        </tr>
                        <tr>
                            <td><b>Last Name</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminLastname; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Gender</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminGender; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Age</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminAge; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Country</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminCountry; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Home Address</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminAddress; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Contact No</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminContact; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminEmail; ?></label></td>
                        </tr>
                        <tr>
                            <td><b>Occupation</b></td>
                            <td>:</td>
                            <td><label><?php echo $adminOccupation; ?></label></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        <center>
            <h1>MANAGE ACCOUNTS</h1>
            <h2 id='client_data'>CLIENT DATA</h2>
            <div>
                <?php
                    $query="SELECT * FROM client_data";
                    $result=mysqli_query($connection,$query);
                    echo "<table cellpadding='4' class='table_data'><thead><tr><td><b>REMOVE</b></td><td><b>FIRST NAME</b></td><td><b>LAST NAME</b></td><td><b>USERNAME</b></td><td><b>PASSWORD</b></td><td><b>EMAIL</b></td><td><b>COUNTRY</b></td><td><b>CONTACT NUMBER</b></td><td><b>ADDRESS</b></td><td><b>BIRTHDATE</b></td><td><b>AGE</b></td><td><b>OCCUPATION</b></td><td><b>INTERESTS</b></td><td><b>GENDER</b></td><td><b>ID</b></td></tr></thead><tbody>";
                    while($data=mysqli_fetch_assoc($result)){
                        $sp_Id='default';
                        $thread_id='default';
                        $client_Id=$data['clientId'];
                        echo "<tr><td><button class='btn_rmv' onclick="."window.location='./includes/rmv.php?sp_id=$sp_Id&thread_id=$thread_id&client_id=$client_Id'"." name='rmv'></button></td><td>".$data['clientFirstname']."</td><td>".$data['clientLastname']."</td><td>".$data['clientUsername']."</td><td>".$data['clientPassword']."</td><td>".$data['clientEmail']."</td><td>".$data['clientCountry']."</td><td>".$data['clientContact']."</td><td>".$data['clientAddress']."</td><td>".$data['clientBirthdate']."</td><td>".$data['clientAge']."</td><td>".$data['clientOccupation']."</td><td>".$data['clientInterests']."</td><td>".$data['clientGender']."</td><td>".$client_Id."</td></tr>"; 
                    }
                    echo "</tbody></table>";
                ?>
            <div>
            <br>
            <hr>
            <h2 id='vendor_data'>VENDOR DATA</h2>
            <div>
                <?php
                    $query="SELECT * FROM service_provider_data";
                    $result=mysqli_query($connection,$query);
                    echo "<table cellpadding='4' class='table_data'><thead><tr><td><b>REMOVE</b></td><td><b>COMPANY NAME</b></td><td><b>COMPANY PASSWORD</b></td><td><b>COUNTRY</b></td><td><b>EMAIL</b></td><td><b>CONTACT NUMBER</b></td><td><b>STATE</b></td><td><b>ID</b></td></thead><tbody>";
                    while($data=mysqli_fetch_assoc($result)){
                        $thread_id='default';
                        $client_Id='default';
                        $sp_Id=$data['sp_Id'];
                        echo "<tr><td><button class='btn_rmv' onclick="."window.location='./includes/rmv.php?sp_id=$sp_Id&thread_id=$thread_id&client_id=$client_Id'"." name='rmv'></button></td><td>".$data['sp_name']."</td><td>".$data['sp_password']."</td><td>".$data['sp_country']."</td><td>".$data['sp_email']."</td><td>".$data['sp_contact']."</td><td>".$data['sp_state']."</td><td>".$data['sp_Id']; 
                    }
                    echo "</tbody></table>";
                ?>
            <div>
            <br>
            <hr>
            <h2 id='query_data'>QUERY DATA</h2>
            <div>
                <?php
                    $query="SELECT * FROM thread_data";
                    $result=mysqli_query($connection,$query);
                    echo "<table cellpadding='4' class='table_data'><thead><tr><td><b>REMOVE</b></td><td><b>QUERY TITLE</b></td><td><b>QUERY</b></td><td><b>CATEGORY</b></td><td><b>DATE ADDED</b></td><td><b>CLIENT USERNAME</b></td><td><b>CLIENT ID</b></td><td><b>QUERY ID</b></td></thead><tbody>";
                    while($data=mysqli_fetch_assoc($result)){
                        $thread_id=$data['id'];
                        $client_Id='default';
                        $sp_Id='default';
                        echo "<tr><td><button class='btn_rmv' onclick="."window.location='./includes/rmv.php?sp_id=$sp_Id&thread_id=$thread_id&client_id=$client_Id'"." name='rmv'></button></td><td>".$data['thread_title']."</td><td>".$data['thread']."</td><td>".$data['thread_category']."</td><td>".$data['thread_date']."</td><td>".$data['username']."</td><td>".$data['userId']."</td><td>".$data['id']; 
                    }
                    echo "</tbody></table>";
                ?>
            <div>
        </div>
        </center>
    </body>
</html>