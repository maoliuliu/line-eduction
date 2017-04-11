<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>儿童教育网站</title>
    <base href="<?php echo site_url() ?>">
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

</head>

<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                <span> 儿童教育网站</span>
            </div>
        </div>
        <div class="login-font">
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" id="reg1" action="welcome/do_reg" method="POST">
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="" id="doc-ipt-email-1" name="username" placeholder="输入用户账号">
                        <span id="name" >用户名必须十位纯数字</span>
                    </div>
                    <div >
                        <input type="password" id="password" name="password"  placeholder="输入密码">
                        <span id="psw"></span>
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="" id="doc-ipt-pwd-1" placeholder="再输一遍密码">
                        <span id="psw2"></span>
                    </div>
                    <p>
                        <button type="submit" class="am-btn am-btn-default" id="submit">提交</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script>
    $(function(){
        $elem = $('#submit');
        $elem.prop('disabled',true);
        var flag = [false,false,false];
        /** 用户名校验 **/
        $('#doc-ipt-email-1').on('blur', function () {
            var reg =/^\d{10}$/;
            if(reg.test(this.value)){
                $.get('welcome/check_name', {
                    username: this.value
                }, function (data) {
                    if ($.trim(data) == 'success') {
                        $('#name').html('√');
                        flag[0] = true;
                    } else {
                        $('#name').html('该用户名不可用');
                        flag[0] = false;
                    }
                    if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
                }, 'text');
            }else{
                $('#name').html('该用户名不可用');
                flag[0] = false;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });

        var $password = $('#password');
        var $repassword = $('#doc-ipt-pwd-1');
        var $psw = $('#psw');
        var $psw2 = $('#psw2');
        /** 密码校验 **/
        $password.on('blur', function () {
            var reg =/^\d$/;
            if(this.value.length < 8 || reg.test(this.value)) {
                $psw.html('至少8位并且不能全为数字！');
                flag[1] = false;
            }else{
                $psw.html('√');
                flag[1] = true;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });

        /** 确认密码校验 **/
        $repassword.on('blur', function () {
            if(this.value!= $password.val()){
                $psw2.html('密码不相同！');
                flag[2] = false;
            }else {
                $psw2.html('√');
                flag[2] = true;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });
    })
</script>
</body>

</html>