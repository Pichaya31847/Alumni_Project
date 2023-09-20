<?php session_start();
include "connect_server.php";
$user=$_POST["user"];
$pass=$_POST["pass"];
/* print $pass . $user; */
/* print "serverconnect"; */
$sql = "SELECT * from admin_user where username_admin like '$user' and pass_admin like '$pass'";
$result = $conn->query($sql);
if($result-> num_rows >0){
    $row = $result->fetch_assoc();
    $_SESSION["user"] = $user;
    $_SESSION["status"] = $row["status_ad"];
        print "<script>alert('login Complete')</script>" ;
        print "<script>window.location='index_admin.php';</script>";
        
    }else{
        print "<script>alert('username or password incorrect')</script>" ;
        print "<script>window.location='index.php';</script>";
    }
?>