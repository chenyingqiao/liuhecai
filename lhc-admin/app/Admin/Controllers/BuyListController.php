<?php

namespace App\Admin\Controllers;

use App\Buy;
use App\Html;
use App\Http\Controllers\Controller;
use App\Tool;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

/**
 * @Author: lerko
 * @Date:   2017-10-16 21:45:04
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-29 16:18:01
 */
/**
 * 购买列表
 */
class BuyListController extends Controller {
	use ModelForm;

	public function index() {
		return Admin::content(function (Content $content) {
			$content->header("今日购买列表");

			$content->body($this->grid());
		});
	}

	public function edit($id) {
		return Admin::content(function (Content $content) use ($id) {
			$content->header('header');
			$content->description('description');
		});
	}

	/**
	 * Create interface.
	 *
	 * @return Content
	 */
	public function create() {
		return Admin::content(function (Content $content) {

			$content->header('header');
			$content->description('description');

			$content->body($this->form());
		});
	}

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		return Admin::grid(Buy::class, function (Grid $grid) {
			$uid = Admin::user()->id;
			if ($uid !== 1) {
				$grid->model()->where("uid", '=', $uid);
				$grid->model()->where("datetime", '=', Tool::getDayTime());
			}

			$grid->id('ID')->sortable();
			$grid->type("类型")->display(function ($type) {
				return Tool::getBuyType($type);
			});

			$grid->data("数据")->display(function ($data) {
				if ($this->type == 0) {
					$data= Tool::getBellBosheMap();
                    $keys = array_keys($data);
                    return Html::redFont($keys[$data]);
				} elseif ($this->type == 1) {
					$shengxiao = Tool::getBellMapData();
					$keys = array_keys($shengxiao);
					return Html::redFont($keys[$data]);
				} elseif ($this->type == 2) {
					return Tool::getBellImagePathList([$data]);
				} elseif ($this->type == 3) {
					$danshuang = Tool::getDanshuang();
					return Html::colorFont($danshuang[$data],"green");
				}
			});
			$grid->money("下单金额");
			$grid->datetime("下单日期")->display(function ($data) {
				return explode(" ", $data)[0];
			});
			$grid->created_at("下单时间");
			$grid->updated_at("修改金额时间");

			$grid->actions(function ($actions) {
				$actions->disableEdit();
			});
		});
	}
}