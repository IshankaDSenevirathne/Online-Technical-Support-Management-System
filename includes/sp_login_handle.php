<?php
//LOGIN SERVICE PROVIDER
if(isset($_POST['submit'])){
 $db['db_host']='localhost';
 $db['db_user']='root';
 $db['db_pass']='';
 $db['db_name']='techmanagement';
 
 foreach($db as $key=>$value){
     define(strtoupper($key),$value);
 }
 $sp_name=$_POST['sp_name'];
 $sp_password=$_POST['sp_password'];

 //CREATING A BUS TO DATABASE
 $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 if(!$connection){
    die('Database connection failed');
 }else{
 $query="SELECT * FROM service_provider_data WHERE sp_name='$sp_name' AND sp_password='$sp_password'";
 $result=mysqli_query($connection,$query);
 if($result){ 
    $data=mysqli_fetch_assoc($result);
    $sp_Id=$data['sp_Id'];
    if($sp_Id){
        header("location:../sp_dash.php?id=$sp_Id");
    }else{
        echo 'Connection Failed'.mysqli_error($connection);
    }
 }
 mysqli_close($connection);
 }
}
?>