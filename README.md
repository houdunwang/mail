# 邮件

邮件组件内部集成了方便的邮件发送机制，只需要修改相应配置项即可发送邮件，使用非常简单。

[TOC]
####创建实例对象
```
$obj = new \houdunwang\mail\Mail();
```
####配置参数
以下是126邮箱配置:
```
$config =[
            'ssl'      => false,//服务器使用ssl
            'username' => 'houdunwang@126.com',//邮箱帐号
            'password' => '',//登录密码
            'host'     => 'smtp.126.com',//服务器主机
            'port'     => '25',//服务器端口号
            'fromname' => '后盾网',//发件人（会员收到邮件时显示）
            'frommail' => 'houdunwang@126.com',//发件人邮箱（会员收到邮件时显示）
         ];
$obj->config($config);
```

####发送邮件
$obj->send(收件人邮箱,收件人名称,邮件标题,邮件内容);
```
$body = "<h1>这是HDCMS的欢迎邮件</h1>";
$obj->send('2300071698@qq.com','HDPHP.COM','欢迎使用HDCMS',$body)
```