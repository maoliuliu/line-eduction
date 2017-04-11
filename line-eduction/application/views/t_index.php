<?php
     $name = $this->session->userdata('logindata');
?>
<!doctype html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>儿童教育网站</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .lesson{
            width: 25%;
            height: 330px;
            border:1px solid;
            float: left;
            margin-right:10px;
            margin-bottom:10px;
            text-align: center;
        }
        .lesson img{
            margin:0 5%;
            height: 250px;
            width: 90%;
        }
    </style>
</head>
<body data-type="index">
<?php include "t_header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            儿童教育网站教师系统列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="welcome/shouye" class="nav-link subnav active">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <?php
                     if($teacher){
                ?>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_lesson" class="nav-link tpl-left-nav-link-list subnav ">
                        <i class="am-icon-bar-chart"></i>
                        <span>我的资源</span>
                        <i class="tpl-left-nav-content tpl-badge-danger">
                            <?php
                               $num = 0;
                            foreach ($courses as $course) {
                                $num++;
                            }
                            echo $num;
                            ?>
                        </i>
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-table"></i>
                        <span>教学管理</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_stu_information" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>学生管理</span>
                            </a>
                            <a href="teacher/t_admin_lesson" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>课程管理</span>
                            </a>
                            <a href="teacher/t_test" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>作业管理</span>
                            </a>
                            <a href="form-news-list.html" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>成绩管理</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-wpforms"></i>
                        <span>我的评价</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_choose_stu" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>学生评价</span>
                            </a>

                            <a href="form-line.html" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>学习评价</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="tpl-left-nav-item">
                         <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                             <i class="am-icon-key"></i>
                             <span>已注册教师</span>
                         </a>
                  </li>
                 <?php  }else{?>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_introduce" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-key"></i>
                        <span>注册教师</span>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <div class="lesson-container" style="width: 80%; margin: 0 auto">
            <ul class="am-nav am-nav-pills am-nav-justify" style="height: 60px;">
                <li class="am-active"><a href="javascript:;">已有课程</a></li>
            </ul>
            <div class="lesson-content">
                <?php foreach ($courses as $course){ ?>
                    <div class="lesson">
                        <img src="" alt="<?php echo $course->cour_Name?>">
                        <p><?php echo $course->cour_Name?>，授课教师:<?php echo $course->teac_Name?>
                        分数：<?php echo $course->cour_Credit?>分</p>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>