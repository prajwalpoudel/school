<?php

namespace App\View\Components\tables;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var array
     */
    public $theads;
    /**
     * @var array
     */
    public $tbody;
    /**
     * @var array
     */
    public $datas;

    /**
     * Create a new component instance.
     *
     * @param array $theads
     * @param array $tbody
     * @param array $datas
     */
    public function __construct(
        $theads = [],
        $tbody = [],
        $datas = []
    )
    {
        $this->theads = $theads;
        $this->tbody = $tbody;
        $this->datas = $datas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.table');
    }
}
