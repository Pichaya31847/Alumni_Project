<?php
include 'connect_server.php';
$id_pic = $_GET["id"];
$id_post = $_GET["id_post"];
$pages = $_GET["page"];
$sql = "SELECT * from picture_job where id like '$id_pic' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;
$pic_name = $row["picture_name"];
if(unlink("upload/$pic_name")){
    $sql_name = "DELETE FROM picture_job WHERE id = '$id_pic'  ";
    $result_name = $conn -> query($sql_name);
    if($result_name){
        print "<script>window.location='job.php?id_post=$id_post&page=$pages';</script>";
    }else{
        print "<script>window.location='job.php?id_post=$id_post&page=$pages';</script>";
    }
}else{
    print "<script>window.location='job.php?id_post=$id_post&page=$pages';</script>";
}
?>