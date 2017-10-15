<?php 

namespace App\System;
/**
 * @Author: Administrator
 * @Date:   2017-08-10 11:10:33
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:39:31
 */
class Config
{
	private static $config;
	private function __construct(){}
	public static function get($name)
	{
		if(empty($config)){
			$evn=self::getEvn();
			self::$config=require WEB_APP_PATH."/Config/{$evn}/config.php";
		}
		return self::$config[$name];
	}

	public static function getDbConfigPath(){
		$evn=self::getEvn();
		return WEB_APP_PATH."/Config/{$evn}/db.php";
	}

	private static function getEvn(){
		return require WEB_APP_PATH."/Config/evn.php";
	}
}