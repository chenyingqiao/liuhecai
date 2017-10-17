<?php

namespace App\Admin\Controllers;

use App\Buy;
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
 * @Last Modified time: 2017-10-17 08:50:23
 */
/**
* 购买列表
*/
class BuyListController extends Controller
{
	use ModelForm;

	public function index()
	{
		return Admin::content(function(Content $content){
			$content->header("六合彩开奖购买页面");
			$content->description("六合才购买统计页面");

			$content->body($this->grid());
		});
	}

	public function edit($id){
		return Admin::content(function(Content $content) use ($id){
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
    public function create()
    {
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
    protected function grid()
    {
        return Admin::grid(Buy::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->type()->display(function($type){
            	return Tool::getBuyType($type);
            });

            $grid->data()->display(function($data){
            	$ids=explode(",",$data);
            	return Tool::getBellImagePathList($ids);
            });
            $grid->datetime();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Buy::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}