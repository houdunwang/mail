<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\mail;

use hdphp\kernel\ServiceProvider;

class MailProvider extends ServiceProvider {

	//延迟加载
	public $defer = true;

	public function boot() {
		\Mail::config( c( 'mail' ) );
	}

	public function register() {
		$this->app->single( 'Mail', function ( $app ) {
			return new Mail( $app );
		} );
	}
}