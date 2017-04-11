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
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            在线教育系统列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="welcome/shouye" class="nav-link">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <?php if($teacher){?>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_lesson" class="nav-link tpl-left-nav-link-list">
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
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-wpforms"></i>
                        <span>我的评价</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="teacher/t_choose_stu">
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
                 <?php }else{ ?>
                <li class="tpl-left-nav-item">
                    <a href="teacher/t_introduce" class="nav-link tpl-left-nav-link-list active">
                        <i class="am-icon-key"></i>
                        <span>注册教师</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <form id="frm_reg" action="teacher/dot_itro" method="POST" style="float:left; width:620px;">
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
                    <th>专业</th>
                    <td>
                        <select id="mor" name="mor">
                            <?php foreach ($majors as $major){ ?>
                             <option  value ="<?php echo $major->majo_Id?>"><?php echo $major->majo_Name;?></option>
                            <?php } ?>
<!--                            <option name="mor" value ="saab">Saab</option>-->
<!--                            <option name="mor" value="opel">Opel</option>-->
<!--                            <option name="mor" value="audi">Audi</option>-->
                        </select>
<!--                        <input name="mor"  class="TEXT" style="width: 200px;" type="text">-->
                    </td>
                </tr>
                <tr id="title">
                    <th>职称</th>
                    <td>
<!--                        <input name="title" id="mor" class="TEXT" style="width: 200px;" type="text">-->
                        <select name="title">
                            <option  value ="初级教师">初级教师</option>
                            <option  value ="中级教师">中级教师</option>
                            <option  value="高级教师">高级教师</option>
                        </select>

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