<?php
session_start();
session_destroy();
print "<script>alert('Logout สำเร็จ')</script>" ;
    //เปลี่ยนlocations ด้านล่างไปหน้าหลักก่อนเพิ่มไฟล์
print "<script>window.location='index.php';</script>";
?>