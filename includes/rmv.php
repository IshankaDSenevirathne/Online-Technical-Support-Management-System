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
    $client_Id=$_REQUEST['client_id'];
    $sp_Id=$_REQUEST['sp_id'];
    $thread_Id=$_REQUEST['thread_id'];
    $admin_Id=$_SESSION['ID'];

    if($client_Id!='default'){
        $query="DELETE FROM client_data WHERE clientId=$client_Id";
        $result=mysqli_query($connection,$query);
        if($result){
            header("location:../admin_dash.php?id=$admin_Id");
        }else{
            echo "Error: " . $query . "" . mysqli_error($connection);
        }
    }
    else if($sp_Id!='default'){
        $query="DELETE FROM service_provider_data WHERE sp_Id=$sp_Id";
        $result=mysqli_query($connection,$query);
        if($result){
            header("location:../admin_dash.php?id=$admin_Id");
        }else{
            echo "Error: " . $query . "" . mysqli_error($connection);
        }
    }
    else if($thread_Id!='default'){
        $query="DELETE FROM thread_data WHERE id=$thread_Id";
        $result=mysqli_query($connection,$query);
        if($result){
            header("location:../admin_dash.php?id=$admin_Id");
        }else{
            echo "Error: " . $query . "" . mysqli_error($connection);
        }
    }
    mysqli_close($connection);
?>