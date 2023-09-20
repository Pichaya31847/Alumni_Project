<?php
include "connect_server.php";
$id_student = $_POST["id_student"];
$name_prefix = $_POST["name_prefix"];
$name_student = $_POST["name_student"];
$name_nickname = $_POST["name_nickname"];
$date_birth = $_POST["date_birth"]; 
$location_home = $_POST["location_home"];
$tel_student = $_POST["tel_student"];
$email_student = $_POST["email_student"];
$facebook_student = $_POST["facebook_student"];
$line_student = $_POST["line_student"];
$dath_end = $_POST["dath_end"];
$grade_student = $_POST["grade_student"];
$like_student = $_POST["like_student"];
$majoy_end = $_POST["majoy_end"];
$work_typt = $_POST["work_typt"];
$work_name = $_POST["work_name"];
$position_typt = $_POST["position_typt"];
$salary_work = $_POST["salary_work"];
$sql_email = "SELECT * from student_info where Id_student like '$id_student'";
$result_email = $conn -> query($sql_email);
if ($result_email->num_rows > 0){
    print "<script>alert('รหัสนักศึกษา：$id_student มีข้อมูลอยู่แล้ว')</script>" ;
    print "<script>window.location='index_admin.php';</script>";
}else{   
    $sql = "INSERT INTO student_info (Id_student,prefix,name_surename,nicename,birthday,location_home,tel_stu,email_stu,facebook_stu,line_stu,end_learn,grade_stu,like_typt,major_end,work_typt,name_work,position_work,salary) values ('$id_student','$name_prefix','$name_student','$name_nickname','$date_birth','$location_home','$tel_student','$email_student','$facebook_student','$line_student','$dath_end','$grade_student','$like_student','$majoy_end','$work_typt','$work_name','$position_typt','$salary_work')";
    $result = $conn -> query($sql);}
 
if($result){
    print "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}else{
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}
?>