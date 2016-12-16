# 邮件

邮件组件内部集成了方便的邮件发送机制，只需要修改相应配置项即可发送邮件，使用非常简单。

登录 [GITHUB](https://github.com/houdunwang/mail)  查看源代码

[TOC]

##安装
HDPHP 框架已经内置此组件，无需要安装。
其他PHP产品使用composer进行安装或下载源代码使用。

```
composer require houdunwang/mail
```
##使用
####创建对象
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

##HDPHP
####配置文件
配置文件是 config/mail.php，配置项说明如下：
以下是126邮箱配置:
```
[
	'ssl'      => false,//服务器使用ssl
	'username' => 'houdunwang@126.com',//邮箱帐号
	'password' => '',//登录密码
	'host'     => 'smtp.126.com',//服务器主机
	'port'     => '25',//服务器端口号
	'fromname' => '后盾网',//发件人（会员收到邮件时显示）
	'frommail' => 'houdunwang@126.com',//发件人邮箱（会员收到邮件时显示）
]
```

####框架服务
hdphp中已经该组件制作成了服务。所以使用时不需要实例化对象，可直接使用服务Mail进行操作，以下是示例代码，其他功能请查看上面的 **使用** 章节。

Mail::send(收件人邮箱,收件人名称,邮件标题,邮件内容);
```
$body = "<h1>这是HDCMS的欢迎邮件</h1>";
Mail::send('2300071698@qq.com','HDPHP.COM','欢迎使用HDCMS',$body)
```