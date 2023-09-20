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
    <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/export.css" />
    <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/export1.css" />
    <link rel="stylesheet" href="css/style.css">


    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2ac91e9da1.js" crossorigin="anonymous"></script>


    <title>ADMIN SUAN DUSIT UNIVERSITY</title>
</head>

<body>

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
    
    <?php if ($_GET["search"]) { ?>
        <div class="container">
            <div class="header_contain">
                <div class="content_left">
                    <div class="content_left_up">
                        <add style="font-size: 30px;font-weight:600">ข้อมูลนักศึกษา</add>
                    </div>
                    <div class="content_left_down">
                        <span style="font-size: 18px;font-weight:400" class="title">รายละเอียด</span>
                    </div>
                </div>
                <div class="content_right">
                    <div class="content_right_down">
                        <form action="#">
                            <!-- Search form -->
                            <?php if (empty($_GET["search"])) { ?>
                                <div class="md-form mt-0" style="float: right;">
                                    <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
                                </div>
                            <?php } else { ?>
                                <div class="md-form mt-0">
                                    <input class="form-control" name="search" type="text" placeholder="<?php print $_GET["search"]; ?>" aria-label="Search">
                                </div> <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

            <hr>
            <div class="table_detail">

                <table class="table table-striped" id="headerTable">

                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสนักศึกษา</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>อีเมล</th>
                            <th class="notshow">เบอร์โทร</th>
                            <th class="notshow">facebook</th>
                            <th class="notshow">line</th>
                            <th>จบจากหลักสูตร</th>
                            <th>ปีที่จบการศึกษา</th>
                            <th>อาชีพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect_server.php';
                        if (empty($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $search = $_GET["search"];
                        $sql = "SELECT * from student_info where end_learn like '%$search%'  or major_end  like '%$search%' or position_work  like '%$search%'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if ($c == null) {
                                $c = 1;
                            } else {
                                $c = $c + 1;
                            }
                        ?>
                            <tr>
                                <td height="45"><?php print $c; ?></td>
                                <td>
                                    <font style="display: none;">'</font><?php print $row["Id_student"]; ?>
                                </td>
                                <td><?php print $row["prefix"] . $row["name_surename"]; ?></td>
                                <td><?php print $row["email_stu"]; ?></td>
                                <td class="notshow">'<?php print $row["tel_stu"]; ?></td>
                                <td class="notshow"><?php print $row["facebook_stu"]; ?></td>
                                <td class="notshow"><?php print $row["line_stu"]; ?></td>
                                <td><?php print $row["major_end"]; ?></td>
                                <td><?php print $row["end_learn"]; ?></td>
                                <td><?php print $row["position_work"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <hr>
            </div>
            <div class="bottom_export">
                <button class="btn btn-success" onclick="fnExcelReport()">ออกรายงาน</button>
            </div>
        </div>

    <?php } else { ?>
        <form action="#">
            <div class="shadow_block"></div>
            <div class="container_search">
                <div style="margin-bottom:10px;">
                    <add style="font-size: 30px;font-weight:600;">กรุณาใส่ข้อมูลที่ต้องการจะพิมพ์ออกมา</add>
                </div>
                <div class="md-form mt-0">
                    <input class="form-control" name="search" type="text" placeholder="อาชีพ , หลักสูตรที่จบ , ปีที่จบการศึกษา" aria-label="Search">
                </div>
            </div>
        </form>
    <?php } ?>

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

        function fnExcelReport() {
            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange;
            var j = 0;
            tab = document.getElementById('headerTable'); // id of table

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }

            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "รายงานรายชื่อนักศึกษา.xls");
            } else //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }
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