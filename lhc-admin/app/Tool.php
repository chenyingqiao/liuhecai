<?php

namespace App;

use App\Html;

/**
 * @Author: lerko
 * @Date:   2017-10-15 16:21:17
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-30 20:16:04
 */
/**
 * 工具类
 */
class Tool {
	/**
	 * 获取今天文字
	 * @Author   Lerko
	 * @DateTime 2017-10-15T16:22:25+0800
	 * @return   [type]                   [description]
	 */
	public static function getDayTime() {
		return date("Y-m-d") . " 00:00:00";
	}

	public static function getBellMapData() {
		return [
			"鼠" => [10, 22, 34, 46],
			"马" => [4, 16, 28, 40],
			"牛" => [9, 21, 33, 45],
			"羊" => [3, 15, 27, 39],
			"虎" => [8, 20, 32, 44],
			"猴" => [2, 14, 26, 38],
			"兔" => [7, 19, 31, 43],
			"鸡" => [1, 13, 25, 37, 49],
			"龙" => [6, 18, 30, 42],
			"狗" => [12, 24, 36, 48],
			"蛇" => [5, 17, 29, 41],
			"猪" => [11, 23, 35, 47],
		];
	}

	public static function getBellBosheMap() {
		return [
			"红波" => [1, 2, 7, 8, 12, 12, 18, 19, 23, 24, 29, 30, 34, 35, 40, 45, 46],
			"蓝波" => [3, 4, 9, 10, 14, 15, 20, 25, 26, 31, 36, 37, 41, 42, 47, 48],
			"绿波" => [05, 06, 11, 16, 17, 21, 22, 27, 28, 32, 33, 38, 39, 43, 44, 49],
		];
	}

	public static function getTouzhuType(){
		return [
			"波色","生肖","号码","单双"
		];
	}

	public static function getDanshuang(){
		return [
			"特大","特单","特合大","特合单",
			"特小","特双","特合小","特合双",
		];
	}

	public static function getBellMap($id) {
		$map = self::getBellMapData();
		foreach ($map as $key => $value) {
			if (in_array($id, $value)) {
				return $key;
			}
		}
	}

	/**
	 * 获取波色号码
	 * @Author   Lerko
	 * @DateTime 2017-10-28T11:34:20+0800
	 * @param    [type]                   $type [description]
	 * @return   [type]                         [description]
	 */
	public static function getBellBoshe($type) {
		$data = self::getBellBosheMap();
		return $data[$type];
	}

	/**
	 * 返回购买的种类
	 * @Author   Lerko
	 * @DateTime 2017-10-17T08:27:52+0800
	 * @param    [type]                   $key [description]
	 * @return   [type]                        [description]
	 */
	public static function getBuyType($key) {
		$map = [
			"波色",
			"生肖",
			"号码",
			"单双",
		];
		return $map[$key];
	}

	public static function getBellImagePath($id) {
		return "image/bell/$id.png";
	}

	/**
	 * 获取求图像string
	 * @Author   Lerko
	 * @DateTime 2017-10-17T08:33:08+0800
	 * @param    array                    $ids [description]
	 * @return   [type]                        [description]
	 */
	public static function getBellImagePathList(array $ids) {
		$htmlString = "";
		foreach ($ids as $key => $value) {
			$htmlString .= "<img src='/image/bell/$value.png' />";
		}
		return $htmlString;
	}



	public static function getTableShengxiaoData() {
		$data = [];
		$map = self::getBellMapData();
		$number=0;
		foreach ($map as $key => $value) {
			$data[] = [
				$key, self::getBellImagePathList($map[$key]), Html::redFont("11.5"), Html::getTextEdit("value[{$number}]",array_search($key,array_keys($map))),
			];
			$number++;
		}
		return $data;
	}

	public static function getTableHaomaData($peilv="48.5") {
		$data = [];
		for ($i = 1; $i <= 10; $i++) {
			$number = $i;
			$row = [];
			for ($y = 1; $y <= 5; $y++) {
				if ($number > 49) {
					$one_clonum = ["", "", ""];
				} else {
					$one_clonum = [
						self::getBellImagePathList([$number]), Html::redFont("48.5"), Html::getTextEdit("value[{$number}]",$number),
					];
				}
				foreach ($one_clonum as $key => $value) {
					$row[] = $value;
				}
				$number += 10;
			}
			$data[] = $row;
		}
		return $data;
	}

	public static function getTableDanshuangData(){
		$data=[];
		$map=self::getDanshuang();
		$one=array_splice($map,4);
		$two=$map;
		$number=0;
		foreach ($one as $key => $value) {
			$row=[
				$value,Html::redFont("1.79"),Html::getTextEdit("value[$number]",$number)
			];
			if(empty($data[0]))
				$data[0]=$row;
			else{
				$data[0]=array_merge($data[0],$row);
			}
			$number++;
		}
		foreach ($two as $key => $value) {
			$row=[
				$value,Html::redFont("1.79"),Html::getTextEdit("value[$number]",$number)
			];
			if(empty($data[1]))
				$data[1]=$row;
			else{
				$data[1]=array_merge($data[1],$row);
			}
			$number++;
		}
		return $data;
	}


	/**
	 * 购买表格的数据
	 * @Author   Lerko
	 * @DateTime 2017-10-28T11:14:07+0800
	 * @return   [type]                   [description]
	 */
	public static function getBuyTableData() {
		$data = [
			[
				"row" => ["波色", "号", "赔率", "金额"],
				"data" => [
					["红波", self::getBellImagePathList(self::getBellBoshe("红波")), Html::redFont("2.7"), Html::getTextEdit("value[0]",0)],
					["蓝波", self::getBellImagePathList(self::getBellBoshe("蓝波")), Html::redFont("2.7"), Html::getTextEdit("value[1]",1)],
					["绿波", self::getBellImagePathList(self::getBellBoshe("绿波")), Html::redFont("2.7"), Html::getTextEdit("value[2]",2)],
				],
			],
			[
				"row" => ["生肖", "号", "赔率", "金额"],
				"data" => self::getTableShengxiaoData(),
			],
			[
				"row" => [
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
				],
				"data" => self::getTableHaomaData(),
			],
			[
				"row"=>[
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
				],
				"data"=>self::getTableDanshuangData(),
			],
			[
				"row" => [
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
					"号码", "赔率", "金额",
				],
				"data" => self::getTableHaomaData(),
			],
		];
		return $data;
	}
}