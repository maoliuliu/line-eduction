<?php $name = $this->session->userdata('logindata'); ?>
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
<header id="header" class="clearfix">
        <div id="head-logo">
            <img src="assets/img/11.jpg" alt="">
        </div>
    <ul id="menu">
        <li><a href="welcome/shouye/#news">知名教师</a></li>
        <li><a href="welcome/shouye/#excellent-course">精品课程<span>|</span></li>
        <li><a href="welcome/shouye/#recommend-lesson">热门课程<span>|</span></li>
    </ul>
        <div id="head-right">
            <?php if($name) {?>
            <a href="welcome/stud_teach"><?php echo $name->user_Name?></a>已登录
            <?php }else{ ?>
            <a href="welcome/login" class="aa">登录</a>
            <a href="student/reg" class="aa">注册</a>
            <?php }?>
        </div>

</header >
    <div id="banner" class="clearfix">
        <div class="wraapper">
            <div id="roller">
                <div id="roller-one">
                    <img src="assets/img/02.jpg" alt=""/>
                    <img src="assets/img/03.jpg" alt=""/>
                    <img src="assets/img/04.jpg" alt=""/>
                    <img src="assets/img/07.jpg" alt=""/>
                </div>
            </div>
            <span class="arrow prev"></span>
            <span class="arrow next"></span>
        </div>
    </div >
    <div id="news" class="clearfix">
        <div class="wraapper">
            <div class="title">
                <img src="assets/img/xw_2.png" alt="">
                知名教师
            </div>
            <div id="web" class="new">
                <div class="one">张三</div>
                <div class="leval">高级教师</div>
                <img src="assets/img/user05.png" alt="" class="two"/>
                <div class="three">儿童教育家，全国著名的语文教育专家。  江苏省首批特级教师、名教师。1956年毕业于江苏省南通女子师范学校，毕业后任教于南通师范第二附属小学至今，情境教学的首创者。</div>
            </div>
            <div id="social" class="new">
                <div class="one">王五</div>
                <div class="leval">高级教师</div>
                <img src="assets/img/user03.png" alt="" class="two"/>
                <div class="three">儿童教育家，全国著名的语文教育专家。江苏省首批特级教师、名教师。1956年毕业于江苏省南通女子师范学校，毕业后任教于南通师范第二附属小学至今，情境教学的首创者。</div>
            </div>
            <div id="mobile" class="new">
                <div class="one">李四</div>
                <div class="leval">高级教师</div>
                <img src="assets/img/user06.png" alt="" class="two"/>
                <div class="three">儿童教育家，全国著名的语文教育专家。江苏省首批特级教师、名教师。1956年毕业于江苏省南通女子师范学校，毕业后任教于南通师范第二附属小学至今，情境教学的首创者。</div>
            </div>
        </div>
    </div>
<div id="excellent-course" class="clearfix">
    <div class="wraapper">
        <div class="title">
            <img src="assets/img/xw_2.png" alt="">
            精品课程
        </div>
        <div class="icon-big">
            <div class="icon-img">
                <img src="assets/img/06.jpg" alt="">
            </div>
            <a href="#" class="cn">英语</a>
            <span class="eg">Financing</span>

        </div>
        <div class="icon-big">
            <div class="icon-img">
                <img src="assets/img/01.jpg" alt="">
            </div>
            <a href="#" class="cn">语文</a>
            <span class="eg">Investment funds</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/05.jpg" alt=""></div>
            <a href="#" class="cn">数学</a>
            <span class="eg">Equity</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/02.jpg" alt=""></div>
            <a href="#" class="cn">沟通</a>
            <span class="eg">Equity</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/03.jpg" alt=""></div>
            <a href="#" class="cn">画画</a>
            <span class="eg">Equity</span>
        </div>
    </div>
</div>
<div id="recommend-lesson" class="clearfix">
    <div class="wraapper">
        <div class="title">
            <img src="assets/img/xw_2.png" alt="">
            热门课程
        </div>
        <div class="icon-big">
            <div class="icon-img">
                <img src="assets/img/07.jpg" alt="">
            </div>
            <a href="#" class="cn">英语</a>
            <span class="eg">English</span>

        </div>
        <div class="icon-big">
            <div class="icon-img">
                <img src="assets/img/04.jpg" alt="">
            </div>
            <a href="#" class="cn">语文</a>
            <span class="eg">Chinese</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/05.jpg" alt=""></div>
            <a href="#" class="cn">数学</a>
            <span class="eg">Math</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/08.jpg" alt=""></div>
            <a href="#" class="cn">沟通</a>
            <span class="eg">Talk</span>
        </div>
        <div class="icon-big">
            <div class="icon-img"><img src="assets/img/11.jpg" alt=""></div>
            <a href="#" class="cn">画画</a>
            <span class="eg">Painting</span>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<!--<script src="assets/js/jquery.min.js"></script>-->
<script src="assets/js/jquery-1.12.4.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<!--<script src="assets/js/app.js"></script>-->
<!--<script src="js/jquery.raty.js" type="text/javascript"></script>-->
<script>
    $(function(){
        var show = 0;
        var rooler = document.getElementById('roller-one');
        var aimg = rooler.getElementsByTagName('img');
        var offset = aimg[0].offsetWidth;
        $("#banner .next").on('click',function(){
            show++;
            if(show == aimg.length) {
                show = 0;
            }
            $('#roller-one')[0].style.left = -offset*show + "px";
        });
        $("#banner .prev").on('click',function(){
            show--;
            if(show == -1){
                show = aimg.length - 1;
            }
            $('#roller-one')[0].style.left = -offset*show + "px";
        });
        var timer;
        function run(){
            timer = setInterval(function(){
                $("#banner .next").trigger('click');
            }, 3000);
        }
        run();

        $('#roller-one,.arrow').hover(function(){
            clearInterval(timer);
        },function(){
            run();
        });
    });
</script>
</body>

</html>