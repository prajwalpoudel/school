<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class bootstrapSelect extends Component
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
    public $selectId;
    /**
     * @var null
     */
    public $name;
    /**
     * @var null
     */
    public $placeHolder;
    /**
     * @var bool
     */
    public $disabledOption;
    /**
     * @var string
     */
    public $disabledText;
    /**
     * @var array
     */
    public $options;
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
    public $optionText;
    /**
     * @var null
     */
    public $optionValue;


    /**
     * bootstrapSelect constructor.
     * @param null $formClass
     * @param null $label
     * @param null $labelFor
     * @param null $selectClass
     * @param null $selectId
     * @param null $name
     * @param null $placeHolder
     * @param bool $disabledOption
     * @param string $disabledText
     * @param array $options
     * @param null $helpText
     * @param null $helpClass
     * @param null $optionText
     * @param null $optionValue
     */
    public function __construct(
        $formClass = null,
        $label = null,
        $labelFor = null,
        $selectClass = null,
        $selectId = null,
        $name = null,
        $placeHolder = null,
        $disabledOption = false,
        $disabledText = 'Select',
        $options = [],
        $helpText = null,
        $helpClass = null,
        $optionText = null,
        $optionValue = null
    )
    {
        $this->formClass = $formClass;
        $this->label = $label;
        $this->labelFor = $labelFor;
        $this->selectClass = $selectClass;
        $this->selectId = $selectId;
        $this->name = $name;
        $this->placeHolder = $placeHolder;
        $this->disabledOption = $disabledOption;
        $this->disabledText = $disabledText;
        $this->options = $options;
        $this->helpText = $helpText;
        $this->helpClass = $helpClass;
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
        return view('components.inputs.bootstrap-select');
    }
}
