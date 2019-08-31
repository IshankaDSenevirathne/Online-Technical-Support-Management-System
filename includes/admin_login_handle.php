<?php
//LOGIN SERVICE PROVIDER
session_start();
if(isset($_POST['submit'])){
 $db['db_host']='localhost';
 $db['db_user']='root';
 $db['db_pass']='';
 $db['db_name']='techmanagement';
 
 foreach($db as $key=>$value){
     define(strtoupper($key),$value);
 }
 $admin_name=$_POST['admin_Username'];
 $admin_password=$_POST['admin_Password'];

 //CREATING A BUS TO DATABASE
 $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 if(!$connection){
    die('Database connection failed');
 }else{
 $query="SELECT * FROM admin_data WHERE admin_Username='$admin_name' AND admin_Password='$admin_password'";
 $result=mysqli_query($connection,$query);
 if($result){ 
    $data=mysqli_fetch_assoc($result);
    $_SESSION['ID']=$data['admin_Id'];
    if($_SESSION['ID']){
        header("location:../admin_dash.php");
    }else{
        echo 'Connection Failed'.mysqli_error($connection);
    }
 }
 mysqli_close($connection);
 }
}
?>