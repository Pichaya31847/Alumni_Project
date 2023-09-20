<?php
date_default_timezone_set('Asia/Bangkok');
include "connect_server.php";
if (!empty($_POST["submit"])) {
    $id_stu = $_POST["id_stu"];
    $name_sur = $_POST["name_sur"];
    $learn_end = $_POST["learn_end"];
    $year_end = $_POST["year_end"];
    $work_now = $_POST["work_now"];
    $serti = $_POST["serti"];
    // Upload file
    if (!empty($_FILES['file']['tmp_name'])) {
        $sql_pic = "SELECT * from education_show where no_stu like '$id_stu' ";
        $result_pic = $conn->query($sql_pic);
        $row_pic = $result_pic->fetch_assoc();
        $pic_name = $row_pic["picture_stu"];
        if (unlink("img/$pic_name")) {
            $filename = $_FILES['file']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $random_num = rand(0, 100000);
            $rename = date('Ymd') . $random_num;
            $filename = $rename . '.' . $extension;
            $filename_tmp = $_FILES['file']['tmp_name'];
            if (copy($filename_tmp, 'img/' . $filename)) {
                $sql_img_up = "UPDATE education_show SET name_stu = '$name_sur', learn_end = '$learn_end', year_end = '$year_end', work_now = '$work_now', certi_stu = '$serti', picture_stu = '$filename' WHERE no_stu = '$id_stu'";
                $result_img_up = $conn->query($sql_img_up);
                if ($result_img_up) {
                    print "<script>alert('แก้ไขสำเร็จ')</script>";
                    print "<script>window.location='educate.php';</script>";
                } else {
                    print "<script>alert('อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง')</script>";
                    print "<script>window.location='educate.php';</script>";
                }
            } else {
                print "<script>alert('อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง')</script>";
                print "<script>window.location='educate.php';</script>";
            }
        } else {
            print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
            print "<script>window.location='educate.php';</script>";
        }
    } else {
        $sql = "UPDATE education_show SET name_stu = '$name_sur', learn_end = '$learn_end', year_end = '$year_end', work_now = '$work_now', certi_stu = '$serti' WHERE no_stu = '$id_stu'";
        $result = $conn->query($sql);
        if ($result) {
            print "<script>alert('แก้ไขสำเร็จ')</script>";
            print "<script>window.location='educate.php';</script>";
        } else {
            print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
            print "<script>window.location='educate.php';</script>";
        }
    }
} else {
    print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
    print "<script>window.location='educate.php';</script>";
}
