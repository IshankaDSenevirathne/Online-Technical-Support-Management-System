<?php
//SERVICE PROVIDER SIGN UP
session_start();
if(isset($_POST['submit'])){
    $sp_name=$_POST['sp_name'];
    $sp_password=$_POST['sp_password'];
    $sp_country=$_POST['sp_country'];
    $sp_tags=$_POST['sp_tags'];
    $sp_email=$_POST['sp_email'];
    $sp_contact=$_POST['sp_contact'];
    $sp_intro=$_POST['sp_intro'];
    $sp_motto=$_POST['sp_motto'];

    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if($connection){
        echo 'We are connected';
    }else{
        die('Error:connection failed '.mysqli_error($connection));
    }
    $query="INSERT INTO service_provider_data(sp_name,sp_password,sp_country,sp_tags,sp_email,sp_contact,sp_state,sp_intro,sp_motto)VALUES ('$sp_name','$sp_password','$sp_country','$sp_tags','$sp_email',$sp_contact,'Active','$sp_intro','$sp_motto')";
    $result=mysqli_query($connection,$query);
    if($result){
        $_SESSION['ID']=mysqli_insert_id($connection);
        header("location:../sp_dash.php");
    }
    else{
        echo 'Error: '.$query.'<br>'.mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>