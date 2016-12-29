<?php
require 'vendor/autoload.php';
$config = [
	//服务器使用ssl
	'ssl'      => false,

	//邮箱帐号
	'username' => '',

	//登录密码
	'password' => '',

	//服务器主机
	'host'     => 'smtp.exmail.qq.com',

	//服务器端口号
	'port'     => '25',

	//发件人名称
	'fromname' => '后盾网',

	//发件人邮箱地址
	'frommail' => '',
];
$body   = "<h1>这是HDCMS的欢迎邮件</h1>";
\houdunwang\mail\Mail::send( '2300071698@qq.com', 'HDPHP.COM', '欢迎使用HDCMS', $body );