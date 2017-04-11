<?php
$user = $this -> session -> userdata('logindata');
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
                <?php
                if($student){ ?>
                <li class="tpl-left-nav-item">
                    <a href="student/lesson" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-bar-chart"></i>
                        <span>我的课程</span>
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
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-table"></i>
                        <span>选课中心</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="student/parents" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>家长中心</span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                            <a href="student/choose_lesson" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>选课中心</span>
                                <i class="tpl-left-nav-content tpl-badge-success">

                                </i>
                            </a>
                            <a href="student/see_grade_stud" class="subnav">
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
                <?php   }else{  ?>
                <li class="tpl-left-nav-item">
                    <a href="student/introduce" class="nav-link tpl-left-nav-link-list subnav active">
                        <i class="am-icon-key"></i>
                        <span>注册学生</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <form id="frm_reg" action="student/do_itro" method="POST" style="float:left; width:620px;">
           <table cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <th>姓名：</th>
                    <td><input name="username" id="username" maxlength="20" class="TEXT" style="width: 150px;"
                               type="text">
                        <span id="name_msg">请使用真实姓名</span>
                    </td>
                </tr>
                <tr id="tr_email">
                    <th nowrap="nowrap">电子邮箱：</th>
                    <td>
                        <input name="email" id="email" class="TEXT" style="width: 200px;" type="text">
                        <span id="bbb" ></span>
                    </td>
                </tr>
                <tr id="mor">
                    <th>年级</th>
                    <td>
                        <input name="grade" id="mor" class="TEXT" style="width: 200px;" type="text">
                    </td>
                </tr>
                <tr id="tr_gender">
                    <th>性别：</th>
                    <td>
                        <input name="gender" value="1" id="gender_1" type="radio"><label for="gender_1">男</label>&nbsp;&nbsp;&nbsp;
                        <input name="gender" value="2" id="gender_2" type="radio"><label for="gender_2">女</label>
                        <span class="gender_msg">请选择性别</span>
                    </td>
                </tr>
                <tr class="buttons">
                    <th>&nbsp;</th>
                    <td style="padding: 20px 0pt;">
                        <input value=" 提交 " class="BUTTON SUBMIT" type="submit">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>