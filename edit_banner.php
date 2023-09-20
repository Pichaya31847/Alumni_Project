<!DOCTYPE html>
<html lang="en">
<?php session_start();
$username = $_SESSION["user"];
$status_id = $_SESSION["status"];
if (!empty($username)) {
    if ($status_id == '2') {
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/edit_pic.css" />
    <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/edit_pic.css" />
    <link rel="stylesheet" href="css/style.css">


    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2ac91e9da1.js" crossorigin="anonymous"></script>


    <title>ADMIN SUAN DUSIT UNIVERSITY</title>
</head>

<body>

    <!-- popup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="shadow_block" data-dismiss="modal"></div>
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 140px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h3>เพิ่มรายชื่อนักศึกษา</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" action="import.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">
                                <font color="red">กรุณาเพิ่มด้วยไฟล์ CSV เท่านั้น</font>
                            </label>
                            <input type="file" name="file" class="form-control" id="recipient-name" accept=".CSV" require>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-graduation'></i>
                <div class="logo_name">SUAN DUSIT UNIVERSITY</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">

            <li>
                <a href="edit_banner.php">
                    <i class='fas fa-image'></i>
                    <span class="links_name">แก้ไขภาพหน้าหลัก</span>
                </a>
                <span class="tooltip">แก้ไขภาพหน้าหลัก</span>
            </li>
            <li>
                <a href="index_admin.php">
                    <i class='fa fa-user-o'></i>
                    <span class="links_name">ข้อมูลนักศึกษา</span>
                </a>
                <span class="tooltip">ข้อมูลนักศึกษา</span>
            </li>
            <li>
                <a href="admin_user.php">
                    <i class="fa fa-address-book"></i>
                    <span class="links_name">ข้อมูลแอดมิน</span>
                </a>
                <span class="tooltip">ข้อมูลแอดมิน</span>
            </li>
            <li>
                <a href="news-input.php">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="links_name">ข่าวประชาสัมพันธ์</span>
                </a>
                <span class="tooltip">ข่าวประชาสัมพันธ์</span>
            </li>
            <li>
                <a href="folder.php">
                    <i class="fa-solid fa-file-lines"></i>
                    <span class="links_name">ข้อมูลข่าวอบรม</span>
                </a>
                <span class="tooltip">ข้อมูลข่าวอบรม</span>
            </li>
            <li>
                <a href="educate.php">
                    <i class="fa fa-address-card"></i>
                    <span class="links_name">ทำเนียบนักศึกษา</span>
                </a>
                <span class="tooltip">ทำเนียบนักศึกษา</span>
            </li>
            <li>
                <a href="job.php">
                    <i class="fa fa-archive"></i>
                    <span class="links_name">ข้อมูลรับสมัครงาน</span>
                </a>
                <span class="tooltip">ข้อมูลรับสมัครงาน</span>
            </li>
            <li>
                <a href="export_ex.php">
                    <i class="fa fa-upload"></i>
                    <span class="links_name">ออกรายงานนักศึกษา</span>
                </a>
                <span class="tooltip">ออกรายงานนักศึกษา</span>
            </li>
            <li>
                <a href="icon/User_Manual.pdf">
                    <i class="fa fa-question-circle"></i>
                    <span class="links_name">คู่มือการใช้งาน</span>
                </a>
                <span class="tooltip">คู่มือการใช้งาน</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="./icon/admin.png">
                    <div class="name_job">
                        <div class="name"><?php print $username; ?></div>
                        <div class="job">ผู้ดูแลระบบ</div>
                    </div>
                </div>
                <a href="logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR -->

    <?php if (!empty($_GET["id_post"])) {
        include 'connect_server.php';
        $id_post = $_GET["id_post"];
    ?>
        <div class="container_edit_popup">
            <div class="shadow_block"></div>
            <div class="container_edit">
                <div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <h3>แก้ไขรูปภาพหน้าหลัก</h3>
                            </h5>
                            <button type="button" class="close">
                                <a href="edit_banner.php"><span aria-hidden="true">&times;</span></a>
                            </button>
                        </div>
                        <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" action="banner_edit_up.php">
                        <input type="hidden" name="id_post" value="<?php print $id_post; ?>">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">
                                <font color="red">เมื่ออัพโหลดไปแล้วรูปภาพจะทำการเปลี่ยนเป็นรูปปัจจุบันทันที</font>
                            </label>
                            <input type="file" name="file" class="form-control" id="recipient-name" accept="image/*" require>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="edit_banner.php" style="color: white;">Close</a></button>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>
                    </form>
                </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end edit -->

    <!-- ข้อมูลข่าวประชาสัมพันธ์ -->
    <div class="container">
        <div class="header_contain">
            <div class="content_left">
                <div class="content_left_up">
                    <add style="font-size: 30px;font-weight:600">รูปภาพหน้าหลัก</add>
                </div>
                <div class="content_left_down">
                    <span style="font-size: 18px;font-weight:400" class="title"></span>
                </div>
            </div>
        </div>
        <hr>
        <?php
        include 'connect_server.php';
        date_default_timezone_set('Asia/Bangkok');
        $sql = "SELECT * from banner";
        $result = $conn->query($sql);
        $i = 1;
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="table_detail">

                <table class="table_new">

                    <tbody>

                        <tr>
                            <td class="header_new">
                                <a href="#" class="header_table">รูปที่<?php print $i; ?></a>
                            </td>

                        </tr>
                        <tr>

                            <td class="picture" colspan="2"><img src="banner/<?php print $row['name_banner']; ?>" style="position: relative;width: calc(1vw + 80%);"></td>
                            <td class="header_new" width="25">
                                <p class="post-meta">
                                    <time datetime="2022-05-26" pubdate=""><a href="edit_banner.php?id_post=<?php print $row['id_banner']; ?>">แก้ไข</a></time>
                                </p>
                            </td>

                        </tr>


                    </tbody>
                </table>
                <hr>

            <?php $i = $i + 1;
        } ?>
            </div>
    </div>
    </section>
    <!-- ข้อมูลนักศึกษา -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        $(document).ready(function() {
            $(document).on('click', '.deletebtn', function() {
                var stu_id = $(this).val();
                // alert(stu_id);
                $('#DeleteModal').model('show');
            });
        });
    </script>
</body>

<?php } else {
        print "<script>alert('ไอดีนี้ไม่มีสิทธ์การเข้าถึงหน้านี้กรุณาติดต่อผู้ดูแลระบบ')</script>";
        print "<script>window.location='index.php';</script>";
    }
} else {
    print "<script>alert('กรุณาล็อคอินก่อน')</script>";
    print "<script>window.location='index.php';</script>";
} ?>
</html>