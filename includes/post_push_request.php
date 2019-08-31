<?php
session_start();
if(isset($_POST['submit_post'])){
    
    $thread_id=$_REQUEST['thread_id'];
    $sp_id=$_SESSION['ID'];
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
    $query="INSERT INTO answer_data(thread_id,post,sp_id)VALUES ($thread_id,'$post',$sp_id)";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:../com_page_sp.php?thread_id=$thread_id");
        }
    mysqli_close($connection);
    }
?>