<?php 

namespace Test\System;

use App\System\Tool;
use PHPUnit\Framework\TestCase;
use Test\WebCase;
/**
 * @Author: Administrator
 * @Date:   2017-08-10 11:58:06
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-10 14:14:24
 */
class MainTest extends WebCase
{
	/**
	 * @test
	 * @Author   Lerko
	 * @DateTime 2017-08-10T11:59:42+0800
	 * @param    string                   $value [description]
	 */
	public function DiAddObj($value='')
	{
		$this->assertEquals(1, 1);
	}

	/**
	 * @test
	 * @Author   Lerko
	 * @DateTime 2017-08-10T14:12:27+0800
	 * @param    string                   $value [description]
	 * @return   [type]                          [description]
	 */
	public function getZanToken($value='')
	{
		$token=Tool::getZanPlantformAT();
		var_dump($token);
	}
}