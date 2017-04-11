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
        #icon-img{
            width: 1000px;
            height: 620px;
            display: inline-block;
            margin-left: 115px;
        }
        #icon-img video{
            width: 100%;
            height: 90%;
        }
        .buy{
            display: inline-block;
            width: 54px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            background: deepskyblue;
            border-radius: 10px;
            color: #fff;
            margin: 5px 0 0 11px;
            font-size:15px;
            float: right;
            margin-right: 138px;
            margin-top: -43px;
            cursor: pointer;
        }
        .buy:hover{
            background: blue;
            color: #fff;
        }
    </style>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div id="icon-img">
    <video src="assets/vedio/<?php echo $result->vide_Url;?>" controls></video>
</div>
<a href="teacher/t_lesson" class="buy">返回</a>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
<script>
    var timer;
    var video = document.getElementsByTagName('video');
    var oIcon = document.getElementById('icon-img');
    var oEnd = document.getElementById('icon-img');
    function run(){
        timer = setTimeout(function(){
            //video.pause();
            oIcon.style.display = 'none';
            oEnd.style.display = 'block';
            cosole.log(11111);
        },2000);
    }
    run();
</script>
</body>

</html>