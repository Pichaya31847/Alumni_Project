<?php
include "connect_server.php";
$id_post = $_GET["id_post"];
$page=$_GET["page"];
$sql = "SELECT * from picture_job where id_post like '$id_post' ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $pic_name = $row["picture_name"];
    $id_pic = $row["id"];
    if(unlink("upload/$pic_name")){
    $sql_name = "DELETE FROM picture_job WHERE id = '$id_pic'  ";
    $result_name = $conn -> query($sql_name);
    }
}if($result_name){
    $sql_post = "DELETE FROM job_info WHERE id_post = '$id_post'  ";
    $result_post = $conn -> query($sql_post);
    if($result_post){
    print "<script>alert('ลบเรียบร้อย')</script>" ;
    print "<script>window.location='job.php';</script>";
    }
}else{
    $sql_post = "DELETE FROM job_info WHERE id_post = '$id_post'  ";
    $result_post = $conn -> query($sql_post);
    if($result_post){
    print "<script>alert('ลบเรียบร้อย')</script>" ;
    print "<script>window.location='job.php';</script>";
    }
}
?>