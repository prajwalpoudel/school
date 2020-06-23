<?php

namespace App\View\Components\inputs;

use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * @var null
     */
    public $formClass;
    /**
     * @var null
     */
    public $label;
    /**
     * @var null
     */
    public $name;
    /**
     * @var null
     */
    public $helpText;
    /**
     * @var null
     */
    public $helpClass;
    /**
     * @var null
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param null $formClass
     * @param null $label
     * @param null $name
     * @param null $helpText
     * @param null $helpClass
     * @param null $value
     */
    public function __construct(
        $formClass = null,
        $label = null,
        $name = null,
        $helpText = null,
        $helpClass = null,
        $value = null
    )
    {
        //
        $this->formClass = $formClass;
        $this->label = $label;
        $this->name = $name;
        $this->helpText = $helpText;
        $this->helpClass = $helpClass;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.checkbox');
    }
}
