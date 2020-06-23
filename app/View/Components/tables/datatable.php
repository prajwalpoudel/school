<?php

namespace App\View\Components\tables;

use Illuminate\View\Component;

class datatable extends Component
{
    /**
     * @var null
     */
    public $title;
    /**
     * @var null
     */
    public $tableClass;
    /**
     * @var null
     */
    public $tableId;
    /**
     * @var array
     */
    public $theads;
    /**
     * @var array
     */
    public $columns;
    /**
     * @var array
     */
    public $button;
    /**
     * @var null
     */
    public $url;
    /**
     * @var null
     */
    public $contentHeader;

    /**
     * Create a new component instance.
     *
     * @param null $title
     * @param null $tableClass
     * @param null $tableId
     * @param array $theads
     * @param array $columns
     * @param array $button
     * @param null $url
     * @param null $contentHeader
     */
    public function __construct($title = null, $tableClass = null, $tableId = null, $theads = [], $columns=[], $button=[], $url=null, $contentHeader = null)
    {
        $this->title = $title;
        $this->tableClass = $tableClass;
        $this->tableId = $tableId;
        $this->theads = $theads;
        $this->columns = $columns;
        $this->url = $url;
        $this->button = $button;
        $this->contentHeader = $contentHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.datatable');
    }
}
