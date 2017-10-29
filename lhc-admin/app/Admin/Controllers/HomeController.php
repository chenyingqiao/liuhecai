<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller {
	public function index() {
		return Admin::content(function (Content $content) {
			$uid = Admin::user()->id;

			$infoBox = new InfoBox('New Users', 'users', 'aqua', '/admin/users', '1024');
			if ($uid == 1) {
				$content->row(function (Row $row) {
					$row->column(4, function (Column $column) {
						$column->append(Dashboard::environment());
					});

					$row->column(4, function (Column $column) {
						$column->append(Dashboard::dependencies());
					});
				});
			} else {
				$content->row(function (Row $row) {
					$row->column(3, function (Column $column) {
						$infoBox = new InfoBox('平台总共用户数量', 'users', 'aqua', '#', 1752);

						$column->append($infoBox);
					});
				});
			}

		});
	}
}
