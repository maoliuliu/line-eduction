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
                    <a href="welcome/shouye" class="nav-link">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_lesson" class="nav-link tpl-left-nav-link-list ">
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
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-table"></i>
                        <span>教学管理</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_stu_information">
                                <i class="am-icon-angle-right"></i>
                                <span>学生管理</span>
                            </a>
                            <a href="teacher/t_admin_lesson">
                                <i class="am-icon-angle-right"></i>
                                <span>课程管理</span>
                            </a>
                            <a href="teacher/t_test">
                                <i class="am-icon-angle-right"></i>
                                <span>作业管理</span>
                            </a>
                            <a href="teacher/add_grade">
                                <i class="am-icon-angle-right"></i>
                                <span>成绩管理</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list active">
                        <i class="am-icon-wpforms"></i>
                        <span>我的评价</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_choose_stu" class="active">
                                <i class="am-icon-angle-right"></i>
                                <span>学生评价</span>
                            </a>

                            <a href="teacher/see_evaluate">
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
        <div class="a" style="width: 1000px; height:400px"></div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script>
    var names = new Array();
    var data1 = new Array();
    var data2 = new Array();
    var data3 = new Array();
    <?php
    foreach ($my_evaluate as $item) {
    ?>
    var str1 = '<?php echo $item->stud_Name?>';
    names.push(str1);
    var str2 = '<?php echo $item->time;?>';
    data1.push(str2);
    var str3 = '<?php echo $item->task; ?>'
    data2.push(str3);
    var str4 = '<?php echo $item->test;?>';
    data3.push(str4);
    <?php   } ?>
    option = {
        title: {
            text: '我的评价情况'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['按时完成作业', '作业成绩', '考试成绩'],
            align: 'right',
            right: 10
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            data: names
        }],
        yAxis: [{
            type: 'value',
            name: '分数',
            axisLabel: {
                formatter: '{value}'
            }
        }],
        series: [{
            name: '教学态度',
            type: 'bar',
            data: data1
        }, {
            name: '作业批改情况',
            type: 'bar',
            data: data2
        }, {
            name: '与学生互动情况',
            type: 'bar',
            data: data3
        }]
    };
    var $e=$('.a');
    function b(){
        $e.each(function(index,elem){
            var a = echarts.init(elem);
            a.setOption(option);
        })
    }
    $(window).load(function () {
        b();
        $('#location').trigger('click');
    });
</script>
</body>
</html>