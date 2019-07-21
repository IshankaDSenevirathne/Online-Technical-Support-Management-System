<?php
$thread_id=$_REQUEST['thread_id'];
$sp_id=$_REQUEST['sp_id'];
$client_id=$_REQUEST['client_id'];
$post=$_POST['sp_comment'];

if(isset($_POST['submit_post'])){
    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die("Database connection failed");
    }
    $query="INSERT INTO chat_data(thread_id,post,sp_id,client_id)VALUES ($thread_id,'$post',$sp_id,$client_id)";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:manage_projects.php?thread_id=$thread_id&sp_id=$sp_id&client_id=$client_id&job_status=pending");
        }
    mysqli_close($connection);
    }
else if(isset($_POST['accept_job'])){

    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die("Database connection failed");
    }
    $query="INSERT INTO projects(sp_id,client_id,jobstatus,thread_id)VALUES ($sp_id,$client_id,1,$thread_id)";
    $result=mysqli_query($connection,$query);
    if($result){
    
    header("location:manage_projects.php?thread_id=$thread_id&sp_id=$sp_id&client_id=$client_id&job_status=accepted");
    }
    mysqli_close($connection);
}
else if(isset($_POST['decline_job'])){

    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die("Database connection failed");
    }
    $query="DELETE FROM active_hire WHERE thread_id = $thread_id";
    $result=mysqli_query($connection,$query);
    $query="DELETE FROM chat_data WHERE thread_id = $thread_id";
    $result=mysqli_query($connection,$query);
    if($result){
    header("location:../sp_dash.php?id=$sp_id");
    }
    mysqli_close($connection);
}    
?>