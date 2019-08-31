<?php
session_start();
if(isset($_POST['submit'])){
    $clientUsername=$_POST['clientUsername'];
    $clientPassword=$_POST['clientPassword'];

    $db['db_host']="localhost";
    $db['db_user']="root";
    $db['db_pass']="";
    $db['db_name']="techmanagement";

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(!$connection){
       die('Database connection failed'); 
    }
    $query="SELECT * FROM client_data WHERE clientUsername='$clientUsername' AND clientPassword='$clientPassword'";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    $_SESSION['ID']=$data['clientId'];
    $num=mysqli_num_rows($result);
    if($num==1){
        header("location:../client_dash.php");
    }else{
        echo 'Data retrieving failed'.mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>