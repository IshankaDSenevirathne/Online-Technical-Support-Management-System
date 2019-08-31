<?php
session_start();
if(isset($_POST['submit_post'])){
    
    $thread_id=$_REQUEST['thread_id'];
    $sp_id=$_REQUEST['sp_id'];
    $client_id=$_SESSION['ID'];
    $post=$_POST['sp_comment'];

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
    $query="INSERT INTO chat_data(thread_id,post,sp_id,client_id,indicator)VALUES ($thread_id,'$post',$sp_id,$client_id,'1')";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:user_hired_projects.php?thread_id=$thread_id&sp_id=$sp_id&status=pending");
        }
    mysqli_close($connection);
    }
if(isset($_POST['set_as_solved'])){
     
    $thread_id=$_REQUEST['thread_id'];
    $sp_id=$_REQUEST['sp_id'];
    $client_id=$_SESSION['ID'];
    $post=$_POST['sp_comment'];

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
    $query="UPDATE projects SET jobstatus=0 WHERE thread_id=$thread_id";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:feedback.php?thread_id=$thread_id&sp_id=$sp_id");
        }
    mysqli_close($connection);
}
?>