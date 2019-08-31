<?php
session_start();
if(isset($_POST['submit'])){
    include './dbConnect.php';
    session_start();
    $clientId=$_SESSION['ID'];
    $clientPassword=$_POST['clientPassword'];
    $query="UPDATE client_data SET clientPassword='$clientPassword' WHERE clientId=$clientId";
    $result=mysqli_query($connection,$query);
    if($result){
        header("location:../client_dash.php");
    }else{
        echo 'Data retrieving failed'.mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>