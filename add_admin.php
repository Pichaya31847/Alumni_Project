<?php
include "connect_server.php";
$username = $_POST["news_hedder"];
$password_ad = $_POST["password_ad"];
$sql_email = "SELECT * from admin_user where username_admin like '$username'";
$result_email = $conn -> query($sql_email);
if ($result_email->num_rows > 0){
    print "<script>alert('รหัสนักศึกษา：$username มีข้อมูลอยู่แล้ว')</script>" ;
    print "<script>window.location='admin_user.php';</script>";
}else{   
    $sql = "INSERT INTO admin_user (username_admin,pass_admin,status_ad) values ('$username','$password_ad','2')";
    $result = $conn -> query($sql);}
 
if($result){
    print "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='admin_user.php';</script>";
}else{
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='admin_user.php';</script>";
}
?>