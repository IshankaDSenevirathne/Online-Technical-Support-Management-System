<?php
if(isset($_POST['submit'])){
    $admin_Firstname=$_POST['admin_Firstname'];
    $admin_Lastname=$_POST['admin_Lastname'];
    $admin_Username=$_POST['admin_Username'];
    $admin_Password=$_POST['admin_Password'];
    $admin_Email=$_POST['admin_Email'];
    $admin_Country=$_POST['admin_Country'];
    $admin_Contact=$_POST['admin_Contact'];
    $admin_Address=$_POST['admin_Address'];
    $admin_Birthdate=$_POST['admin_Birthdate'];
    $admin_Age=$_POST['admin_Age'];
    $admin_Gender=$_POST['admin_Gender'];
    $admin_Role=$_POST['admin_Role'];

    $db['db_host']='localhost';
    $db['db_user']='root';
    $db['db_pass']='';
    $db['db_name']='techmanagement';

    foreach($db as $key=>$value){
        define(strtoupper($key),$value);
    }
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);  
    if($connection){
        echo 'database connection succsessfull<br>';
    }else{
        die('database connection failed');
    }
    $query="INSERT INTO admin_data(admin_Firstname,admin_Lastname,admin_Username,admin_Password,admin_Email,admin_Country,admin_Contact,admin_Address,admin_Birthdate,admin_Age,admin_Gender,admin_Role,admin_state)
    VALUES ('$admin_Firstname',' $admin_Lastname','$admin_Username','$admin_Password','$admin_Email','$admin_Country','$admin_Contact','$admin_Address','$admin_Birthdate',$admin_Age,'$admin_Gender','$admin_Role','active')";
    $result=mysqli_query($connection,$query);
    if($result){
        echo 'admin registration successfull';
        header("location:../admin_dash.php");
    }else{
        echo 'Error: '.$query.'<br>'.mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>