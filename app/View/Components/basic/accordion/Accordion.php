<?php

namespace App\View\Components\basic\accordion;

use Illuminate\View\Component;

class Accordion extends Component
{
    /**
     * @var null
     */
    public $parentId;
    /**
     * @var null
     */
    public $content;

    /**
     * Create a new component instance.
     *
     * @param null $parentId
     * @param null $content
     */
    public function __construct(
            $parentId = null,
            $content = null
    )
    {
        $this->parentId = $parentId;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.basic.accordion.accordion');
    }
}
