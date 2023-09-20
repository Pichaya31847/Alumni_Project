<!DOCTYPE html>
<html lang="en">

<?php
include 'connect_server.php';
if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
} ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Alumni</title>
</head>

<body style="background-color: #f5f5f5;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <!-- Content -->
        <div class="container-fluid">
            <!-- Brand -->
            <img src="sdu.png" style="height: 40px;">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
                <ul class="navbar-nav ">
                    <li class="nav-item mx-3 mt-2">
                        <a href="index.php" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">หน้าแรก</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="train.php" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">อบรม</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="contact.html" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="#" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">ศิษย์เก่า</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="https://forms.gle/a62Kmn2kbZV68iht6" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">แบบประเมิน</a>
                    </li>
                    <li class="nav-item mx-3 mt-2">
                        <a href="" class="" data-bs-target="#showForm" data-bs-toggle="modal" style="text-decoration: none; font-family: 'Kanit', sans-serif; color: gray; ">เข้าสู่ระบบ</a>
                    </li>
                    <li class="nav-item mx-3 mt-1">
                        <div class="input-group">
                            <form method="POST">
                                <?php $now_p = $_POST["search"];
                                if ($_POST["search"]) { ?>
                                    <input type="text" class="form-control form-control-sm" name="search" placeholder="<?php print $now_p; ?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control form-control-sm" name="search" placeholder="ค้นหา">
                                <?php } ?>
                            </form>


                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">

        <!-- การสร้าง Carousel -->
        <div class="carousel slide" id="slider1" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <button data-bs-target="#slider1" data-bs-slide-to="0"></button>
                <button data-bs-target="#slider1" data-bs-slide-to="1"></button>
                <button class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>
            </ol>
            <div class="carousel-inner  " style="background: #777; " align="center">
                <?php
                include 'connect_server.php';
                $sql_banner = "SELECT * from banner where status_banner = 'active'";
                $result_banner = $conn->query($sql_banner);
                $row_banner = $result_banner->fetch_assoc();
                ?>
                <div class="carousel-item active">
                    <img src="banner/<?php print $row_banner['name_banner']; ?>" style="height: 405px;" class="d-block img-fluid ">
                </div>

                <?php
                $sql_banners = "SELECT * from banner where status_banner = 'non'";
                $result_banners = $conn->query($sql_banners);
                while ($row_banners = $result_banners->fetch_assoc()) {
                ?>

                    <div class="carousel-item">
                        <img src="banner/<?php print $row_banners['name_banner']; ?>" style="height: 405px;" class="d-block img-fluid ">
                    </div>
                <?php } ?>

            </div>
            <!-- ควบคุมการ Slide ผ่านปุ่ม -->
            <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider1">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider1">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>



        <div class="container">
        <div class="d-flex flex-column" style="background: white; border: 1px solid #e0e0e0e0; margin-top: 10px; border-radius: 10px;">
                    <div class="d-flex mt-2 ms-3 me-3 justify-content-between" style="height: 20px; ">
                        <h5 style="font-family: 'Kanit', sans-serif;">อบรม</h5>
                    </div>
            <?php
            date_default_timezone_set('Asia/Bangkok');
            $search = $_POST["search"];
            $num_per_page = 10;
            $start_from = ($page - 1) * 10;
            $sql = "SELECT * from commu_info where news_header like '%$search%' ORDER BY date_news DESC limit $start_from,$num_per_page ";
            $result = $conn->query($sql) or die($conn->error);
            while ($row = $result->fetch_assoc()) {
            ?>

                <div class="d-flex mx-4 my-3">
                    <div class="post-excerpt">
                        <h2><a href="content.php?id_post=<?php print $row['id_post']; ?>" title="แผนผังมหาวิทยาลัยสวนดุสิต SDU GUIDE MAP 2022"><?php print $row["news_header"]; ?></a></h2>
                        <p class="post-meta">
                            <time datetime="2022-05-26" pubdate=""><?php print $row["date_news"]; ?></time>
                        </p>
                    </div>
                </div>
                <div class="d-flex mx-4 my-3">
                    <div class="post-cover">
                        <?php
                        $id_post = $row["id_post"];
                        $sql_pic = "SELECT * from picture_commu where id_post like '$id_post' ";
                        $result_pic = $conn->query($sql_pic);
                        $row_pic = $result_pic->fetch_assoc();
                        if ($row_pic['picture_name'] != null) {

                        ?>
                            <img src="upload/<?php print $row_pic['picture_name']; ?>" width="350px">
                        <?php } ?>


                    </div>
                </div>
                <hr>

            <?php } ?>

            <?php
            $getid_query = "SELECT  *  FROM  commu_info where news_header like '%$search%'  ";
            $result = mysqli_query($conn, $getid_query);
            $total_row = mysqli_num_rows($result);
            $total_pages = ceil($total_row / $num_per_page); ?>
            <div class="d-flex m-4 justify-content-center ">
                <div class="navigation">
                    <!--  ปุ่มกดไปหน้าแรกสุด  -->
                    <?php if ($page > 2) { ?>
                        <a class="next page-numbers" href="index.php?page=1&search=<?php print $search; ?>">&laquo;</a>
                    <?php } ?>

                    <!--  ปุ่มกดไปหน้าก่อน  -->
                    <?php if ($page > 1) { ?>
                        <a class="next page-numbers" href="index.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>">&lt;</a>
                    <?php } ?>


                    <!--  ปุ่มกดไปหน้าตามที่กด  -->
                    <?php if ($page > 2) {
                        $pree_page = $page - 2; ?>
                        <a class="page-numbers" href="index.php?page=<?php print($page - 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                    <?php } ?>

                    <?php if ($page > 1) {
                        $pree_page = $page - 1; ?>
                        <a class="page-numbers" href="index.php?page=<?php print($page - 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                    <?php } ?>

                    <!--  หน้า ณ ตอนนั้น  -->
                    <span aria-current="page" class="page-numbers current"><?php print $page ?></span>

                    <!--  ปุ่มกดไปหน้าตามที่กด  -->
                    <?php if ($page < $total_pages) {
                        $pree_page = $page + 1; ?>
                        <a class="page-numbers" href="index.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                    <?php } ?>

                    <?php if ($page < $total_pages - 1) {
                        $pree_page = $page + 2; ?>
                        <a class="page-numbers" href="index.php?page=<?php print($page + 2); ?>&search=<?php print $search; ?>"><?php print $pree_page; ?></a>
                    <?php } ?>

                    <!--  ปุ่มกดไปหน้าต่อไป  -->
                    <?php if ($page < ($total_pages - 1)) { ?>
                        <a class="next page-numbers" href="index.php?page=<?php print($page + 1); ?>&search=<?php print $search; ?>">&gt;</a>
                    <?php } ?>

                    <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                    <?php if (($page < $total_pages)) { ?>
                        <a class="next page-numbers" href="index.php?page=<?php print($total_pages); ?>&search=<?php print $search; ?>">&raquo;</a>
                    <?php } ?>

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
                            <input type="text" class="form-control" name="user">
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
                    <button class="btn btn-success" data-bs-target="#showForm1" data-bs-toggle="modal">ลงทะเบียน</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-primary" value="เข้าสู่ระบบ">
                </div>
                </form>
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
    <div class="container-fliud mt-5" style="background-color:#003366; width:auto;height:40px; color:#fff; padding-top:10px; padding-bottom: 10px;">
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