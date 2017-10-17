<?php

namespace App;

/**
 * @Author: lerko
 * @Date:   2017-10-15 16:21:17
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-17 08:50:51
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

	/**
	 * 返回购买的种类
	 * @Author   Lerko
	 * @DateTime 2017-10-17T08:27:52+0800
	 * @param    [type]                   $key [description]
	 * @return   [type]                        [description]
	 */
	public static function getBuyType($key){
		$map=[
			"波色",
			"生肖",
			"号码",
			"单双"
		];
		return $map[$key];
	}

	public static function getBellImagePath($id){
		return "image/bell/$id.png";
	}

	/**
	 * 获取求图像string
	 * @Author   Lerko
	 * @DateTime 2017-10-17T08:33:08+0800
	 * @param    array                    $ids [description]
	 * @return   [type]                        [description]
	 */
	public static function getBellImagePathList(array $ids){
		$htmlString="";
		foreach ($ids as $key => $value) {
			$htmlString.="<img src='/image/bell/$value.png' />";
		}
		return $htmlString;
	}
}