<?php
date_default_timezone_set('Asia/Bangkok');
include "connect_server.php";

$news_header = $_POST["news_hedder"];
$new_desscri = $_POST["dis_news"];
$mount = date("m");

if ($mount == 1) {
    $mount = "ม.ค.";
} elseif ($mount == 2) {
    $mount = "ก.พ.";
} elseif ($mount == 3) {
    $mount = "มี.ค.";
} elseif ($mount == 4) {
    $mount = "เม.ย.";
} elseif ($mount == 5) {
    $mount = "พ.ค.";
} elseif ($mount == 6) {
    $mount = "มิ.ย.";
} elseif ($mount == 7) {
    $mount = "ก.ค.";
} elseif ($mount == 8) {
    $mount = "ส.ค.";
} elseif ($mount == 9) {
    $mount = "ก.ย.";
} elseif ($mount == 10) {
    $mount = "ต.ค.";
} elseif ($mount == 11) {
    $mount = "พ.ย.";
} elseif ($mount == 12) {
    $mount = "ธ.ค.";
}

$year = date("Y") + 543;

$dath_news = date("d/") . $mount . "/" . $year;

$random_name = rand(0, 100000);
$id_post = date('Ymd') . $random_name;

$sql = "INSERT INTO commu_info (id_post,news_header,new_desscri,date_news) values ('$id_post','$news_header','$new_desscri','$dath_news')";
$result = $conn->query($sql);
// Count total files
if ($result) {
    $countfiles = count($_FILES['file']['name']);
    if (!empty($_FILES['file']['tmp_name'][0])) {
        // Looping all files
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['file']['name'][$i];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $random_num = rand(0, 100000);
            $rename = date('Ymd') . $random_num;

            $filename = $rename . '.' . $extension;
            $filename_tmp = $_FILES['file']['tmp_name'][$i];

            // Upload file
            if (copy($filename_tmp, 'upload/' . $filename)) {
                $sql_img = "INSERT INTO picture_commu (picture_name,id_post) values ('$filename','$id_post')";
                $result_img = $conn->query($sql_img);
            } else {
                print "<script>alert('อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง')</script>";
                print "<script>window.location='folder.php';</script>";
            }
        }
        if ($result_img) {
            print "<script>alert('โพสต์สำเร็จ')</script>";
            print "<script>window.location='folder.php';</script>";
        }
    } else {
        print "<script>alert('โพสต์สำเร็จ')</script>";
        print "<script>window.location='folder.php';</script>";
    }
} else {
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
    print "<script>window.location='folder.php';</script>";
}
