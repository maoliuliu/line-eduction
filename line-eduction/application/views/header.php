<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
            <img src="assets/img/logo_header.jpg" alt="" style="height: 80px">
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="am-icon-comment-o"></span> 消息 <span class="am-badge tpl-badge-danger am-round">
                        <?php
                            $num = 0;
                            foreach ($senders as $sender){
                                $num++;
                            }
                            echo $num;
                        ?>
                    </span></span>
                </a>
                <ul class="am-dropdown-content tpl-dropdown-content">
                    <li class="tpl-dropdown-content-external">
                        <h3>你有 <span class="tpl-color-danger">
                                <?php
                                $num = 0;
                                foreach ($senders as $sender){
                                    $num++;
                                }
                                echo $num;
                                ?>
                            </span> 条新消息</h3><a href="###">全部</a></li>
                    <li>
                        <?php foreach ($senders as $sender){?>
                        <a href="student/see_message?sender_id=<?php echo $sender->sender_Id;?>" class="tpl-dropdown-content-message">
                                <span class="tpl-dropdown-content-photo">
                                  <img src="assets/img/user02.png" alt="">
                                </span>
                                <span class="tpl-dropdown-content-subject">
                                     <span class="tpl-dropdown-content-from"></span>
                                     <span class="tpl-dropdown-content-time"> </span>
                                </span>
                                <span class="tpl-dropdown-content-font"><?php echo $sender->user_Name?> </span>
                        </a>
                        <?php }?>
                    </li>

                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick"><?php echo $user->user_Name?></span><span class="tpl-header-list-user-ico"> <img src="assets/img/user01.png"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="welcome/login_out"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li><a href="welcome/login_out" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
        </ul>
    </div>
</header>