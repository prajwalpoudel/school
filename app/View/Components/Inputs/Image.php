<?php

namespace App\View\Components\inputs;

use Illuminate\View\Component;

class Image extends Component
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
     * @var null
     */
    public $errors;

    /**
     * Create a new component instance.
     *
     * @param null $formClass
     * @param null $label
     * @param null $labelFor
     * @param null $inputClass
     * @param null $inputId
     * @param null $name
     * @param null $helpText
     * @param null $helpClass
     * @param null $value
     * @param null $errors
     */
    public function __construct(
        $formClass = null,
        $label = null,
        $labelFor = null,
        $inputClass = null,
        $inputId = null,
        $name = null,
        $helpText = null,
        $helpClass = null,
        $value = null,
        $errors = null
    )
    {
        //
        $this->formClass = $formClass;
        $this->label = $label;
        $this->labelFor = $labelFor;
        $this->inputClass = $inputClass;
        $this->inputId = $inputId;
        $this->name = $name;
        $this->helpText = $helpText;
        $this->helpClass = $helpClass;
        $this->value = $value;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.image');
    }
}
