<?php 
date_default_timezone_set('Asia/Bangkok');
include "connect_server.php";
if(!empty($_POST["submit"])){
$name_sur = $_POST["name_sur"];
$learn_end = $_POST["learn_end"];
$year_end = $_POST["year_end"];
$work_now = $_POST["work_now"];
$serti = $_POST["serti"];
$filename = $_FILES['file']['name'];
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$random_num = rand(0, 100000);
$rename = date('Ymd') . $random_num;
$filename = $rename . '.' . $extension;
$filename_tmp = $_FILES['file']['tmp_name'];
$sql = "INSERT INTO education_show (name_stu,learn_end,year_end,work_now,certi_stu,picture_stu) values ('$name_sur','$learn_end','$year_end','$work_now','$serti','$filename')";
$result = $conn->query($sql);

// Upload file
if ($result){
    if(copy($filename_tmp, 'img/' . $filename)){
    print "<script>alert('อัพโหลดสำเร็จ')</script>";
    print "<script>window.location='educate.php';</script>";
}else{
print "<script>alert('อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง')</script>";
print "<script>window.location='educate.php';</script>";
}} else {
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
    print "<script>window.location='educate.php';</script>";
}}else{
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
    print "<script>window.location='educate.php';</script>";
}
?>