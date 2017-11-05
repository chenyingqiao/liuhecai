<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller {
	public function index() {
		return Admin::content(function (Content $content) {
			$uid = Admin::user()->id;

			$content->row(function (Row $row) {
				$row->column(6, function (Column $column) {
					$infoBox = new InfoBox('我要下注', 'users', 'aqua', '/admin/touzhu', "--");
					$column->append($infoBox);
				});
				$row->column(6, function (Column $column) {
					$infoBox = new InfoBox('我的下注记录', 'users', 'red', '/admin/buylist', "--");
					$column->append($infoBox);
				});
				// $row->column(3, function (Column $column) {
				// 	$infoBox = new InfoBox('查看下注历史', 'users', 'blue', '/admin/touzhu', "--");
				// 	$column->append($infoBox);
				// });
			});
		});
	}
}
