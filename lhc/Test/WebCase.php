<?php
namespace Test;

use App\Bootstrap;
use PHPUnit\Framework\TestCase;
class WebCase extends TestCase
{
	/**
	 * @beforeClass
	 * @Author   Lerko
	 * @DateTime 2017-08-15T09:41:14+0800
	 * @param    string                   $value [description]
	 */
	public function setUpWebEvn()
	{
		echo "初始化web环境\n";
		$bootstrap=new Bootstrap();
		$bootstrap->defineInit();
	}

}