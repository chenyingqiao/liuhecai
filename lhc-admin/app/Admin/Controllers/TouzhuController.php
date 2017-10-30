<?php
namespace App\Admin\Controllers;

use App\Buy;
use App\Html;
use App\Http\Controllers\Controller;
use App\Tool;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use Illuminate\Support\Facades\Input;

/**
 * @Author: lerko
 * @Date:   2017-10-28 21:03:39
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-30 20:12:40
 */
/**
 * 投注
 */
class TouzhuController extends Controller {
	use ModelForm;

	/**
	 * Index interface.
	 *
	 * @return Content
	 */
	public function index() {
		return Admin::content(function (Content $content) {

			$content->header('投注页面');

			$tab = new Tab();
			$tab->add("波色投注", Html::getBuyTable());
			$tab->add("生肖投注", Html::getBuyTable(1));
			$tab->add("号码投注", Html::getBuyTable(2));
			$tab->add("单双投注", Html::getBuyTable(3));
			$content->body($tab);
		});
	}

	/**
	 * [投注类型，投注数据 ，投注金额]
	 * @Author   Lerko
	 * @DateTime 2017-10-29T10:43:59+0800
	 * @param    [type]                   $list [description]
	 * @return   [type]                         [description]
	 */
	public function touzhuing() {
		$uid = Admin::user()->id;
		$post = Input::all();
		// var_dump($post);die;
		if (!isset($post['type'])) {
			return Admin::content(function (Content $content) {
				$content->header('提示');
				$content->body(Html::notify("发送错误"));
			});
		}
		foreach ($post['value'] as $key => $value) {
			if ($value[1] == 0) {
				continue;
			}
			$find = Buy::where("type", $post['type'])
				->where("uid", $uid)
				->where("data", $value[0])
				->where("datetime", Tool::getDayTime())
				->first();
			if (!$find) {
				$buy = new Buy();
				$buy->uid = $uid;
				$buy->type = $post['type'];
				$buy->data = $value[0];
				$buy->money = $value[1];
				$buy->datetime = Tool::getDayTime();
				$result = $buy->save();
			} else {
				$find->money = $value[1];
				$result = $find->save();
			}
		}
        $msg="";
		if (!isset($result)) {
			$msg = "没有下注信息";
		} else {
			if ($result) {
				$msg = "下注成功";
			} else {
				$msg = "下注失败";
			}

		}

		return Admin::content(function (Content $content)use ($msg) {
			$content->header('提示');
			$content->body(Html::notify($msg));
		});
	}
}