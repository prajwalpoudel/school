<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class bootstrapDependentSelect extends Component
{
    /**
     * @var null
     */
    public $formClass1;
    /**
     * @var null
     */
    public $label1;
    /**
     * @var null
     */
    public $labelFor1;
    /**
     * @var null
     */
    public $selectClass1;
    /**
     * @var null
     */
    public $selectId1;
    /**
     * @var null
     */
    public $name1;
    /**
     * @var null
     */
    public $placeHolder1;
    /**
     * @var bool
     */
    public $disabledOption1;
    /**
     * @var string
     */
    public $disabledText1;
    /**
     * @var array
     */
    public $options1;
    /**
     * @var null
     */
    public $helpText1;
    /**
     * @var null
     */
    public $helpClass1;
    /**
     * @var null
     */
    public $formClass2;
    /**
     * @var null
     */
    public $label2;
    /**
     * @var null
     */
    public $labelFor2;
    /**
     * @var null
     */
    public $selectClass2;
    /**
     * @var null
     */
    public $selectId2;
    /**
     * @var null
     */
    public $name2;
    /**
     * @var null
     */
    public $placeHolder2;
    /**
     * @var bool
     */
    public $disabledOption2;
    /**
     * @var string
     */
    public $disabledText2;
    /**
     * @var array
     */
    public $options2;
    /**
     * @var null
     */
    public $helpText2;
    /**
     * @var null
     */
    public $helpClass2;
    /**
     * @var null
     */
    public $checkField;
    /**
     * @var null
     */
    public $optionValue1;
    /**
     * @var null
     */
    public $optionText1;
    /**
     * @var null
     */
    public $optionValue2;
    /**
     * @var null
     */
    public $optionText2;

    /**
     * Create a new component instance.
     *
     * @param null $formClass1
     * @param null $label1
     * @param null $labelFor1
     * @param null $selectClass1
     * @param null $selectId1
     * @param null $name1
     * @param null $placeHolder1
     * @param array $options1
     * @param null $helpText1
     * @param null $helpClass1
     * @param null $formClass2
     * @param null $label2
     * @param null $labelFor2
     * @param null $selectClass2
     * @param null $selectId2
     * @param null $name2
     * @param null $placeHolder2
     * @param array $options2
     * @param null $helpText2
     * @param null $helpClass2
     * @param null $checkField
     * @param null $optionValue1
     * @param null $optionText1
     * @param null $optionValue2
     * @param null $optionText2
     */
    public function __construct(
        $formClass1 = null,
        $label1 = null,
        $labelFor1 = null,
        $selectClass1 = null,
        $selectId1 = null,
        $name1 = null,
        $placeHolder1 = null,
        $options1 = [],
        $helpText1 = null,
        $helpClass1 = null,
        $formClass2 = null,
        $label2 = null,
        $labelFor2 = null,
        $selectClass2 = null,
        $selectId2 = null,
        $name2 = null,
        $placeHolder2 = null,
        $options2 = [],
        $helpText2 = null,
        $helpClass2 = null,
        $checkField = null,
        $optionValue1 = null,
        $optionText1 = null,
        $optionValue2 = null,
        $optionText2 = null
    )
    {
        //
        $this->formClass1 = $formClass1;
        $this->label1 = $label1;
        $this->labelFor1 = $labelFor1;
        $this->selectClass1 = $selectClass1;
        $this->selectId1 = $selectId1;
        $this->name1 = $name1;
        $this->placeHolder1 = $placeHolder1;
        $this->options1 = $options1;
        $this->helpText1 = $helpText1;
        $this->helpClass1 = $helpClass1;
        $this->formClass2 = $formClass2;
        $this->label2 = $label2;
        $this->labelFor2 = $labelFor2;
        $this->selectClass2 = $selectClass2;
        $this->selectId2 = $selectId2;
        $this->name2 = $name2;
        $this->placeHolder2 = $placeHolder2;
        $this->options2 = $options2;
        $this->helpText2 = $helpText2;
        $this->helpClass2 = $helpClass2;
        $this->checkField = $checkField;
        $this->optionValue1 = $optionValue1;
        $this->optionText1 = $optionText1;
        $this->optionValue2 = $optionValue2;
        $this->optionText2 = $optionText2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.bootstrap-dependent-select');
    }
}
