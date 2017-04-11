<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\mail\build;

//错误处理
use houdunwang\config\Config;

class Base {
	//邮件对象
	protected $mail;

	/**
	 * 发送邮件
	 *
	 * @param string $tomail 收件人邮箱
	 * @param string $toName 收件人名称
	 * @param string $title 邮件标题
	 * @param string $body 邮件内容
	 *
	 * @return boolean
	 */
	public function send( $tomail, $toName, $title, $body ) {
		$this->init();
		$this->mail->Subject = $title;
		//邮件标题
		$this->mail->MsgHTML( $body );
		//或正文内容
		$this->mail->AltBody = "";
		// 客户端提示信息摘要内容
		$this->mail->AddAddress( $tomail, $toName );
		//添加收件人，参数1：收件人邮箱  参数2：收件人名称
		if ( $this->mail->send() ) {
			return true;
		} else {
			return false;
		}
	}

	//配置参数
	protected function init() {
		$this->mail            = new PHPMailer();
		$this->mail->PluginDir = __DIR__ . '/';
		//是否为SMTP 必须设置
		$this->mail->IsSMTP();
		//字符集设置，中文乱码就是这个没有设置好 如utf8
		$this->mail->CharSet  = "utf-8";
		$this->mail->SMTPAuth = true;
		//是否需要验证
		if ( Config::get( 'mail.ssl' ) ) {
			//是否为ssl  gmail邮箱需要设置   126等不要设置注释掉
			$this->mail->SMTPSecure = "ssl";

		}
//		p(Config::get( 'mail' ));exit;
		$this->mail->Host = Config::get( 'mail.host' );
		//邮箱服务器smtp地址如smtp.gmail.com或smtp.126.com
		$this->mail->Port = Config::get( 'mail.port' );
		//邮箱服务器smtp端口，126等25，gmail 465
		$this->mail->Username = Config::get( 'mail.username' );
		//发送邮件邮箱用户名
		$this->mail->Password = Config::get( 'mail.password' );
		//发送邮件邮箱密码
		$this->mail->SetFrom( Config::get( 'mail.username' ), Config::get( 'mail.fromname' ) );
		//发件人
		$this->mail->AddReplyTo( Config::get( 'mail.frommail' ), Config::get( 'mail.fromname' ) );
		//回复时显示的用户名
		$this->mail->WordWrap = 50;
		//换行文字
		$this->mail->IsHTML( true );
		//以HTML形式发送邮件
	}
}