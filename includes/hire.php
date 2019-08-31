<?php
    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    session_start();
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die('database connection failed').mysqli_error($connection);
    }
    $user_Id=$_SESSION['ID'];
    $sp_Id=$_REQUEST['sp_id'];
    $thread_Id=$_REQUEST['thread_id'];

    $query="SELECT clientFirstname,clientLastname FROM client_data WHERE clientId=$user_Id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $client_name=$data['clientFirstname'].' '.$data['clientLastname'];

    $query="SELECT * FROM thread_data WHERE id=$thread_Id";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $thread_title=$data['thread_title'];
    $acc_date=date('y/m/d');
    $query="INSERT INTO active_hire(sp_id,client_id,discription,acc_date,client_name,thread_id)VALUES ($sp_Id,$user_Id,'$thread_title','$acc_date','$client_name',$thread_Id)"; 
    $result=mysqli_query($connection,$query);
    if($result){
        $id=mysqli_insert_id($connection);
        header("location:../client_dash.php");
    }else{
        echo "Error: " . $query . "" . mysqli_error($connection);
    }
    mysqli_close($connection);
    
?>