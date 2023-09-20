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
$sql = "UPDATE student_info SET prefix = '$name_prefix', name_surename = '$name_student', nicename = '$name_nickname', birthday = '$date_birth', location_home = '$location_home', tel_stu = '$tel_student', email_stu = '$email_student', facebook_stu = '$facebook_student', line_stu = '$line_student', end_learn = '$dath_end', grade_stu = '$grade_student', like_typt = '$like_student', major_end = '$majoy_end', work_typt = '$work_typt', name_work = '$work_name', position_work = '$position_typt', salary = '$salary_work' WHERE student_info.Id_student = '$id_student'  ";
$result = $conn -> query($sql);

if($result){
    print "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}else{
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
    print "<script>window.location='index_admin.php';</script>";
}
?>