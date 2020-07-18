<?php

namespace App\View\Components\basic\accordion;

use Illuminate\View\Component;

class AccordionDetail extends Component
{
    /**
     * @var null
     */
    public $parentId;
    /**
     * @var null
     */
    public $id;
    /**
     * @var null
     */
    public $href;
    /**
     * @var null
     */
    public $title;
    /**
     * @var null
     */
    public $content;
    /**
     * @var null
     */
    public $icon;
    /**
     * @var string
     */
    public $collapsed;
    /**
     * @var string
     */
    public $show;
    /**
     * @var bool
     */
    public $expanded;

    /**
     * Create a new component instance.
     *
     * @param null $parentId
     * @param null $id
     * @param null $href
     * @param null $title
     * @param null $content
     * @param null $icon
     * @param string $collapsed
     * @param string $show
     * @param bool $expanded
     */
    public function __construct(
        $parentId = null,
        $id = null,
        $href = null,
        $title = null,
        $content = null,
        $icon = null,
        $collapsed = 'collapsed',
        $show = null,
        $expanded = 'false'
    )
    {
        $this->parentId = $parentId;
        $this->id = $id;
        $this->href = $href;
        $this->title = $title;
        $this->content = $content;
        $this->icon = $icon;
        $this->collapsed = $collapsed;
        $this->show = $show;
        $this->expanded = $expanded;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.basic.accordion.accordion-detail');
    }
}
