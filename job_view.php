<!DOCTYPE html>
<html lang="en">
<?php
include 'connect_server.php';
$id_post = $_GET["id_post"];
$sql_edit = "SELECT * from job_info where id_post like '$id_post' ";
$result_edit = $conn->query($sql_edit);
$row_edit = $result_edit->fetch_assoc();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Content</title>
</head>

<body style="background-color: #f5f5f5;" s>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <!-- Content -->
        <div class="container-fluid">
            <!-- Brand -->
            <img src="icon/logo.jpg" style="height: 40px;">
            <span class="Alumni ms-2">Alumni SciTech SDU</span>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
                <ul class="navbar-nav ">
                    <li class="nav-item mx-3 mt-2">
                        <a href="index.php" class="nav-font">หน้าแรก</a>
                    </li>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="alumni.php" class="nav-font">ทำเนียบศิษย์เก่า</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="contact.html" class="nav-font">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="https://forms.gle/a62Kmn2kbZV68iht6" class="nav-font">แบบประเมิน</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="#" class="nav-font" data-bs-target="#showForm" data-bs-toggle="modal">เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex flex-column" style="background: white; border: 1px solid #e0e0e0e0; margin-top: 10px; border-radius: 10px;">


            <div class="d-flex mx-4 my-3">
                <div class="post-excerpt">
                    <h2><a style="font-family: 'Kanit', sans-serif; color: #003366;"><?php print $row_edit["news_header"]; ?></a></h2>
                    <p class="post-meta">
                        <time datetime="2022-05-26" pubdate=""><?php print $row_edit["date_news"]; ?></time>
                    </p>
                </div>
            </div>
            <hr>
            
            <div class="d-flex mx-4 my-3" style="justify-content: center;">
                <div>
                    <?php
                        $id_pic_post = $row_edit["id_post"];
                        $sql_pic_post = "SELECT * from picture_job where id_post like '$id_pic_post' ";
                        $result_pic_post = $conn->query($sql_pic_post);
                        while ($row_pic_post = $result_pic_post->fetch_assoc()) {
                        ?>
                        <img src="upload/<?php print $row_pic_post['picture_name']; ?>" style="height: 200px;margin:10px 10px;">
                    <?php } ?> 
                </div>
            </div>
            <hr>
            <div class="d-flex mx-4 my-3">
                <div>
                <p class="head_content">
                                <time datetime="2022-05-26" pubdate="">ตำแหน่งงาน :<?php print $row_edit["new_position"]; ?></time>
                            </p>
                            <p class="head_content">
                                <time datetime="2022-05-26" pubdate="">จำนวนที่รับ :<?php print $row_edit["news_member"]; ?>&nbsp;คน</time>
                            </p>
                            <p class="head_content">
                                <time datetime="2022-05-26" pubdate="">รายละเอียด :<?php print $row_edit["new_desscri"]; ?></time>
                            </p>
                            <p class="head_content">
                                <time datetime="2022-05-26" pubdate="">ติดต่อ :<?php print $row_edit["new_contract"]; ?></time>
                            </p>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="showForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เข้าสู่ระบบ</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="logon.php">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>รหัสผ่าน</label>
                            <input type="password" class="form-control" name="pass" id="pass_box">
                            <label for="recipient-name" class="addcol-form-label" onclick="password_show()">
                                    <a href="#" class="add">
                                        <font style="font-size: 10px;">show password</font>
                                    </a>
                                </label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-primary">
                    </form>
                    <button class="btn btn-success" data-bs-target="#showForm1" data-bs-toggle="modal">ลงทะเบียน</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showForm1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เข้าสู่ระบบ</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>รหัสนักศึกษา</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>อีเมล</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>หมายเลขโทรศัพท์</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>หลักสูตรที่ท่านกำลังศึกษา หรือ สำเร็จการศึกษา</label>
                            <select class="form-select" name="Course" onchange="ETC(this.value)">
                                <option>วท.บ. วิทยาศาสตร์เทคโนโลยีการอาหาร</option>
                                <option>วท.บ. วิทยาศาสตร์สิ่งแวดล้อม</option>
                                <option>วท.บ. วิทยาศาสตร์การกีฬา</option>
                                <option>วท.บ. ชีววิทยาประยุกต์</option>
                                <option>วท.บ. เคมี</option>
                                <option>วท.บ. เทคโนโลยีเคมี</option>
                                <option>วท.บ. เทคโนโลยีอุตสาหกรรม</option>
                                <option>วท.บ. วิทยาการคอมพิวเตอร์</option>
                                <option>วท.บ. วิทยาการข้อมูลและการวิเคราะห์</option>
                                <option>วท.บ. เทคโนโลยีสารสนเทศ</option>
                                <option>ทล.บ. เทคโนโลยีสารสนเทศ</option>
                                <option>วท.บ. อุตสาหกรรมอาหารและการบริการ</option>
                                <option>วท.บ. เทคโนโลยีอุตสาหกรรม คหกรรมศาสตร์ทั่วไป</option>
                                <option>วท.บ. สถิติประยุกต์</option>
                                <option>วท.บ. วิทยาการความปลอดภัย</option>
                                <option>วท.บ. วิทยาศาสตร์เครื่องสำอาง</option>
                                <option>วท.บ. สิ่งแวดล้อมเมืองและอุตสาหกรรม</option>
                                <option>วท.บ. วิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม</option>
                                <option>วท.บ. อาชีวอนามัยและความปลอดภัย</option>
                                <option>วท.บ. อนามัยสิ่งแวดล้อมและสาธารณภัย</option>
                                <option>วท.บ. ออกแบบผลิตภัณฑ์อุตสาหกรรม</option>
                                <option>ค.บ. วิทยาศาสตร์ทั่วไป</option>
                                <option>ค.บ./ศษ.บ. คณิตศาสตร์</option>
                                <option>ศษ.บ. ฟิสิกส์</option>
                                <option value="etc">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="form-group mt-1" id="textclass">
                            <label>หลักสูตรอื่นๆ</label>
                            <input type="text" class="form-control" name="Courseetc">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <!-- Footer -->
    <div class="container-fluid" style="width: auto; margin-top: 80px; background-color: white; border-top: 1px solid #e0e0e0e0;">
        <div class="container d-flex justify-content-between mt-4">
            <img src="icon/sdu.png" style="height: 50px;">
        </div>
        <hr>
        <!-- Menu -->
        <div class="card-group container">
            <!-- Card 1 -->
            <div class="card border-white">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Kanit', sans-serif; color: #424242;">ผู้สนใจเรียน</h5>
                    <hr>
                    <a href="https://tcas.dusit.ac.th/open-courses.html" class="ft">
                        <p class="footer-font card-text">หลักสูตรที่เปิดรับ TCAS65</p>
                    </a>
                    <a href="https://tcas.dusit.ac.th/uploads/tcas64/fee2564.pdf" class="ft">
                        <p class="footer-font card-text">อัตราค่าธรรมเนียมการศึกษา</p>
                    </a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card border-white">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Kanit', sans-serif; color: #424242;">สถาบัน / สำนัก</h5>
                    <hr>
                    <a href="https://arit.dusit.ac.th/2019/" class="ft">
                        <p class="footer-font card-text">สำนักวิทยบริการและเทคโนโลยีสารสนเทศ</p>
                    </a>
                    <a href="https://regis.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">สำนักส่งเสริมวิชาการและงานทะเบียน</p>
                    </a>
                    <a href="https://www.research.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">สถาบันวิจัยและพัฒนา</p>
                    </a>
                    <a href="https://president.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">สำนักงานมหาวิทยาลัย</p>
                    </a>
                </div>
            </div>
            <!-- Card-3 -->
            <div class="card border-white">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Kanit', sans-serif; color: #424242;">บริการ</h5>
                    <hr>
                    <a href="https://academic.dusit.ac.th/academic/Login.sdu?mode=index" class="ft">
                        <p class="footer-font card-text">ระบบบริหารการศึกษา</p>
                    </a>
                    <a href="https://ed.engdis.com/dusit#/login" class="ft">
                        <p class="footer-font card-text">English Discoveries Online</p>
                    </a>
                    <a href="https://academic.dusit.ac.th/academic/GraduateCheck.sdu?mode=init" class="ft">
                        <p class="footer-font card-text">ระบบตรวจสอบผู้สำเร็จการศึกษา</p>
                    </a>
                    <a href="http://guidance.dusit.ac.th/WEB/" class="ft">
                        <p class="footer-font card-text">ศูนย์สนเทศแนะแนวการศึกษา กยศ. กรอ.</p>
                    </a>
                    <a href="https://regis.dusit.ac.th/calendar/" class="ft">
                        <p class="footer-font card-text">ปฏิทินการศึกษา</p>
                    </a>
                    <a href="https://arit.dusit.ac.th/2019/it.html" class="ft">
                        <p class="footer-font card-text">บริการด้านไอที</p>
                    </a>
                    <a href="http://www.thinnagorn.sci.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">ค้นหาหมายเลขโทรศัพท์ภายใน มสด.</p>
                    </a>
                    <a href="http://arit.dusit.ac.th/main/databases/" class="ft">
                        <p class="footer-font card-text">ฐานข้อมูลออนไลน์</p>
                    </a>
                    <a href="http://elearning.dusit.ac.th/course/category.php?id=3" class="ft">
                        <p class="footer-font card-text">e-Learning คณะวิทย์ฯ</p>
                    </a>
                    <a href="http://dormitory.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">หอพักศูนย์วิทยาศาสตร์</p>
                    </a>
                    <a href="https://hcdsuandusit.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">บริการศูนย์พัฒนาทุนมนุษย์</p>
                    </a>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="card border-white">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Kanit', sans-serif; color: #424242;">หน่วยงานมหาวิทยาลัย</h5>
                    <hr>
                    <a href="https://www.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">มหาวิทยาลัยสวนดุสิต</p>
                    </a>
                    <a href="https://education.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">คณะครุศาสตร์</p>
                    </a>
                    <a href="http://m-sci.dusit.ac.th/home/" class="ft">
                        <p class="footer-font card-text">คณะวิทยาการจัดการ</p>
                    </a>
                    <a href="http://human.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">คณะมนุษยศาสตร์และสังคมศาสตร์</p>
                    </a>
                    <a href="http://thmdusit.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">โรงเรียนการท่องเที่ยวและการบริการ</p>
                    </a>
                    <a href="http://nurse.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">คณะพยาบาลศาสตร์</p>
                    </a>
                    <a href="http://food.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">โรงเรียนการเรือน</p>
                    </a>
                    <a href="http://slp.dusit.ac.th/" class="ft">
                        <p class="footer-font card-text">โรงเรียนกฎหมายและการเมือง</p>
                    </a>
                    <a href="http://www.graduate.dusit.ac.th/main/" class="ft">
                        <p class="footer-font card-text">บัณฑิตวิทยาลัย</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fliud" style="background-color:#003366; width:auto;height:40px; color:#fff; padding-top:10px; padding-bottom: 10px;">
        <center>copyright © Alumni Faculty of Science and Technology | Suan Dusit University</center>
    </div>
</footer>

</html>
<script>
    function ETC(val) {
        if (val != 'etc') {
            document.getElementById('textclass').style.display = 'none';
        } else {
            document.getElementById('textclass').style.display = '';
        }
    }

    function password_show() {
        var x = document.getElementById("pass_box");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>