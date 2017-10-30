<?php

namespace App\Widget;

use Encore\Admin\Widgets\Table;
use Encore\Admin\Widgets\Widget;
use Illuminate\Contracts\Support\Renderable;

class FormTable extends Table implements Renderable
{
	protected $view='Widget.formtable';

	protected $action="#";

    protected $type="";

	public function setAction($value){
		$this->action=$value;
	}

    public function setType($value)
    {
        $this->type=$value;
    }

    /**
     * Render the table.
     *
     * @return string
     */
    public function render()
    {
        $vars = [
            'headers'       => $this->headers,
            'rows'          => $this->rows,
            'style'         => $this->style,
            'action'        => $this->action,
            'type'        => $this->type,
            'attributes'    => $this->formatAttributes(),
        ];

        return view($this->view, $vars)->render();
    }
}