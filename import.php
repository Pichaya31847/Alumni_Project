<?php
include "connect_server.php";
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
    $id_student = $filesop[2];
    $name_prefix = $filesop[3];
    $name_student = $filesop[4];
    $name_nickname = $filesop[5];
    $date_birth = $filesop[7]; 
    $location_home = $filesop[8];
    $tel_student = $filesop[9];
    $email_student = $filesop[10];
    $facebook_student = $filesop[11];
    $line_student = $filesop[12];
    $dath_end = $filesop[13];
    $grade_student = $filesop[14];
    $like_student = $filesop[15];
    $majoy_end = $filesop[16];
    $work_typt = $filesop[18];
    $work_name = $filesop[19];
    $position_typt = $filesop[20];
    $salary_work = $filesop[21];
    $sql_email = "SELECT * from student_info where Id_student like '$id_student'";
    $result_email = $conn -> query($sql_email);
    if (($result_email->num_rows > 0)){
        print "<script>alert('รหัสนักศึกษา：$id_student มีข้อมูลอยู่แล้ว')</script>" ;
        print "<script>window.location='index_admin.php';</script>";
        exit();
    }elseif($c > 1){   
        $sql = "INSERT INTO student_info (Id_student,prefix,name_surename,nicename,birthday,location_home,tel_stu,email_stu,facebook_stu,line_stu,end_learn,grade_stu,like_typt,major_end,work_typt,name_work,position_work,salary) values ('$id_student','$name_prefix','$name_student','$name_nickname','$date_birth','$location_home','$tel_student','$email_student','$facebook_student','$line_student','$dath_end','$grade_student','$like_student','$majoy_end','$work_typt','$work_name','$position_typt','$salary_work')";
        $result = $conn -> query($sql);
        print $sql."<br>";
        $c = $c + 1;}
    else{ $c = $c + 1;}}
 
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