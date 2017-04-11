<?php $user = $this->session->userdata('logindata');
$senders = $this->session->userdata('senders');?>
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
    <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
    <link href="assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="assets/js/star-rating.js" type="text/javascript"></script>
    <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            儿童教育网站教师系统列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="welcome/shouye" class="nav-link subnav">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_lesson" class="nav-link tpl-left-nav-link-list subnav">
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
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list active subnav">
                        <i class="am-icon-table"></i>
                        <span>教学管理</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right "></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_stu_information" class=" subnav">
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
                            <a href="teacher/add_grade" class="subnav active">
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

                            <a href="teacher/see_evaluate" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>查看评价</span>
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
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <div id="homework">
            <ul>
                <?php
                    foreach ($homeworks as $homework){
                    ?>
                    <li  class="row_1" style="height: 50px;margin-bottom: 10px">
                            <span class="comment">
                            <div class="user">
                                <b>题目：<?php echo $homework->home_Name;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>开始时间：<?php echo $homework->home_Start;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>结束时间：<?php echo $homework->home_End;?></b>
                            </div>
		                    <div class="content" style="margin-top: 10px">
                                <p><?php echo $homework->home_content;?></p>
                            </div>
	                	</span>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <p>原成绩： <?php echo $secograde->seco_Grade;?></p>
        <form action="teacher/enter_grade?stud_id=<?php echo $stud_id?>&cour_id=<?php echo $cour_id;?>" method="post"style="margin-top: 20px">
            <input type="text" name="enter" style="height: 40px;width: 200px;border: 1px solid #000000">
            <input type="submit" value="成绩录入" style="width: 80px;height: 40px;background:greenyellow;border-radius: 5px">
        </form>
        <form action="teacher/enter_grade?stud_id=<?php echo $stud_id?>&cour_id=<?php echo $cour_id;?>" method="post" style="margin-top: 20px">
            <input type="text" name="enter" style="height: 40px;width: 200px ;border: 1px solid #000000" placeholder="<?php echo $secograde->seco_Grade;?>">
            <input type="submit" value="成绩修改" style="width: 80px;height: 40px;background:greenyellow;border-radius: 5px">
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>