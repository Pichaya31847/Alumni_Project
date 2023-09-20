<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'connect_server.php';
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    if (empty($_GET['page_job'])) {
        $page_job = 1;
    } else {
        $page_job = $_GET['page_job'];
    }
    if (empty($_GET['page_edu'])) {
        $page_edu = 1;
    } else {
        $page_edu = $_GET['page_edu'];
    }  ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1844638b49.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
    <link rel="stylesheet" href="css/style.css">
    <title>Alumni</title>
</head>

<body style="background-color: #f5f5f5;">
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

    <!-- Content -->
    <div class="container-fluid">

        <!-- Carousel -->
        <div class="carousel slide" id="slider1" data-bs-ride="carousel" style="margin-bottom: 4rem;">
            <ol class="carousel-indicators">
                <button data-bs-target="#slider1" data-bs-slide-to="0"></button>
                <button data-bs-target="#slider1" data-bs-slide-to="1"></button>
                <button class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>
            </ol>
            <div class="carousel-inner  " style="background: #d3d3d3; " align="center">
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
                include 'connect_server.php';
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
            <div class="row">
                <!-- Content ฝั่งซ้าย -->
                <div class="col-12 col-sm-4 col-lg-4 m-1">
                    <!-- ทำเนียบศิษย์เก่า -->
                    <div class="carousel slide" id="slider2" data-bs-ride="carousel">
                        <div class="carousel-inner  " style="background: white; " align="center">
                            <?php
                            include 'connect_server.php';
                            $sql_bannerss = "SELECT * from banner_educate where status_banner = 'active'";
                            $result_bannerss = $conn->query($sql_bannerss);
                            $row_bannerss = $result_bannerss->fetch_assoc();
                            ?>
                            <div class="carousel-item active">
                                <img src="banner/<?php print $row_bannerss['name_banner']; ?>" style="height: 234px;" class="d-block img-fluid " onClick="location.href='alumni.php'">
                            </div>

                            <?php
                            include 'connect_server.php';
                            $sql_bannersss = "SELECT * from banner_educate where status_banner = 'non'";
                            $result_bannersss = $conn->query($sql_bannersss);
                            while ($row_bannersss = $result_bannersss->fetch_assoc()) {
                            ?>

                                <div class="carousel-item">
                                    <img src="banner/<?php print $row_bannersss['name_banner']; ?>" style="height: 234px;" class="d-block img-fluid " onClick="location.href='alumni.php'">
                                </div>
                            <?php } ?>
                        </div>
                        <!-- ควบคุมการ Slide ผ่านปุ่ม -->
                        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider2">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider2">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- รับสมัครงาน -->
                    <div style="background: white; border: 1px solid #e0e0e0e0; margin-top: 10px; border-radius: 10px;">
                        <div class="m-2">
                            <div>
                                <h5 style="font-family: 'Kanit', sans-serif; color: #424242;">รับสมัครงาน</h5>
                                <form method="POST">
                                    <div class="input-group">
                                        <?php if (!empty($_POST["search_job"])) { ?>
                                            <input type="text" class="form-control form-control-sm" name="search_job" placeholder="<?php print $_POST["search_job"]; ?>">
                                        <?php } else { ?>
                                            <input type="text" class="form-control form-control-sm" name="search_job" placeholder="ค้นหา">
                                        <?php } ?>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary btn-sm" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <?php
                            include 'connect_server.php';
                            $search_job = $_POST["search_job"];
                            $num_per_page_job = 7;
                            $start_from_job = ($page_job - 1) * 7;
                            $sql_job = "SELECT * from job_info where news_header like '%$search_job%' ORDER BY date_news DESC limit $start_from_job,$num_per_page_job ";
                            $result_job = $conn->query($sql_job);
                            while ($row_job = $result_job->fetch_assoc()) {
                            ?>
                                <div>
                                    <span class="job-font"><a href="job_view.php?id_post=<?php print $row_job["id_post"]; ?>"><?php print $row_job["news_header"]; ?></a></span><br>    
                                <span class="job-font">ตำแหน่งงาน : </span><span class="job-font"><?php print $row_job["new_position"]; ?></span><br>
                                    <span class="job-font">ตำแหน่งว่าง : </span><span class="job-font"><?php print $row_job["news_member"]; ?> คน</span><br>
                                    <span class="job-font">ติดต่อ : </span><span class="job-font"><?php print $row_job["new_contract"]; ?></span>
                                </div>
                                <hr>
                            <?php } ?>
                            <?php
                                $getid_query_job = "SELECT  *  FROM  job_info where news_header like '%$search_job%'  ";
                                $result_job = mysqli_query($conn, $getid_query_job);
                                $total_row_job = mysqli_num_rows($result_job);
                                $total_pages_job = ceil($total_row_job / $num_per_page_job); ?>
                                <div class="d-flex m-4 justify-content-center ">
                                    <div class="navigation">
                                        <!--  ปุ่มกดไปหน้าแรกสุด  -->
                                        <?php if ($page_job > 2) { ?>
                                            <a class="next page-numbers" href="index.php?page_job=1&search_job=<?php print $page_job; ?>">&laquo;</a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าก่อน  -->
                                        <?php if ($page_job > 1) { ?>
                                            <a class="next page-numbers" href="index.php?page_job=<?php print($page_job - 1); ?>&search_job=<?php print $search_job; ?>">&lt;</a>
                                        <?php } ?>


                                        <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                        <?php if ($page_job > 2) {
                                            $pree_page_job = $page_job - 2; ?>
                                            <a class="page-numbers" href="index.php?page_job=<?php print($page_job - 2); ?>&search_job=<?php print $search_job; ?>"><?php print $pree_page_job; ?></a>
                                        <?php } ?>

                                        <?php if ($page_job > 1) {
                                            $pree_page_job = $page_job - 1; ?>
                                            <a class="page-numbers" href="index.php?page_job=<?php print($page_job - 1); ?>&search_job=<?php print $search_job; ?>"><?php print $pree_page_job; ?></a>
                                        <?php } ?>

                                        <!--  หน้า ณ ตอนนั้น  -->
                                        <span aria-current="page" class="page-numbers current"><?php print $page_job ?></span>

                                        <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                        <?php if ($page_job < $total_pages_job) {
                                            $pree_page_job = $page_job + 1; ?>
                                            <a class="page-numbers" href="index.php?page_job=<?php print($page_job + 1); ?>&search_job=<?php print $search_job; ?>"><?php print $pree_page_job; ?></a>
                                        <?php } ?>

                                        <?php if ($page_job < $total_pages_job - 1) {
                                            $pree_page_job = $page_job + 2; ?>
                                            <a class="page-numbers" href="index.php?page_job=<?php print($page_job + 2); ?>&search_job=<?php print $search_job; ?>"><?php print $pree_page_job; ?></a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าต่อไป  -->
                                        <?php if ($page_job < ($total_pages_job - 1)) { ?>
                                            <a class="next page-numbers" href="index.php?page_job=<?php print($page_job + 1); ?>&search_job=<?php print $search_job; ?>">&gt;</a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                                        <?php if (($page_job < $total_pages_job)) { ?>
                                            <a class="next page-numbers" href="index.php?page_job=<?php print($total_pages_job); ?>&search_job=<?php print $search_job; ?>">&raquo;</a>
                                        <?php } ?>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Content ขวา -->
                <div class="col-12 col-sm-7 col-lg-7 m-1" style="background: white; border: 1px solid #e0e0e0e0; margin-top: 10px; border-radius: 10px;">
                    <div class="bs-example m-2">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#sectionA" class="nav-link active" data-toggle="tab">ข่าวประชาสัมพันธ์</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sectionB" class="nav-link" data-toggle="tab">อบรม</a>
                            </li>
                        </ul>

                        <!-- ข่าวประชาสัมพันธ์ -->
                        <div class="tab-content">
                            <div id="sectionA" class="tab-pane fade show active">
                                <div class="m-3">
                                    <form method="POST">
                                        <div class="input-group">
                                            <?php if (!empty($_POST["search_edu"])) { ?>
                                                <input type="text" class="form-control form-control-sm" name="search_edu" placeholder="<?php print $_POST["search"]; ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control form-control-sm" name="search_edu" placeholder="ค้นหา">
                                            <?php } ?>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn-sm" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                include 'connect_server.php';
                                $search_edu = $_POST["search_edu"];
                                $num_per_page_edu = 10;
                                $start_from_edu = ($page_edu - 1) * 10;
                                $sql = "SELECT * from commu_info where news_header like '%$search_edu%' ORDER BY date_news DESC limit $start_from_edu,$num_per_page_edu ";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <div class="d-flex mx-4 my-3">
                                        <div class="post-excerpt">
                                            <h2><a href="content.php?id_post=<?php print $row['id_post']; ?>&status_web=1"><?php print $row["news_header"]; ?></a></h2>
                                            <p class="post-meta">
                                                <time datetime="2022-05-26" pubdate=""><?php print $row["date_news"]; ?></time>
                                            </p>
                                        </div>
                                    </div>

                                    <hr>
                                <?php } ?>


                                <?php
                                $getid_query_edu = "SELECT  *  FROM  commu_info where news_header like '%$search_edu%'  ";
                                $result_edu = mysqli_query($conn, $getid_query_edu);
                                $total_row_edu = mysqli_num_rows($result_edu);
                                $total_pages_edu = ceil($total_row_edu / $num_per_page_edu); ?>
                                <div class="d-flex m-4 justify-content-center ">
                                    <div class="navigation">
                                        <!--  ปุ่มกดไปหน้าแรกสุด  -->
                                        <?php if ($page_edu > 2) { ?>
                                            <a class="next page-numbers" href="index.php?page_edu=1&search_edu=<?php print $page_edu; ?>">&laquo;</a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าก่อน  -->
                                        <?php if ($page_edu > 1) { ?>
                                            <a class="next page-numbers" href="index.php?page_edu=<?php print($page_edu - 1); ?>&search_edu=<?php print $search_edu; ?>">&lt;</a>
                                        <?php } ?>


                                        <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                        <?php if ($page_edu > 2) {
                                            $pree_page = $page_edu - 2; ?>
                                            <a class="page-numbers" href="index.php?page_edu=<?php print($page_edu - 2); ?>&search_edu=<?php print $search_edu; ?>"><?php print $pree_page; ?></a>
                                        <?php } ?>

                                        <?php if ($page_edu > 1) {
                                            $pree_page = $page_edu - 1; ?>
                                            <a class="page-numbers" href="index.php?page_edu=<?php print($page_edu - 1); ?>&search_edu=<?php print $search_edu; ?>"><?php print $pree_page; ?></a>
                                        <?php } ?>

                                        <!--  หน้า ณ ตอนนั้น  -->
                                        <span aria-current="page" class="page-numbers current"><?php print $page_edu ?></span>

                                        <!--  ปุ่มกดไปหน้าตามที่กด  -->
                                        <?php if ($page_edu < $total_pages_edu) {
                                            $pree_page = $page_edu + 1; ?>
                                            <a class="page-numbers" href="index.php?page_edu=<?php print($page_edu + 1); ?>&search_edu=<?php print $search_edu; ?>"><?php print $pree_page; ?></a>
                                        <?php } ?>

                                        <?php if ($page_edu < $total_pages_edu - 1) {
                                            $pree_page = $page_edu + 2; ?>
                                            <a class="page-numbers" href="index.php?page_edu=<?php print($page_edu + 2); ?>&search_edu=<?php print $search_edu; ?>"><?php print $pree_page; ?></a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าต่อไป  -->
                                        <?php if ($page_edu < ($total_pages_edu - 1)) { ?>
                                            <a class="next page-numbers" href="index.php?page_edu=<?php print($page_edu + 1); ?>&search_edu=<?php print $search_edu; ?>">&gt;</a>
                                        <?php } ?>

                                        <!--  ปุ่มกดไปหน้าสุดท้าย  -->
                                        <?php if (($page_edu < $total_pages_edu)) { ?>
                                            <a class="next page-numbers" href="index.php?page_edu=<?php print($total_pages_edu); ?>&search_edu=<?php print $search_edu; ?>">&raquo;</a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- ข่าวอบรม -->
                            <div id="sectionB" class="tab-pane fade">
                                <div class="m-3">
                                    <form method="POST">
                                        <div class="input-group">
                                            <?php if (!empty($_POST["searchs"])) { ?>
                                                <input type="text" class="form-control form-control-sm" name="searchs" placeholder="<?php print $_POST["searchs"]; ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control form-control-sm" name="searchs" placeholder="ค้นหา">
                                            <?php } ?>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn-sm" style="font-family: 'Kanit', sans-serif;">ค้นหา</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                include 'connect_server.php';
                                $search_commu = $_POST["searchs"];
                                $num_per_page = 10;
                                $start_from = ($page - 1) * 10;
                                $sqls = "SELECT * from news_info where news_header like '%$search_commu%' ORDER BY date_news DESC limit $start_from,$num_per_page ";
                                $results = $conn->query($sqls);
                                while ($rows = $results->fetch_assoc()) {
                                ?>
                                    <div class="d-flex mx-4 my-3">
                                        <div class="post-excerpt">
                                            <h2><a href="content.php?id_post=<?php print $rows['id_post']; ?>&status_web=1"><?php print $rows["news_header"]; ?></a></h2>
                                            <p class="post-meta">
                                                <time datetime="2022-05-26" pubdate=""><?php print $rows["date_news"]; ?></time>
                                            </p>
                                        </div>
                                    </div>

                                    <hr>
                                <?php } ?>


                                <?php
                                $getid_query = "SELECT  *  FROM  news_info where news_header like '%$search%'  ";
                                $result_commu = mysqli_query($conn, $getid_query);
                                $total_row = mysqli_num_rows($result_commu );
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
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
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
                            <select class="form-select" name="Course">
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
                                <option>อื่นๆ</option>
                            </select>
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
<script>
    function password_show() {
        var x = document.getElementById("pass_box");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>