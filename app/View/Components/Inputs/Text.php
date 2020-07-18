<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Text extends Component
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
     * @var string
     */
    public $type;
    /**
     * @var null
     */
    public $inputClass;
    /**
     * @var null
     */
    public $inputId;
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
     * @var bool
     */
    public $readOnly;
    /**
     * @var null
     */
    public $disabled;
    /**
     * @var null
     */
    public $errors;

    /**
     * Create a new component instance.
     *
     * @param null $formClass
     * @param null $label
     * @param null $labelFor
     * @param string $type
     * @param null $inputClass
     * @param null $inputId
     * @param null $name
     * @param null $placeHolder
     * @param null $helpText
     * @param null $helpClass
     * @param null $value
     * @param bool $readOnly
     * @param null $disabled
     * @param null $errors
     */
    public function __construct(
        $formClass = null,
        $label = null,
        $labelFor = null,
        $type = 'text',
        $inputClass = null,
        $inputId = null,
        $name = null,
        $placeHolder = null,
        $helpText = null,
        $helpClass = null,
        $value = null,
        $readOnly = null,
        $disabled = null,
        $errors = null
    )
    {

        $this->formClass = $formClass;
        $this->label = $label;
        $this->labelFor = $labelFor;
        $this->type = $type;
        $this->inputClass = $inputClass;
        $this->inputId = $inputId;
        $this->name = $name;
        $this->placeHolder = $placeHolder;
        $this->helpText = $helpText;
        $this->helpClass = $helpClass;
        $this->value = $value;
        $this->readOnly = $readOnly;
        $this->disabled = $disabled;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.text');
    }
}
