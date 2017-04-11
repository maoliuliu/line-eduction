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
    <style>
        #tab,#tab tr,#tab td,#tab th{
            border: 1px solid darkgray;
        }
        #tab{
            margin-left: 100px;
            width: 300px;
        }
        #tab tr{
            width: 100%;
            height: 30px;
        }
        #input{
            margin-left: 100px;
            margin-top: 30px;
        }
        #sub{
            margin-left: 100px;
        }
    </style>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
   <?php include "nav.php"?>
    <div class="tpl-content-wrapper">
        <h3 style="margin-left: 100px">我教授的课程有:</h3>
       <table id="tab">
           <tr>
               <td>课程编号</td>
               <td>课程名</td>

           </tr>
           <?php foreach ($results as $course){?>
           <tr>
               <th>1</th>
               <th><?php echo $course->cour_Name?></th>
           </tr>
           <?php }?>
       </table>
        <form action="teacher/teacher_add_course">
            <input type="text" name="newCourse" style="border: 1px solid #000" placeholder="请输入要添加的课程名" id="input"/>
            <input type="submit" value="添加课程" name="sub" style="display: block;margin-top: 20px" id="sub">
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>