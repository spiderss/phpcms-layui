<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="statics/plugin/layui/css/layui.css">

    <title>后台登陆模块</title>
    <style>
        .login-container{width: 450px;position: absolute;top: 20%;left: 50%;margin-left: -225px}
        .login-container .layui-form-item .layui-input-inline{width:230px}
        .login-status{padding: 8px 0px 0px 10px;vertical-align:bottom;display: none}

    </style>
</head>
<body style="background: #eee">
<div class="login-container">
<form class="layui-form" action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" >
    <div class="layui-form-item">
        <label class="layui-form-label">账号</label>
        <div class="layui-input-inline">
            <input type="text" name="username" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">辅助文字</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">验证码</label>
        <div class="layui-input-inline" style="width: 110px;margin-right: 5px">
            <input type="text"  name="code" required lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input yzm">
         </div>
        <div class="layui-form-mid layui-word-aux" style="padding: 0px !important;">
            <img class="login-code" src="api.php?op=checkcode&amp;code_len=4&amp;font_size=18&amp;width=120&amp;height=50&amp;font_color=&amp;background=" alt="" onclick="this.src=this.src+'?'+Math.random()"></div>

    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn"  lay-submit style="margin: 0 auto"  lay-filter="*" >立即提交</button>
            <span id="login-status" class="login-status"><?php echo $msg;?></span>
        </div>
    </div>
</form>
</div>
<script src="statics/js/jquery.min.js"></script>
<script src="statics/plugin/layui/layui.all.js"></script>
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;
        form.on('submit(*)', function (data) {

              $.ajax({
                url: data.form.action,
                type: data.form.method,
                data: $(data.form).serialize(),
                success: function (info) {
                   info=$.parseJSON(info);
                if (info.code === 1) {
                    setTimeout(function () {
                        location.href = info.url;
                    }, 1000);
                }

                    layer.msg(info.msg);
                }
            });

            return false;
        });

    });

</script>
</body>
</html>