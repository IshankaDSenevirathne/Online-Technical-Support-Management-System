<?php

// CLIENT TABLE SIGN UP
if(isset($_POST['submit'])){
    $clientFirstname=$_POST['clientFirstname'];
    $clientLastname=$_POST['clientLastname'];
    $clientUsername=$_POST['clientUsername'];
    $clientPassword=$_POST['clientPassword'];
    $clientEmail=$_POST['clientEmail'];
    $clientCountry=$_POST['clientCountry'];
    $clientContact=$_POST['clientContact'];
    $clientAddress=$_POST['clientAddress'];
    $clientBirthdate=$_POST['clientBirthdate'];
    $clientAge=$_POST['clientAge'];
    $clientOccupation=$_POST['clientOccupation'];
    $clientInterests=$_POST['clientInterests'];
    $clientGender=$_POST['clientGender'];
    
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
    $query="INSERT INTO client_data(clientFirstname,clientLastname,clientUsername,clientPassword,clientEmail,clientCountry,clientContact,clientAddress,clientBirthdate,clientAge,clientOccupation,clientInterests,clientGender)VALUES ('$clientFirstname','$clientLastname','$clientUsername','$clientPassword','$clientEmail','$clientCountry',$clientContact,'$clientAddress','$clientBirthdate',$clientAge,'$clientOccupation','$clientInterests','$clientGender')";
    $result=mysqli_query($connection,$query);
    if($result){
        $id=mysqli_insert_id($connection);
        header("location:../client_dash.php?id=$id");
    }else{
        echo "Error: " . $query . "" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>