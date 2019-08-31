<?php
session_start();
if(isset($_POST['submit'])){
    
    $sp_id=$_REQUEST['sp_id'];
    $client_id=$_SESSION['ID'];
    $comment=','.$_POST['user_comment'];
    $rating=$_POST['rate'];

    // echo $comment;

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
    $query="UPDATE service_provider_data SET total_ratings=total_ratings+$rating,review_count=review_count+1,comments=CONCAT(comments,'$comment') WHERE sp_Id=$sp_id";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:../client_dash.php");
        }
    mysqli_close($connection);
}