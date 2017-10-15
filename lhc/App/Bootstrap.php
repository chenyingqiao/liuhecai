<?php
namespace App;
use App\Route;
use App\System\Config;
use Phero\System\DI;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PlainTextHandler;
/**
 * @Author: Administrator
 * @Date:   2017-08-10 10:30:36
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:41:30
 */
class Bootstrap
{
	public function init(){
		$this->defineInit();
		$this->_err_handle();
		$this->init_db_config();
		(new Route)->routing()->dispatch();
	}

	public function defineInit(){
		define("WEB_APP_PATH",dirname(__FILE__));
		define("WEB_ROOT",dirname(dirname(__FILE__)));
	}

	public function _err_handle(){
		$whoops = new \Whoops\Run;
		$handle=new \Whoops\Handler\PrettyPageHandler;
		switch (Config::get("whoops")) {
			case 'xml':
					$handle=new XmlResponseHandler;
				break;
			case 'text':
					$handle=new PlainTextHandler;
				break;
			case 'json':
					$handle=new JsonResponseHandler;
				break;
		}
		$whoops->pushHandler($handle);
		$whoops->register();
	}

	public function init_db_config(){
		DI::inj(DI::config,Config::getDbConfigPath());
	}
}

