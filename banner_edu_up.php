<?php
date_default_timezone_set('Asia/Bangkok');
include "connect_server.php";
$id_post = $_POST["id_post"];
$filename = $_FILES['file']['name'];
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$random_num = rand(0, 100000);
$rename = date('Ymd') . $random_num;
$filename = $rename . '.' . $extension;
$filename_tmp = $_FILES['file']['tmp_name'];

// Upload file
$sql = "SELECT * from banner_educate where id_banner like '$id_post' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;
$pic_name = $row["name_banner"];
if(unlink("banner/$pic_name")){
    if (copy($filename_tmp, 'banner/' . $filename)) {
        $sql_img_up = "UPDATE banner_educate SET name_banner = '$filename' where id_banner like '$id_post'";
        $result_img_up = $conn->query($sql_img_up);
    if ($result_img_up) {
        print "<script>alert('บันทึกเรียบร้อย')</script>";
        print "<script>window.location='educate.php';</script>";
    } else {
        print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่ในภายหลัง')</script>";
        print "<script>window.location='educate.php';</script>";
    }
}}else {
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่ในภายหลัง')</script>";
    print "<script>window.location='educate.php';</script>";
}
 