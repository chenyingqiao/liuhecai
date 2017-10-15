<?php 

namespace App\System;
/**
 * @Author: Administrator
 * @Date:   2017-08-10 10:39:18
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-10 11:57:07
 */
class DI
{
	private static $container;
	private function __construct(){}
	public static function getInstance(){
		if(empty($container)){
			self::$container=new League\Container\Container();
		}
		return self::$container;
	}
	/**
	 * 取得注入容器中的对应类
	 * @Author   Lerko
	 * @DateTime 2017-08-10T10:45:19+0800
	 * @param    [type]                   $name [description]
	 * @return   [type]                         [description]
	 */
	public static function get($name)
	{
		$container=self::getInstance();
		return $container->get($name);
	}

	/**
	 * 将类添加到注入容器中
	 * @Author   Lerko
	 * @DateTime 2017-08-10T10:49:17+0800
	 * @param    [string|obj]                   $name  [description]
	 * @param    [type]                   $value [description]
	 * @param    boolean                  $share [description]
	 */
	public static function add($name,$value=null,$share = false)
	{
		$container=self::getInstance();
		return $container->add($name,$value,$share);
	}

	/**
	 * 添加共享的类到容器中
	 * @Author   Lerko
	 * @DateTime 2017-08-10T10:49:24+0800
	 * @param    [string|object]                   $alias    [description]
	 * @param    [string]                   $concrete [description]
	 * @return   [type]                             [description]
	 */
	public static function share($alias, $concrete = null)
	{
		$container=self::getInstance();
		return $container->share($name,$concrete);
	}
}