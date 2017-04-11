<?php $user = $this -> session -> userdata('logindata');
$senders = $this->session->userdata('senders');
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
    <script src="assets/js/echarts.min.js"></script>
    <style>
        .icon-big{
            float: left;
        }
        .icon-img video{
            width: 180px;
            height: 125px;
        }
        .link{
            display: inline-block;
            width: 79px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            background: deepskyblue;
            border-radius: 10px;
            color: #fff;
            font-size:15px;
        }
        .link:hover{
            background: blue;
            color:#fff
        }
    </style>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            儿童教育网站学生列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="student/shouye" class="nav-link subnav">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="student/lesson" class="nav-link tpl-left-nav-link-list subnav active">
                        <i class="am-icon-bar-chart"></i>
                        <span>我的资源</span>
                        <i class="tpl-left-nav-content tpl-badge-danger">
                            <?php
                            $num = 0;
                            foreach ($courses as $course){
                                $num++;
                            }
                            echo $num;
                            ?>
                        </i>
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav active" id="location">
                        <i class="am-icon-table"></i>
                        <span>我的中心</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="student/parents" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>家长中心</span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                            <a href="student/choose_lesson" class="subnav active">
                                <i class="am-icon-angle-right"></i>
                                <span>选课中心</span>
                                <i class="tpl-left-nav-content tpl-badge-success">

                                </i>
                            </a>
                            <a href="student/see_grade_stud" class="subnav active">
                                <i class="am-icon-angle-right"></i>
                                <span>我的成绩</span>
                                <i class="tpl-left-nav-content tpl-badge-success">
                                </i>
                            </a>
                            <a href="student/see_homework" class="subnav ">
                                <i class="am-icon-angle-right"></i>
                                <span>我的作业</span>
                                <i class="tpl-left-nav-content tpl-badge-success">
                                </i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-wpforms"></i>
                        <span>教师评价</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="student/evaluate" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>开始评价</span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                            <a href="student/view_evaluate" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>查看评价</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-key"></i>
                        <span>已注册学生</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <p>该视频价格为:<?php echo $result->vide_Price?>元</p>
        <a href="student/buy_video_true?id=<?php echo $result->vide_Id?>" class="link">确认购买</a>
        <a href="student/choose_lesson" class="link">点击返回</a>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
</body>

</html>