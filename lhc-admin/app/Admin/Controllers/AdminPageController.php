<?php
namespace App\Admin\Controllers;

use App\Data;
use App\Html;
use App\Http\Controllers\Controller;
use App\Lottery;
use App\Tool;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

/**
 * @Author: lerko
 * @Date:   2017-10-29 10:13:25
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-11-04 15:31:33
 */
/**
 * 购买控制器
 */
class AdminPageController extends Controller {
	use ModelForm;

	public function tongji($value = '') {

		return Admin::content(function (Content $content) {
			$content->row(function (Row $row) {
				$charbar = Html::getChar(1);
				$row->column(6, $charbar);
				$charbar = Html::getChar(2);
				$row->column(6, $charbar);
			});
			$content->row(function (Row $row) {
				$charbar = Html::getChar(3);
				$row->column(6, $charbar);
				$charbar = Html::getChar(4);
				$row->column(6, $charbar);
			});
			$content->row(function (Row $row) {
				$charbar = Html::getChar(5);
				$row->column(6, $charbar);
			});
		});
	}

	public function index() {
		return Admin::content(function (Content $content) {
            $content->header('header');
            $content->description('description');
			$content->body($this->grid());
		});
	}

	public function edit($id) {
	    return Admin::content(function (Content $content) use ($id) {
            $content->header('header');
            $content->description('description');
            $content->body($this->form()->edit($id));
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

	public function grid(){
        return Admin::grid(Lottery::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->column("普码")->display(function(){
            	return Tool::getBellImagePathList([
            		$this->key1,
            		$this->key2,
            		$this->key3,
            		$this->key4,
            		$this->key5,
            		$this->key6,
            	]);
            });
            $grid->column("特码")->display(function(){
            	return Tool::getBellImagePathList([$this->skey]);
            });
            $grid->datetime();
        });
	}

	public function form() {
		return Admin::form(Lottery::class, function (Form $form) {
			$form->text('key1', "号码1");
			$form->text('key2', "号码2");
			$form->text('key3', "号码3");
			$form->text('key4', "号码4");
			$form->text('key5', "号码5");
			$form->text('key6', "号码6");
			$form->text('skey', "特码");
		});

	}
}