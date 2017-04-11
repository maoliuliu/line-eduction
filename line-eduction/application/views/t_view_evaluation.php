<?php $user = $this->session->userdata('logindata');
$senders = $this->session->userdata('senders');?>
<!doctype html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>儿童教育系统</title>
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
   <?php include "nav.php"?>
    <div class="tpl-content-wrapper">
        <form action="teacher/add_evaluation" method="post">
        <div style="width: 90%; margin: 10px auto;">
            <input type="hidden" name="stu-id" value="<?php echo $stud_id;?>">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>评价项</th>
                    <th>儿童教育网站学生评价</th>
                </tr>
                </thead>
                <tbody>
                <tr class="info">
                    <th>按时完成作业：</th>
                    <th>
                        <div>
                            <div id="star2"></div>
                            <div id="result2"></div>
                            <span id="jg2"></span>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>作业成绩：</th>
                    <th>
                        <div>
                            <div id="star3"></div>
                            <div id="result3"></div>
                            <span id="jg3"></span>
                        </div>
                    </th>
                </tr>
                <tr class="info">
                    <th>学习时间：</th>
                    <th>
                        <div>
                            <div id="star1"></div>
                            <div id="result1"></div>
                            <span id="jg1"></span>
                        </div>
                    </th>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-success" value="确认提交" style="position: absolute; left: 90%;">
        </div>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.raty.js"></script>
<script>
    $(window).load(function () {
        $('#location').trigger('click');
    });
    rat('star1','result1',1,'jg1');
    rat('star2','result2',1,'jg2');
    rat('star3','result3',10,'jg3');
    function rat(star,result,m,jg){

        star= '#' + star;
        result= '#' + result;
        jg='#'+jg;
        $(result).hide();//将结果DIV隐藏

        $(star).raty({
            hints: ['10','20', '30', '40', '50','60', '70', '80', '90', '100'],
            path: "assets/img",
            starOff: 'star-off-big.png',
            starOn: 'star-on-big.png',
            size: 24,
            start: 40,
            showHalf: true,
            target: result,
            targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
            click: function (score, evt) {
                $(jg).html('你的评分是'+score*m+'分');
                $.get("teacher/t_pinglun?id="+id,function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
            }
        });

        /*第二种方式可以设置一个隐蔽的HTML元素来保存用户的选择值，然后可以在脚本里面通过jQuery选中这个元素来处理该值。 弹出结果
         var text = $(result).text();
         $('img').click(function () {
         if ($(result).text() != text) {
         alert('你的评分是'+$(result).text()/m+'分');
         alert(result);
         return;
         }
         });*/
    }
</script>
</body>
</html>