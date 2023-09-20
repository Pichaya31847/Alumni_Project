<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" media="screen and (min-width:0px)" href="./CSS/add.css" />
    <link rel="stylesheet" media="screen and (min-width:1000px)" href="./CSS/add1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

    <!-- รายละเอียด TABLE -->
    <?php
    include 'connect_server.php';
    $id = $_GET["id"];
    $sql = "SELECT * from student_info where Id_student like '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <section class="wrapper">
        <div class="box content">
            <div class="container">
                <add>ข้อมูลนักศึกษา</add>
                <form method="POST" action="./edit_student.php">
                    <div class="form first">
                        <div class="details personal">
                            <span class="title">รายละเอียดของนักศึกษา</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>รหัสนักศึกษา</label>
                                    <input type="text" name="id_student" value="<?php print $row["Id_student"]; ?>" readonly>
                                </div>

                                <div class="input-field">
                                    <label>คำนำหน้านาม</label>
                                    <input type="text" name="name_prefix" value="<?php print $row["prefix"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>ชื่อ - นามสกุล</label>
                                    <input type="text" name="name_student" value="<?php print $row["name_surename"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" name="name_nickname" value="<?php print $row["nicename"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>วัน เดือน ปีเกิด</label>
                                    <input type="text" name="date_birth" value="<?php print $row["birthday"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>ภูมิลำเนา (จังหวัด)</label>
                                    <input type="text" name="location_home" value="<?php print $row["location_home"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" name="tel_student" value="<?php print $row["tel_stu"]; ?>" maxlength="10">
                                </div>

                                <div class="input-field">
                                    <label>อีเมล</label>
                                    <input type="text" name="email_student" value="<?php print $row["email_stu"]; ?>" readonly>
                                </div>

                                <div class="input-field">
                                    <label style="font-size:13px">ลิงค์ URL หรือ ชื่อใน facebook</label>
                                    <input type="text" name="facebook_student" value="<?php print $row["facebook_stu"]; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="details ID">
                            <div class="fields">
                                <div class="input-field">
                                    <label>ID LINE สำหรับการติดต่อแชททาง LINE</label>
                                    <input type="text" name="line_student" value="<?php print $row["line_stu"]; ?>">
                                </div>

                                <div class="input-field"><br>
                                    <label>ปีที่จบการศึกษา</label>
                                    <input type="text" name="dath_end" value="<?php print $row["end_learn"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>เกรดเฉลี่ยสะสมทุกภาคการศึกษา (GPAX)</label>
                                    <input type="number" name="grade_student" value="<?php print $row["grade_stu"]; ?>" readonly>
                                </div>

                                <div class="input-field">
                                    <label>มีความสนใจ / เชี่ยวชาญ เรื่องใด</label>
                                    <input type="text" name="like_student" value="<?php print $row["like_typt"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>หลักสูตรที่ท่านกำลังศึกษา หรือ สำเร็จการศึกษา</label>
                                    <input type="text" name="majoy_end" value="<?php print $row["major_end"]; ?>">
                                </div>


                                <div class="input-field">
                                    <label>สถานที่ทำงานปัจจุบัน หรือยังไม่ได้ทำงาน</label>
                                    <input type="text" name="work_typt" value="<?php print $row["work_typt"]; ?>">
                                </div>

                                <div class="input-field"><br>
                                    <label>ชื่อสถานที่ทำงานปัจจุบัน</label>
                                    <input type="text" name="work_name" value="<?php print $row["name_work"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>ตำแหน่งงาน / หน้าที่รับผิดชอบ</label>
                                    <input type="text" name="position_typt" value="<?php print $row["position_work"]; ?>">
                                </div>

                                <div class="input-field">
                                    <label>เงินเดือนที่ได้รับ หรือกรอกเลข 0 กรณียังไม่ได้ทำงาน</label>
                                    <input type="text" name="salary_work" value="<?php print $row["salary"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="details">
                        <div class="buttons">
                            <button class="nextBtn">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- รายละเอียด TABLE -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
</body>

</html>