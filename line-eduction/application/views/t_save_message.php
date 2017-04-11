
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
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script src="assets/js/jquery-1.12.4.js"></script>
    <style type="text/css">
        body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
    </style>
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
                            <a href="teacher/t_stu_information" class="active subnav">
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
                            <a href="teacher/add_grade" class="subnav">
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
        <div id="AdminContent">
            <div class="MainForm">
                <form id="BlogForm" action="teacher/save_message?stud_id=<?php echo $stud_id;?>" method="POST">
                    <input id="hdn_blog_id" name="draft" value="0" type="hidden">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                标题：<input name="title" id="f_title" class="TEXT" style="width: 400px; border: 1px solid #000000" type="text" >
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><textarea name="content" id="ta_blog_content" style="width:750px;height:300px; margin-left: 50px"></textarea></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr class="submit">
                            <td>
                                <input value=" 发 表 " class="BUTTON SUBMIT" type="submit">
                                <span id="ajax_processing" style="margin-left:10px;">正在提交，请稍候...</span>
                                <span id="submit_msg" style="display:none;"></span>
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
            <script type='text/javascript' src='assets/kindeditor/kindeditor-min.js' charset='utf-8'></script>
            <script>
                KE.show({

                    id : 'ta_blog_content',

                    resizeMode : 1,

                    shadowMode : false,

                    allowPreviewEmoticons : false,

                    allowUpload : true,

                    syncType : 'auto',

                    urlType : 'domain',

                    cssPath : 'css/ke-oschina.css',

                    imageUploadJson : '/action/blog/upload_img',

                    items : [ 'bold', 'italic', 'underline', 'strikethrough', 'removeformat','|','textcolor', 'bgcolor',

                        'title', 'fontname', 'fontsize',  '|',

                        'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|',

                        'code', 'image', 'flash', 'emoticons', 'link', 'unlink','|','selectall','source' ,'about'

                    ]

                });
            </script>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
</body>