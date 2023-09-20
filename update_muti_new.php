<?php
date_default_timezone_set('Asia/Bangkok');
include "connect_server.php";
    $id_post= $_POST["id_post"];
    $news_header = $_POST["news_hedder"];
    $new_desscri = $_POST["dis_news"];
    if (!empty($_FILES['file']['tmp_name'][0])){
        $countfiles = count($_FILES['file']['name']);
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['file']['name'][$i];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $random_num = rand(0, 100000);
            $rename = date('Ymd') . $random_num;

            $filename = $rename . '.' . $extension;
            $filename_tmp = $_FILES['file']['tmp_name'][$i];

            // Upload file
            if (copy($filename_tmp, 'upload/' . $filename)) {
                $sql_img = "INSERT INTO picture_news (picture_name,id_post) values ('$filename','$id_post')";
                $result_img = $conn->query($sql_img);
            } else {
                print "<script>alert('อัพโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง')</script>";
                print "<script>window.location='news-input.php';</script>";
            }
        }
    }else{
        $sql = "UPDATE news_info SET news_header = '$news_header', new_desscri = '$new_desscri' WHERE id_post = '$id_post'";
        $result = $conn->query($sql);
        if($result){
            print "<script>alert('บันทึกเรียบร้อย')</script>";
            print "<script>window.location='news-input.php';</script>";
        }else{
            print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่ในภายหลัง')</script>";
            print "<script>window.location='news-input.php';</script>";
        }
    }
    if($result_img){
        $sql_img_up = "UPDATE news_info SET news_header = '$news_header', new_desscri = '$new_desscri' WHERE id_post = '$id_post'";
        $result_img_up = $conn->query($sql_img_up);
        if($result_img_up){
            print "<script>alert('บันทึกเรียบร้อย')</script>";
            print "<script>window.location='news-input.php';</script>";
        }else{
            print "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่ในภายหลัง')</script>";
            print "<script>window.location='news-input.php';</script>";
        }
    }
?>