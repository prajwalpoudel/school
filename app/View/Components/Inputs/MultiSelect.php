<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class MultiSelect extends Component
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
    public $labelFor;
    /**
     * @var null
     */
    public $selectClass;
    /**
     * @var null
     */
    public $name;
    /**
     * @var null
     */
    public $placeHolder;
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
     * @var array
     */
    public $options;
    /**
     * @var null
     */
    public $optionText;
    /**
     * @var null
     */
    public $optionValue;

    /**
     * Create a new component instance.
     *
     * @param null $formClass
     * @param null $label
     * @param null $labelFor
     * @param null $selectClass
     * @param null $name
     * @param null $placeHolder
     * @param null $helpText
     * @param null $helpClass
     * @param null $value
     * @param array $options
     * @param null $optionText
     * @param null $optionValue
     */
    public function __construct(
        $formClass = null,
        $label = null,
        $labelFor = null,
        $selectClass = null,
        $name = null,
        $placeHolder = null,
        $helpText = null,
        $helpClass = null,
        $value = null,
        $options = [],
        $optionText = null,
        $optionValue = null
    )
    {
        $this->formClass = $formClass;
        $this->label = $label;
        $this->labelFor = $labelFor;
        $this->selectClass = $selectClass;
        $this->name = $name;
        $this->placeHolder = $placeHolder;
        $this->helpText = $helpText;
        $this->helpClass = $helpClass;
        $this->value = $value;
        $this->options = $options;
        $this->optionText = $optionText;
        $this->optionValue = $optionValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.multi-select');
    }
}
