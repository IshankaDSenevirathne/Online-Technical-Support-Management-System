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
                <h3 style="display:inline;"><a align="center"><img src='./Images/kisspng-robotics-internet-.png' align='center'><font color='black'><b>tek<font color='#0975A5' size='5'>MART</b></font></font></a></h3>
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
                    <div style="padding-left:10px;padding-top:10px;padding-bottom:10px;">
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
                                        <td rowspan="12" class='economy'> <center><h3>SERVICE ECONOMY</h3>
                                                <img src="./Images/BotExpression_Idle-Light.gif"></center>
                                                <p><b><i>Welcome to tekCarpet!</i></b><br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam quas, quidem modi voluptatibus alias magnam facere iusto minus voluptatum veritatis dolores. Voluptatibus quod ex quidem qui nisi nihil illum earum hic eius voluptatem commodi deleniti consequatur fugit inventore, ratione accusamus numquam laudantium quas culpa perspiciatis recusandae adipisci asperiores. Praesentium rerum odio culpa voluptas laboriosam inventore vitae dicta velit facilis fuga mollitia maxime provident totam distinctio, quisquam explicabo qui blanditiis esse molestias sed. Magnam, in, iste ad quidem recusandae fugiat, repellendus rerum quia quaerat sit id libero eos facere nemo pariatur sunt mollitia. Iusto alias, animi iure odio consequatur soluta error culpa reiciendis sequi obcaecati, fugiat officiis quo voluptas itaque et blanditiis facilis sapiente molestias dolores? Numquam magnam fugit alias sit repudiandae quae amet quisquam nostrum nobis, perferendis, perspiciatis soluta beatae odio ullam, nihil cupiditate quo at facere aliquid blanditiis. Totam, qui, quisquam nobis sunt officia voluptatem libero exercitationem laborum sed aspernatur tenetur vitae magni aliquid soluta ea praesentium cumque nisi suscipit! Nobis similique deleniti voluptate consectetur sapiente, molestiae doloribus sit nemo molestias excepturi provident repudiandae suscipit quaerat aliquam ipsa cumque. Fugit eum maxime dolorem ipsa, consequuntur impedit neque nulla? Illo ratione vitae, recusandae vel dignissimos vero est consectetur delectus, soluta quia veniam placeat provident quo iste. Nostrum, asperiores! Laboriosam suscipit facilis et explicabo vero ut sunt incidunt, optio nemo debitis! Mollitia debitis at maxime modi doloremque velit quidem expedita, minus laborum, architecto quam harum ullam repellendus pariatur in facere. Unde id voluptates omnis. Eaque voluptatum id tenetur, adipisci quae non cupiditate corporis, ratione distinctio laboriosam consectetur fugiat, in mollitia itaque vero corrupti? Mollitia magni sequi impedit animi illum illo iure magnam dolores! Provident molestiae corrupti, ipsam fuga esse consectetur impedit at? Repellat iste laborum asperiores! Perspiciatis harum mollitia dolorem dignissimos deleniti tenetur quod nulla modi, omnis ut voluptatem, animi ad optio, odio ex aspernatur. Optio minima rerum expedita autem iusto eveniet quae vitae asperiores debitis ipsam necessitatibus rem id sunt numquam repellat facere quidem voluptate, et, deleniti saepe nemo nihil. Quae quam laboriosam voluptates, quisquam libero laudantium commodi, dicta iste ratione delectus quidem similique voluptatibus? Non rem, doloribus nobis beatae modi eaque pariatur culpa iste, commodi ut obcaecati voluptatum corporis quos quaerat impedit molestias aut in, delectus harum quo? Molestiae ipsa cupiditate sapiente? Adipisci sed fugiat autem id odit unde mollitia numquam dicta natus, inventore explicabo porro neque voluptates illo velit laborum corporis necessitatibus reprehenderit obcaecati, molestias aliquid. Inventore, eaque tenetur repellendus consequuntur assumenda praesentium totam, error ipsa, laudantium voluptatum accusantium cum unde quaerat sapiente. Autem numquam assumenda sed quasi, alias quisquam excepturi, suscipit quos necessitatibus porro quo vitae, eum dolores deleniti illo repudiandae tempore. Sed et repellat, asperiores id cum voluptatem atque quia mollitia error, quae, facilis ea quod ut dolore minus commodi ipsam laudantium fugit totam provident voluptates saepe ratione? Deleniti debitis ab provident impedit ullam voluptatibus a ad eos, ea exercitationem suscipit corporis assumenda inventore vero sed ducimus aperiam? Voluptas, nisi quo ad id unde aperiam rem, minima obcaecati deserunt quis dolore eos inventore? Culpa, eius illo.</p>
                                        </td>
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
                                        <td  align='justify'><label><?php echo $sp_intro ?></label></td>
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
                    <div>
                        <h4  style='background-color:#E0F6E3;border:none'>ONGOING</h4>
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
                              if($jobstatus){
                                echo "<button class='active_projects' onclick="."window.location='./includes/manage_projects.php?sp_id=$sp_Id&thread_id=$thread_id&client_id=$client_id&job_status=accepted'".">$thread<br></button>";
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
                                echo "<button class='closed_projects' onclick="."window.location='./includes/manage_projects.php?sp_id=$sp_Id&thread_id=$thread_id&client_id=$client_id&job_status=closed'".">$thread<br></button>";
                              }
                            }
                        ?>
                    </div>
                    <hr> <div>
                        <h3 align='center'>NOTIFICATIONS</h3>
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
                                echo  "<button class='notifications' onclick="."window.location='./includes/manage_projects.php?sp_id=$sp_Id&thread_id=$thread_Id&client_id=$client_id&job_status=pending'"."><b>[<font color='#E86D6D'>$acc_date</font>]</b><br><b>[<font color='#6DE898'>$client_name</font>]</b> hired your company for the following query you have answered <b>[<font color='#099145'>$thread_title</font>]</b> <br><font color='#6DB0E8'><b>(Click to Accept)</b></font></button>";
                                $i++;
                                if($i==10){
                                    break;
                                }
                            }
                        ?>
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
