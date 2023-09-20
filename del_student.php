<?php
include "connect_server.php";
$id_student = $_GET["id_student"];
$sql = "DELETE FROM student_info WHERE student_info.Id_student = '$id_student'  ";
$result = $conn -> query($sql);

if($result){
    print "<script>alert('ลบข้อมูลสำเร็จ')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}else{
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}
?>