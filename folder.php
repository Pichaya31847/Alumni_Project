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
            <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/news_input1.css" />
            <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/news_input1.css" />
            <link rel="stylesheet" href="css/style.css">


            <!-- Boxicons CSS -->
            <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://kit.fontawesome.com/2ac91e9da1.js" crossorigin="anonymous"></script>


            <title>ADMIN SUAN DUSIT UNIVERSITY</title>
        </head>

        <body>
            <?php
            date_default_timezone_set('Asia/Bangkok');
            if (empty($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            } ?>
            <!-- popup -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="shadow_block" data-dismiss="modal"></div>
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="margin-top: calc(2vh + 50%);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <h3>เพิ่มข่าวอบรม</h3>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" method="POST" action="upload_muti_commu.php">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        หัวข้อข่าว
                                    </label>
                                    <input type="text" name="news_hedder" class="form-control" id="recipient-name" placeholder="หัวข้อข่าว" require>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        คำอธิบาย
                                    </label>
                                    <textarea class="form-control" id="message-text" style="height: 208px;resize: none;" name="dis_news" placeholder="คำอธิบาย..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        รูปภาพ
                                    </label>
                                    <input type="file" name="file[]" class="form-control" id="recipient-name" accept="image/*" multiple>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="submit" value="post">
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

            <!-- edit -->
            <?php if (!empty($_GET["id_post"])) {
                include 'connect_server.php';
                $id_post = $_GET["id_post"];
                $sql_edit = "SELECT * from commu_info where id_post like '$id_post' ";
                $result_edit = $conn->query($sql_edit);
                $row_edit = $result_edit->fetch_assoc();
            ?>
                <div class="container_edit_popup">
                    <div class="shadow_block"></div>
                    <div class="container_edit">
                        <div>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <h3>แก้ไขข่าวอบรม</h3>
                                    </h5>
                                    <button type="button" class="close">
                                        <a href="folder.php?page=<?php print $page ?>"><span aria-hidden="true">&times;</span></a>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" method="POST" action="update_muti_commu.php">
                                        <input type="hidden" name="id_post" value="<?php print $id_post; ?>">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                หัวข้อข่าว
                                            </label>
                                            <input type="text" name="news_hedder" class="form-control" id="recipient-name" value="<?php print $row_edit["news_header"]; ?>" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                คำอธิบาย
                                            </label>
                                            <textarea class="form-control" id="message-text" name="dis_news" style="height: 208px;resize: none;"><?php print $row_edit["new_desscri"]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                เพิ่มรูปภาพ
                                            </label>
                                            <input type="file" name="file[]" class="form-control" id="recipient-name" accept="image/*" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                รูปภาพ
                                            </label>
                                            <!-- image -->
                                            <div class="flex-container wrap">
                                                <?php
                                                $id_pic_post = $row_edit["id_post"];
                                                $sql_pic_post = "SELECT * from picture_commu where id_post like '$id_pic_post' ";
                                                $result_pic_post = $conn->query($sql_pic_post);
                                                while ($row_pic_post = $result_pic_post->fetch_assoc()) {
                                                ?>
                                                    <li class="flex-item">
                                                        <div class="delete_text"><a href="delpicture_commu.php?id=<?php print $row_pic_post['id']; ?>&id_post=<?php print $row_edit['id_post']; ?>&page=<?php print $page ?>" onclick="return confirm('ยืนยันที่จะลบรูปภาพนี้ไหม');">ลบ</a></div><img src="upload/<?php print $row_pic_post['picture_name']; ?>" height="80">
                                                    </li>
                                                <?php } ?>
                                            </div>
                                            <!-- end image -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="folder.php?page=<?php print $page ?>" style="color: white;">Close</a></button>
                                            <input type="submit" class="btn btn-primary" name="submit" value="บันทึก">
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
                            <add style="font-size: 30px;font-weight:600">ข้อมูลข่าวอบรม</add>
                        </div>
                        <div class="content_left_down">
                            <span style="font-size: 18px;font-weight:400" class="title">รายละเอียดของข่าว</span>
                        </div>
                    </div>
                    <div class="content_right">
                        <div class="content_right_up">
                            <label data-toggle="modal" data-target="#exampleModal"><a href="#">+ เพิ่มข่าวอบรม</a></label>
                        </div>
                        <div class="content_right_down">
                            <form action="#">
                                <!-- Search form -->
                                <?php if (empty($_GET["search"])) { ?>
                                    <div class="search">
                                        <input type="text" name="search" class="searchTerm" placeholder="ค้นหาทำเนียบนักศึกษา">
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <div class="search">
                                        <input type="text" name="search" class="searchTerm" placeholder="<?php print $_GET["search"]; ?>">
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div> <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>

                <hr>
                <?php
                include 'connect_server.php';
                $search = $_GET["search"];
                $num_per_page = 10;
                $start_from = ($page - 1) * 10;
                $sql = "SELECT * from commu_info where news_header like '%$search%' ORDER BY date_news DESC limit $start_from,$num_per_page ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="table_detail">

                        <table class="table_new">

                            <tbody>

                                <tr>
                                    <td class="header_new">
                                        <a href="#" class="header_table"><?php print $row["news_header"]; ?></a>
                                    </td>
                                    <td class="header_new" width="25">
                                        <p class="post-meta">
                                            <time datetime="2022-05-26" pubdate=""><a href="folder.php?id_post=<?php print $row['id_post']; ?>&page=<?php print $page ?>">แก้ไข</a></time>
                                        </p>
                                    </td>
                                    <td class="header_new" width="25" align="right">
                                        <p class="post-meta">
                                            <time datetime="2022-05-26" pubdate=""><a href="del_commu.php?id_post=<?php print $row['id_post']; ?>&page=<?php print $page ?>" onclick="return confirm('ยืนยันที่จะลบโพสต์นี้ไหม');">
                                                    <font color="red">ลบ</font>
                                                </a></time>
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="post-meta" colspan="3">
                                        <p class="post-meta">
                                            <time datetime="2022-05-26" pubdate=""><?php print $row["date_news"]; ?></time>
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <?php
                                    $id_post = $row["id_post"];
                                    $sql_pic = "SELECT * from picture_commu where id_post like '$id_post' ";
                                    $result_pic = $conn->query($sql_pic);
                                    $row_pic = $result_pic->fetch_assoc();
                                    if ($row_pic['picture_name'] != null) {

                                    ?>
                                        <td class="picture" colspan="3"><img src="upload/<?php print $row_pic['picture_name']; ?>" height="200"></td>
                                    <?php } else { ?>
                                        <td class="picture" colspan="3">โพสต์นี้ไม่มีรูปภาพ</td>
                                    <?php } ?>
                                </tr>


                            </tbody>
                        </table>
                        <hr>

                    <?php } ?>
                    </div>



                    <?php
                    $getid_query = "SELECT  *  FROM  commu_info where news_header like '%$search%'  ";
                    $result = mysqli_query($conn, $getid_query);
                    $total_row = mysqli_num_rows($result);
                    $total_pages = ceil($total_row / $num_per_page); ?>
                    <div class="d-flex m-4 justify-content-center ">
                        <div class="navigation">
                            <!--  ปุ่มกดไปหน้าแรกสุด  -->
                            <?php if ($page > 2) { ?>
                                <a class="next page-numbers" href="folder.php?page=1&search=<?php print $search; ?>">&laquo;</a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าก่อน  -->
                            <?php if ($page > 1) { ?>
                                <a class="next page-numbers" href="folder.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>">&lt;</a>
                            <?php } ?>


                            <!--  ปุ่มกดไปหน้าตามที่กด  -->
                            <?php if ($page > 2) {
                                $pree_page = $page - 2; ?>
                                <a class="page-numbers" href="folder.php?page=<?php print($page - 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <?php if ($page > 1) {
                                $pree_page = $page - 1; ?>
                                <a class="page-numbers" href="folder.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <!--  หน้า ณ ตอนนั้น  -->
                            <span aria-current="page" class="page-numbers current"><?php print $page ?></span>

                            <!--  ปุ่มกดไปหน้าตามที่กด  -->
                            <?php if ($page < $total_pages) {
                                $pree_page = $page + 1; ?>
                                <a class="page-numbers" href="folder.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <?php if ($page < $total_pages - 1) {
                                $pree_page = $page + 2; ?>
                                <a class="page-numbers" href="folder.php?page=<?php print($page + 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าต่อไป  -->
                            <?php if ($page < ($total_pages - 1)) { ?>
                                <a class="next page-numbers" href="folder.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>">&gt;</a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                            <?php if (($page < $total_pages)) { ?>
                                <a class="next page-numbers" href="folder.php?page=<?php print($total_pages); ?>&search=<?php print $search; ?>">&raquo;</a>
                            <?php } ?>

                        </div>
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