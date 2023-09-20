<!DOCTYPE html>
<html lang="en">
<?php session_start();
$username = $_SESSION["user"];
$status_id = $_SESSION["status"];
include "connect_server.php";
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
            <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/educate1.css" />
            <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/educate1.css" />
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
                    <div class="modal-content" style="margin-top: calc(2vh + 34%);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <h3>เพิ่มข้อมูลนักศึกษา</h3>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="education_show.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>ชื่อ - นามสกุล</label>
                                    <input type="text" name="name_sur" class="form-control" placeholder="ชื่อ - นามสกุล" required>
                                </div>
                                <div class="form-group">
                                    <label>หลักสูตรที่จบ</label>
                                    <input type="text" name="learn_end" class="form-control" placeholder="หลักสูตร" required>
                                </div>
                                <div class="form-group">
                                    <label>ปีการศึกษา</label>
                                    <input type="number" name="year_end" class="form-control inputstl" placeholder="ปีการศึกษา(พ.ศ.)" required>
                                </div>
                                <div class="form-group">
                                    <label>งานปัจจุบัน</label>
                                    <input type="text" name="work_now" class="form-control inputstl" placeholder="..." required>
                                </div>
                                <div class="form-group">
                                    <label>ผลงานดีเด่น</label>
                                    <input type="text" name="serti" class="form-control inputstl" placeholder="..." required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        รูปภาพ
                                    </label>
                                    <input type="file" name="file" class="form-control" accept="image/*">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="submit" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end_popup -->

            <!-- edit -->
            <?php if (!empty($_GET["id"])) {
                include 'connect_server.php';
                $id_post = $_GET["id"];
                $sql_edit = "SELECT * from education_show where no_stu like '$id_post'";
                $result_edit = $conn->query($sql_edit);
                $row_edit = $result_edit->fetch_assoc();
            ?>
                <div class="edit_con">
                    <div class="shadow_block"></div>
                    <div class="container_edit">
                        <div>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <h3>เพิ่มข้อมูลนักศึกษา</h3>
                                    </h5>
                                    <a></a>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <a href="educate.php">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </button>
                                </div>
                                <form enctype="multipart/form-data" method="POST" action="education_edit.php">
                                    <input type="hidden" name="id_stu" value="<?php print $id_post; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>ชื่อ - นามสกุล</label>
                                            <input type="text" name="name_sur" class="form-control" value="<?php print $row_edit["name_stu"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>หลักสูตรที่จบ</label>
                                            <input type="text" name="learn_end" class="form-control" value="<?php print $row_edit["learn_end"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ปีการศึกษา</label>
                                            <input type="number" name="year_end" class="form-control inputstl" value="<?php print $row_edit["year_end"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>งานปัจจุบัน</label>
                                            <input type="text" name="work_now" class="form-control inputstl" value="<?php print $row_edit["work_now"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ผลงานดีเด่น</label>
                                            <input type="text" name="serti" class="form-control inputstl" value="<?php print $row_edit["certi_stu"]; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                รูปภาพ
                                            </label>
                                            <div class="img_edit">
                                                <div class="img_chang">
                                                    <img id="output" src="img/<?php print $row_edit["picture_stu"]; ?>" width="100" height="100">
                                                    <input type="file" name="file" accept="image/*" id="selectedFile" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" style="display: none;">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="document.getElementById('selectedFile').click();"><i class="fas fa-edit"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="educate.php" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            <?php } ?>
            <!-- end edit -->

            <!-- edit_banner -->
            <?php if (!empty($_GET["edit"])) {
                include 'connect_server.php';
                $id_post = $_GET["edit"];
            ?>
                <div class="container_edit_popup">
                    <div class="shadow_block"></div>
                    <div class="container_edit_edu">
                        <div>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <h3>แก้ไขรูปภาพหน้าหลัก</h3>
                                    </h5>
                                    <button type="button" class="close">
                                        <a href="educate.php"><span aria-hidden="true">&times;</span></a>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" method="POST" action="banner_edu_up.php">
                                        <input type="hidden" name="id_post" value="<?php print $id_post; ?>">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">
                                                <font color="red">เมื่ออัพโหลดไปแล้วรูปภาพจะทำการเปลี่ยนเป็นรูปปัจจุบันทันที</font>
                                            </label>
                                            <input type="file" name="file" class="form-control" id="recipient-name" accept="image/*" require>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"><a href="educate.php" style="color: white;">Close</a></button>
                                            <input type="submit" class="btn btn-primary" value="Upload">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- end edit_banner -->

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

            <div class="container">
                <div class="headder_con">
                    <div class="left_con">
                        <add style="font-size: 25px;font-weight:600">ทำเนียบนักศึกษา</add>
                    </div>
                    <div class="right_con">
                        <div class="right_up"><label><a href="#" id="modal" data-toggle="modal" data-target="#exampleModal">+ เพิ่มข้อมูลนักศึกษา</a></label></div>
                        <div class="right_down">
                            <form method="POST" action="#">
                                <div class="wrap">
                                    <div class="search">
                                        <input type="text" name="search" class="searchTerm" placeholder="ค้นหาทำเนียบนักศึกษา">
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="contain_con">
                    <hr><?php if (!empty($_POST["search"])) { ?> ผลการค้นหา : <?php print $_POST["search"];
                                                                            } ?>
                    <div class="flex-container wrap">
                        <?php
                        if (empty($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $search = $_POST["search"];
                        $num_per_page = 6;
                        $start_from = ($page - 1) * 6;
                        $sql = "SELECT * from education_show where name_stu like '%$search%'ORDER BY no_stu DESC limit $start_from,$num_per_page ";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li class="flex-item">
                                <div class="photo">
                                    <div class="top_pic">
                                        <img height="100px" width="95px" src="./img/<?php print $row["picture_stu"]; ?>">
                                    </div>
                                    <div class="botton_pic">
                                        <a href="#">
                                            <i style="font-size: 20px;float: right;position: relative;right: 5%;top: 12%;" class='bx bxs-trash deletebtn'></i>
                                        </a>
                                        <a href="?id=<?php print $row["no_stu"]; ?>">
                                            <i style="font-size: 20px;float: right;position: relative;right: 10%;top: 12%;" class='bx bx-edit-alt'></i>
                                        </a>
                                    </div>
                                </div><br>
                                <p>ขื่อ : <?php print $row["name_stu"]; ?></p>
                                <p>หลักสูตรที่จบ : <?php print $row["learn_end"]; ?></p>
                                <p>ปีการศึกษา : <?php print $row["year_end"]; ?></p>
                                <p>งานปัจจุบัน : <?php print $row["work_now"]; ?></p>
                                <p>ผลงานดีเด่น : <?php print $row["certi_stu"]; ?></p>
                            </li>

                        <?php } ?>

                    </div>
                </div>
                <hr>
                <div class="footer_con">
                    <?php
                    $getid_query = "SELECT  *  FROM  education_show where name_stu like '%$search%'  ";
                    $result = mysqli_query($conn, $getid_query);
                    $total_row = mysqli_num_rows($result);
                    $total_pages = ceil($total_row / $num_per_page); ?>
                    <div class="d-flex m-4 justify-content-center ">
                        <div class="navigation">
                            <!--  ปุ่มกดไปหน้าแรกสุด  -->
                            <?php if ($page > 2) { ?>
                                <a class="next page-numbers" href="educate.php?page=1&search=<?php print $search; ?>">&laquo;</a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าก่อน  -->
                            <?php if ($page > 1) { ?>
                                <a class="next page-numbers" href="educate.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>">&lt;</a>
                            <?php } ?>


                            <!--  ปุ่มกดไปหน้าตามที่กด  -->
                            <?php if ($page > 2) {
                                $pree_page = $page - 2; ?>
                                <a class="page-numbers" href="educate.php?page=<?php print($page - 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <?php if ($page > 1) {
                                $pree_page = $page - 1; ?>
                                <a class="page-numbers" href="educate.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <!--  หน้า ณ ตอนนั้น  -->
                            <span aria-current="page" class="page-numbers current"><?php print $page ?></span>

                            <!--  ปุ่มกดไปหน้าตามที่กด  -->
                            <?php if ($page < $total_pages) {
                                $pree_page = $page + 1; ?>
                                <a class="page-numbers" href="educate.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <?php if ($page < $total_pages - 1) {
                                $pree_page = $page + 2; ?>
                                <a class="page-numbers" href="educate.php?page=<?php print($page + 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าต่อไป  -->
                            <?php if ($page < ($total_pages - 1)) { ?>
                                <a class="next page-numbers" href="educate.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>">&gt;</a>
                            <?php } ?>

                            <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                            <?php if (($page < $total_pages)) { ?>
                                <a class="next page-numbers" href="educate.php?page=<?php print($total_pages); ?>&search=<?php print $search; ?>">&raquo;</a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="headder_con">
                    <div class="center_con">
                        <center>
                            <add style="font-size: 25px;font-weight:600">รูปหน้าหลัก</add>
                        </center>
                    </div>
                    <hr>
                </div>
                <div class="contain_con">
                    <div class="flex-container wrap">
                        <?php
                        include 'connect_server.php';
                        $sql_banner = "SELECT * from banner_educate where status_banner = 'active'";
                        $result_banner = $conn->query($sql_banner);
                        $row_banner = $result_banner->fetch_assoc();
                        ?>
                        <li class="flex-item">
                            <div class="edit_img_banner">
                                <img src="./banner/<?php print $row_banner['name_banner']; ?>" width="277" height="223">
                            </div>
                            <div class="edit_button_banner">
                                <a href="?edit=<?php print $row_banner['id_banner']; ?>">
                                    <i style="font-size: 20px;float: right;position: relative;right: 10%;top: 44%;" class='bx bx-edit-alt'></i>
                                </a>
                            </div>
                        </li>
                        <?php
                        include 'connect_server.php';
                        $sql_bannerss = "SELECT * from banner_educate where status_banner = 'non'";
                        $result_bannerss = $conn->query($sql_bannerss);
                        while ($row_bannerss = $result_bannerss->fetch_assoc()) {
                        ?>
                            <li class="flex-item">
                                <div class="edit_img_banner">
                                    <img src="./banner/<?php print $row_bannerss['name_banner']; ?>" width="277" height="223">
                                </div>
                                <div class="edit_button_banner">
                                    <a href="?edit=<?php print $row_bannerss['id_banner']; ?>">
                                        <i style="font-size: 20px;float: right;position: relative;right: 10%;top: 44%;" class='bx bx-edit-alt'></i>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- JS -->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='https://unpkg.com/popper.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>

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
            </script>
        </body><br><br><br><br>

<?php } else {
        print "<script>alert('ไอดีนี้ไม่มีสิทธ์การเข้าถึงหน้านี้กรุณาติดต่อผู้ดูแลระบบ')</script>";
        print "<script>window.location='index.php';</script>";
    }
} else {
    print "<script>alert('กรุณาล็อคอินก่อน')</script>";
    print "<script>window.location='index.php';</script>";
} ?>

</html>