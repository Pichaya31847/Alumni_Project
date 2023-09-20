<!DOCTYPE html>
<html lang="en">
<?php session_start();
$username = $_SESSION["user"];
$status_id = $_SESSION["status"];
if (!empty($username)) {
    if ($status_id == '2') {
?>
        <style>
            .shadow_block {
                width: 100%;
                height: 100%;
                background-color: rgba(145, 142, 142, 0.514);
                position: absolute;
            }
        </style>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- CSS -->
            <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="./CSS/bootstrap.min.css">
            <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/del.css" />
            <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/del1.css" />


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

            <!-- ข้อมูลนักศึกษา -->
            <section class="wrapper">
                <div class="box content">
                    <div class="container">
                        <add style="font-size: 30px;font-weight:600">ข้อมูลนักศึกษา</add>

                        <div style="position: relative;float:right;margin-right:10px;">

                            <label style="margin-right:50px ;"><a href="addstudent.php">+ เพิ่มข้อมูลนักศึกษา</a></label>
                            <div class="input_file"><a href="#" id="modal" data-toggle="modal" data-target="#exampleModal"><img src="icon/icon_xcel.png" width="30px"></a></div>
                        </div>

                        <form action="#">
                            <div class="form first">
                                <div class="details personal" style="float: left;">
                                    <span style="font-size: 18px;font-weight:400" class="title">รายละเอียดของนักศึกษา</span>
                                </div>

                                <form action="#">
                                <!-- Search form -->
                                <?php include 'connect_server.php';
                                if (empty($_GET["searchid"])and empty($_GET["searchname"])and empty($_GET["searchcourse"])and empty($_GET["searchcen"])) { ?>
                                    <div class="search" style="float: right;">
                                        <input type="text" name="searchid" class="searchTermfirsr" placeholder="รหัสนักศึกษา">
                                        <input type="text" name="searchname" class="searchTermfirsr" placeholder="ชื่อ - นามสกุล">
                                        <select class="searchTermfirsr" name="searchcourse">
                                        <option value="">หลักสูตรที่จบ</option>
                                    <?php $sql = "SELECT DISTINCT major_end from student_info ORDER BY major_end";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php print $row["major_end"]; ?>"><?php print $row["major_end"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="searchTerm" name="searchcen">
                                        <option value="">ปีที่จบการศึกษา</option>
                                    <?php $sql = "SELECT DISTINCT end_learn from student_info ORDER BY end_learn";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php print $row["end_learn"]; ?>"><?php print $row["end_learn"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    
                                    <div class="search" style="float: right;">
                                        <input type="text" name="searchid" class="searchTermfirsr" placeholder="รหัสนักศึกษา" value="<?php print $_GET["searchid"]; ?>">
                                        <input type="text" name="searchname" class="searchTermfirsr" placeholder="ชื่อ - นามสกุล" value="<?php print $_GET["searchname"]; ?>">
                                        <select class="searchTermfirsr" name="searchcourse">
                                        <option value=""><?php print $_GET["searchcourse"]; ?></option>
                                    <?php $sql = "SELECT DISTINCT major_end from student_info ORDER BY major_end";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php print $row["major_end"]; ?>"><?php print $row["major_end"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="searchTerm" name="searchcen">
                                        <option value=""><?php print $_GET["searchcen"]; ?></option>
                                    <?php $sql = "SELECT DISTINCT end_learn from student_info ORDER BY end_learn";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php print $row["end_learn"]; ?>"><?php print $row["end_learn"]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div> 
                                    <?php } ?>
                            </form>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสนักศึกษา</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>อีเมล</th>
                                        <th>จบจากหลักสูตร</th>
                                        <th>ปีที่จบการศึกษา</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>เกรดเฉลี่ย(GPAX)</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($_GET['page'])) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }
                                    $searchid = $_GET["searchid"];
                                    $searchname = $_GET["searchname"];
                                    $searchcourse = $_GET["searchcourse"];
                                    $searchcen = $_GET["searchcen"];
                                    $num_per_page = 20;
                                    $start_from = ($page - 1) * 20;
                                    $sql = "SELECT * from student_info where Id_student like '%$searchid%' and name_surename like '%$searchname%' and major_end  like '%$searchcourse%' and end_learn  like '%$searchcen%' limit $start_from,$num_per_page ";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        if ($c == null) {
                                            $c = 1;
                                        } else {
                                            $c = $c + 1;
                                        }
                                    ?>
                                        <tr>
                                            <td><?php print $c; ?></td>
                                            <td><?php print $row["Id_student"]; ?></td>
                                            <td><?php print $row["prefix"] . $row["name_surename"]; ?></td>
                                            <td><?php print $row["email_stu"]; ?></td>
                                            <td><?php print $row["major_end"]; ?></td>
                                            <td><?php print $row["end_learn"]; ?></td>
                                            <td><?php print $row["tel_stu"]; ?></td>
                                            <td><?php print $row["grade_stu"]; ?></td>
                                            <td>
                                                <a href="editstudent.php?id=<?php print $row["Id_student"]; ?>">
                                                    <i style="display: flex;align-items: center;min-width: 60px;font-size: 35px;" class='bx bx-edit-alt'></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="del_student.php?id_student=<?php print $row["Id_student"]; ?>" onclick="return confirm('ยืนยันที่จะลบข้อมูลของรายชื่อนี้ไหม เมื่อลบไปแล้วข้อมูลจะไม่สามารถกู้คืนได้');">
                                                    <i style="display: flex;align-items: center;min-width: 60px;font-size: 35px;" class='bx bxs-trash deletebtn'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                        <?php
                        $getid_query = "SELECT  *  FROM  student_info where Id_student like '%$search%'  ";
                        $result = mysqli_query($conn, $getid_query);
                        $total_row = mysqli_num_rows($result);
                        $total_pages = ceil($total_row / $num_per_page); ?>
                        <div class="d-flex m-4 justify-content-center ">
                            <div class="navigation">
                                <!--  ปุ่มกดไปหน้าแรกสุด  -->
                                <?php if ($page > 2) { ?>
                                    <a class="next page-numbers" href="index_admin.php?page=1&search=<?php print $search; ?>">&laquo;</a>
                                <?php } ?>

                                <!--  ปุ่มกดไปหน้าก่อน  -->
                                <?php if ($page > 1) { ?>
                                    <a class="next page-numbers" href="index_admin.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>">&lt;</a>
                                <?php } ?>


                                <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                <?php if ($page > 2) {
                                    $pree_page = $page - 2; ?>
                                    <a class="page-numbers" href="index_admin.php?page=<?php print($page - 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                                <?php } ?>

                                <?php if ($page > 1) {
                                    $pree_page = $page - 1; ?>
                                    <a class="page-numbers" href="index_admin.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                                <?php } ?>

                                <!--  หน้า ณ ตอนนั้น  -->
                                <span aria-current="page" class="page-numbers current"><?php print $page ?></span>

                                <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                <?php if ($page < $total_pages) {
                                    $pree_page = $page + 1; ?>
                                    <a class="page-numbers" href="index_admin.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                                <?php } ?>

                                <?php if ($page < $total_pages - 1) {
                                    $pree_page = $page + 2; ?>
                                    <a class="page-numbers" href="index_admin.php?page=<?php print($page + 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                                <?php } ?>

                                <!--  ปุ่มกดไปหน้าต่อไป  -->
                                <?php if ($page < ($total_pages - 1)) { ?>
                                    <a class="next page-numbers" href="index_admin.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>">&gt;</a>
                                <?php } ?>

                                <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                                <?php if ($page < $total_pages) { ?>
                                    <a class="next page-numbers" href="index_admin.php?page=<?php print($total_pages); ?>&search=<?php print $search; ?>">&raquo;</a>
                                <?php } ?>

                            </div>
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