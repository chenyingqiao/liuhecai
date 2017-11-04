<?php

namespace App;

use App\Widget\FormTable;
use Illuminate\Support\Facades\URL;

/**
 * @Author: lerko
 * @Date:   2017-10-28 14:21:03
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-11-04 15:24:43
 */
/**
 * html同居
 */
class Html {
	/**
	 * 购买表格的数据
	 * @var [type]
	 */
	private static $data;

	public static function getBuyTableData() {
		if (!self::$data) {
			$data = Tool::getBuyTableData();
		}
		return $data;
	}

	public static function colorFont($value,$color="red") {
		return <<<HTML
		<span style="color:{$color};font-size: 3rem;">$value</span>
HTML;
	}

	public static function redFont($value) {
		return <<<HTML
		<span style="color:red;font-size: 3rem;">$value</span>
HTML;
	}

	/**
	 * 获取文本编辑框
	 * @Author   Lerko
	 * @DateTime 2017-10-28T11:36:23+0800
	 * @return   [type]                   [description]
	 */
	public static function getTextEdit($name, $data) {
		$money = 0;
		$money= rand(100,1000);
		return <<<HTML
<input type="hidden" name="{$name}[]" value="{$data}" >
<input type="number" name="{$name}[]" class="form-control" value="{$money}" min="" max="" step="" required="required" title="">
HTML;
	}

	/**
	 * 获取购买的table
	 * @Author   Lerko
	 * @DateTime 2017-10-29T10:41:17+0800
	 * @param    integer                  $type [description]
	 * @return   [type]                         [description]
	 */
	public static function getBuyTable($type = 0) {
		$data = self::getBuyTableData();
		$headers = $data[$type]['row'];
		$rows = $data[$type]['data'];
		$table = new FormTable($headers, $rows);
		$table->setAction(URL::to("/admin/touzhu/touzhuing"));
		$table->setType($type);
		return $table;
	}

	public static function notify($msg) {
		return <<<HTML
		<h1>{$msg}</h1>
		<a href="javascript:" class="btn btn-danger" onclick="self.location=document.referrer;">返回上一页</a>
HTML;
	}


	public static function getChar($type){
		$data=Tool::getCharData($type);
		// var_dump($data);die;
		return view('Widget.charbar',$data)->render();
	}
}