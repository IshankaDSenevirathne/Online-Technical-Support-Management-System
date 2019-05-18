<?php
if(isset($_POST['post_thread'])){
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
    $thread=mysqli_real_escape_string($connection,$_POST['thread']);
    $threadTitle=mysqli_real_escape_string($connection,$_POST['threadTitle']);
    $category=$_POST['category'];
    $clientId=$_REQUEST['id'];
    $query="SELECT * FROM client_data WHERE clientId=$clientId";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $clientUsername=$data['clientUsername'];
    $present_Date=date("Y-m-d");

    $query="INSERT INTO thread_data(username,thread,thread_status,thread_category,thread_date,thread_title,userId)VALUES ('$clientUsername','$thread','Active','$category','$present_Date','$threadTitle','$clientId')";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:../querywall_client.php?id=$clientId");
    }else{
        echo "Could not add thread!".mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>