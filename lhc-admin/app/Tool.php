<?php

namespace App;

/**
 * @Author: lerko
 * @Date:   2017-10-15 16:21:17
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-15 22:09:09
 */
/**
* 工具类
*/
class Tool
{
	/**
	 * 获取今天文字
	 * @Author   Lerko
	 * @DateTime 2017-10-15T16:22:25+0800
	 * @return   [type]                   [description]
	 */
	public static function getDayTime()
	{
		return date("Y-m-d")." 00:00:00";
	}

	public static function getBellMap($id){
		$map=[
			"鼠"=>[10,22,34,46],
			"马"=>[4,16,28,40],
			"牛"=>[9,21,33,45],
			"羊"=>[3,15,27,39],
			"虎"=>[8,20,32,44],
			"猴"=>[2,14,26,38],
			"兔"=>[7,19,31,43],
			"鸡"=>[1,13,25,37,49],
			"龙"=>[6,18,30,42],
			"狗"=>[12,24,36,48],
			"蛇"=>[5,17,29,41],
			"猪"=>[11,23,35,47],
		];
		foreach ($map as $key => $value) {
			if(in_array($id,$value)){
				return $key;
			}
		}
	}

	public static function getBellImagePath($id){
		return "image/bell/$id.png";
	}
}